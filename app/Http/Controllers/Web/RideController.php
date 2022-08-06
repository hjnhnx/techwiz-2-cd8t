<?php

namespace App\Http\Controllers\Web;

use App\Enums\RequestStatus;
use App\Enums\RideStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\RideRequest;
use App\Models\Car;
use App\Models\Request;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RideController extends Controller
{
    public function create()
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        $cars = Car::query()->where('user_id', $user_id)->with('model')->get();
        if (!$user->driving_license_number || !$user->is_driving_license_certified) {
            return redirect()->route('updateLicense');
        }
        if (!sizeof($cars)) {
            return redirect()->route('updateCar');
        }
        return view('web/create_ride', ['cars' => $cars]);
    }

    public function store(RideRequest $request)
    {
        $data = $request->validated();
        $map_info = getDistance($data['origin_address'], $data['destination_address']);
        $data['distance'] = $map_info['distance']['value'];
        $data['user_id'] = Auth::id();
        $ride = new Ride();
        $ride->fill($data);
        $ride->save();
        return redirect()->route('detailRide', [$ride->id])->with('created', true);
    }

    public function detail($id)
    {
        $user_id = Auth::id();
        $ride = Ride::query()->where('id', $id)->with(['car'])->first();
        $request = Request::query()->where('ride_id', $id)->with('user')->first();
        if($user_id != $ride->car->user_id){
            return view('web/403');
        }
        return view('web/ride_details', [
            'data_ride' => $ride,
            'data_request' => $request,
        ]);
    }

    public function cancel($id)
    {
        $ride = Ride::find($id);
        $ride->status = RideStatus::CANCELED;
        $requests = Request::query()->where('ride_id', $id)->get();
        foreach ($requests as $request)
        {
            if ($request->status != RequestStatus::CANCELED) {
                $request->status = RequestStatus::WAITING;
                $request->price = null;
                $request->pickup_time = null;
                $request->ride_id = null;
                $request->save();
            }
        }
        $ride->save();
        return redirect()->route('detailRide', $id)->with('canceled', true);
    }

    public function complete($id)
    {
        $ride = Ride::find($id);
        $ride->status = RideStatus::COMPLETED;
        $requests = Request::query()->where('ride_id', $id)->get();
        foreach ($requests as $request)
        {
            $request->status = RequestStatus::COMPLETED;
            $request->save();
        }
        $ride->save();
        return redirect()->route('detailRide', $id)->with('completed', true);
    }
}
