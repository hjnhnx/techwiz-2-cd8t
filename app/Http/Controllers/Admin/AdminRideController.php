<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Ride;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;


class AdminRideController extends Controller
{
    public function list(Request $request)
    {
        $status = $request->query('status');
        $rides = Ride::query()->with(['car', 'car.user']);
        $search = $request->query('search');
        if ($search != '') {
            $rides = $rides->where('origin_address', 'like', '%' . $search . '%')
                ->orWhere('destination_address', 'like', '%' . $search . '%');
        }
        if ($status) {
            $rides = $rides->where('status', $status);
        }
        return view('admin/ride/list', [
            'rides' => $rides->get(),
            'status' => $status
        ]);
    }

    public function findMatch(Request $request, $id)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $start_time = $request['travel_start_time'];
        $newDate = date("h:i", strtotime($start_time));
        $ride = Ride::find($id);
        $travel_date = date("Y-m-d", strtotime($ride['travel_start_time']));
        $advanced_query = \App\Models\Request::query()
            ->where('status', RequestStatus::WAITING)
            ->where('desired_pickup_time', '>', Carbon::now())
            ->where('seats_occupy', '<=', $ride['seats_available'])
            ->whereDate('desired_pickup_time', $travel_date);
        if ($origin) {
            $originKeywords = explode(" ", $origin);
            $count = count($originKeywords);
            if ($count > 0) {
                $advanced_query = $advanced_query->where(function ($query) use ($originKeywords, $count) {
                    for ($x = 0; $x < $count; $x++) {
                        $query->orWhere('pickup_address', 'like', '%' . trim($originKeywords[$x]) . '%');
                    }
                });
            }
        }
        if ($destination) {
            $destinationKeywords = explode(" ", $destination);
            $count = count($destinationKeywords);
            if ($count > 0) {
                $advanced_query = $advanced_query->where(function ($query) use ($destinationKeywords, $count) {
                    for ($x = 0; $x < $count; $x++) {
                        $query->orWhere('destination_address', 'like', '%' . trim($destinationKeywords[$x]) . '%');
                    }
                });
            }
        }
        if ($start_time) {
            $advanced_query = $advanced_query->where('desired_pickup_time', '>', $start_time)->get();
        } else {
            $advanced_query = $advanced_query->get();
        }
        $matched_requests = [];
        foreach ($advanced_query as $request) {
            $request['destination_difference'] = getDistance($request['destination_address'], $ride['destination_address'])['distance']['value'];
            if ($request['destination_difference'] > 5000) {
                continue;
            }
            $request['destination_difference_text'] = convertMetersToText($request['destination_difference']);
            $origin_compare = getDistance($ride['origin_address'], $request['pickup_address']);
            $request['origin_difference'] = $origin_compare['distance']['value'];
            $request['origin_difference_text'] = convertMetersToText($request['origin_difference']);
            $request['duration'] = $origin_compare['duration']['value'];
            $request['pickup_time'] = addMinutes($ride['travel_start_time'], $request['duration'] / 60);
            $request['pickup_time_difference'] = abs(strtotime($request['pickup_time']) - strtotime($request['desired_pickup_time']));
            $request['pickup_time_difference_text'] = convertToHoursMins($request['pickup_time_difference'] / 60);
            array_push($matched_requests, $request);
        }
        usort($matched_requests, function ($a, $b) {
            $a_sort_value = $a->origin_difference / 1000 + $a->destination_difference / 1000 + $a->pickup_time_difference / 60 / 60;
            $b_sort_value = $b->origin_difference / 1000 + $b->destination_difference / 1000 + $b->pickup_time_difference / 60 / 60;
            if ($a_sort_value == $b_sort_value) {
                return 0;
            }
            return ($a_sort_value < $b_sort_value) ? -1 : 1;
        });
        return view('admin/ride/matches', [
            'requests' => $matched_requests,
            'ride' => $ride,
            'origin' => $origin,
            'destination' => $destination,
            'start_time' => $start_time

        ]);
    }

    public function setMatch($ride_id, $request_id, $duration)
    {
        $ride = Ride::find($ride_id);
        $request = \App\Models\Request::find($request_id);
        $request->status = RequestStatus::MATCHED;
        $request->ride_id = $ride_id;
        $request->price = $ride->price_total;
        try {
            $time = addMinutes($ride['travel_start_time'], $duration);
            $request->pickup_time = $time;
        } catch (\Exception $e) {
        }
        $request->save();
        $ride->status = RideStatus::MATCHED;
        $ride->save();
        $notification = new Notification();
        $notification->fill([
            'user_id' => $request->user_id,
            'content' => 'We found a match for your CarShare request. See details and book now!',
            'target' => route('detailRequest', $request_id),
        ]);
        $notification->save();
        sendMessageToMultipleDevices('CarShare', 'We found a match for your CarShare request.', getDeviceToken($request->user_id));
        return redirect()->route('listRide')->with('success', 'Ride ' . $ride_id . ' matched!');
    }

    public function setRide($id)
    {
        $ride = Ride::query()->where('id', $id)->with('car')->first();
        $ride->status = RideStatus::CONFIRMED;
        $ride->update();
        $ride->save();
        $notification = new Notification();
        $notification->fill([
            'user_id' => $ride->car->user_id,
            'content' => 'Your ride to ' . $ride->destination_address . ' has been confirmed. We will notify you when someone books it!',
            'target' => route('detailRide', $id),
        ]);
        $notification->save();
        sendMessageToMultipleDevices('CarShare', 'Your ride '.$ride->id.'has been confirmed.', getDeviceToken($ride->car->user_id));
        return redirect()->route('listRide')->with(['status' => 'You have successfully confirmed']);
    }

    public function upcomingRide(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $rides = Ride::query()
            ->whereIn('status', [RideStatus::PENDING, RideStatus::CONFIRMED])
            ->where('travel_start_time', '>', Carbon::now());

        if ($search != '') {
            $rides = $rides->with('car')->where('origin_address', 'like', '%' . $search . '%')
                ->orWhere('destination_address', 'like', '%' . $search . '%');
        }
        if ($status) {
            $rides = $rides->with('car')->where('status', $status);
        }
        return view('admin/ride/upcoming_rides', ['upcomingRide' => $rides->get(),'status' => $status]);
    }
}
