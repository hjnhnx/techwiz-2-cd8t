<?php

use App\Models\User;
use Illuminate\Http\Request;
use LaravelFCM\Facades\FCMGroup;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\Topics;

function lib_assets($path)
{
    return asset('libs/' . $path);
}

function getDistance($start, $end)
{
    $obj = json_decode(\GoogleMaps::load('distancematrix')->setParam([
        'origins' => $start,
        'destinations' => $end,
        'key' => env('GOOGLE_MAP_API_KEY'),
        'units' => 'metric'
    ])->get(), true);
    return $obj['rows'][0]['elements'][0];
}

function getInfoGeoMap($address)
{
    return \GoogleMaps::load('geocoding')->setParam([
        'address' => $address,
        'key' => env('GOOGLE_MAP_API_KEY')
    ])->get();
}

function addMinutes($original, $added_minutes)
{
    try {
        $time = new DateTime($original);
        $time->modify('+' . ceil($added_minutes) . ' minutes');
        return $time->format('Y-m-d H:i:s');
    } catch (\Exception $e) {
    }
}

function convertToHoursMins($time)
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    if ($hours) {
        return $hours . ' hrs ' . $minutes . ' mins';
    } else {
        return $minutes . ' mins';
    }
}

function convertMetersToText($distance)
{
    if ($distance < 1000) {
        return $distance . ' m';
    } else {
        return number_format($distance / 1000, 1) . ' km';
    }
}

function getPriceRate()
{
    return 1;
}

function sendMessageToMultipleDevices($title, $content, $tokens)
{


    $optionBuilder = new OptionsBuilder();
    $optionBuilder->setTimeToLive(60 * 20);

    $notificationBuilder = new PayloadNotificationBuilder($title);
    $notificationBuilder->setBody($content)
        ->setSound('default');

    $dataBuilder = new PayloadDataBuilder();
    $dataBuilder->addData(['a_data' => 'my_data']);

    $option = $optionBuilder->build();
    $notification = $notificationBuilder->build();
    $data = $dataBuilder->build();

    $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

    $downstreamResponse->numberSuccess();
    $downstreamResponse->numberFailure();
    $downstreamResponse->numberModification();

// return Array - you must remove all this tokens in your database
    $downstreamResponse->tokensToDelete();

// return Array (key : oldToken, value : new token - you must change the token in your database)
    $downstreamResponse->tokensToModify();

// return Array - you should try to resend the message to the tokens in the array
    $downstreamResponse->tokensToRetry();

// return Array (key:token, value:error) - in production you should remove from your database the tokens present in this array
    $downstreamResponse->tokensWithError();
}

function getDeviceToken($user_id = null) {
    $device_tokens = [];
    if ($user_id) {
        array_push($device_tokens, User::find($user_id)->device_token);
    } else {
        $users = User::all();
        foreach ($users as $user) {
            if ($user->device_token) {
                array_push($device_tokens, $user->device_token);
            }
        }
    }
    return $device_tokens;
}


