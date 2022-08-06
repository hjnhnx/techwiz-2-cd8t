<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Request;
use Illuminate\Http\Request as FormRequest;

class AdminRequestController extends Controller
{
    public function list()
    {
        $list_request = Request::query()->with(['user','ride'])->get();;
        return view('admin/request/list',[
            'list_request'=>$list_request
        ]);
    }

    public function getGeoLocation(\Illuminate\Http\Request $request)
    {
        $start = $request['start'];
        $end = $request['end'];
        return response()->json(\GoogleMaps::load('distancematrix')->setParam([
            'origins' => $start,
            'destinations' => $end,
            'key' => env('GOOGLE_MAP_API_KEY'),
            'units' => 'metric'
        ])->get());
    }
}
