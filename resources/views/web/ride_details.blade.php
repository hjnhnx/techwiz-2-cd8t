@extends('web.layout.master')

@section('title')
    Ride Details
@endsection
@section('content')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix" style="margin: auto!important; float: none;">
                    @if(session('created'))
                        <h2>Your ride has been created!</h2>
                        <h3>We will notify you when your ride is confirmed</h3>
                    @elseif(session('canceled'))
                        <h2>Your ride has been canceled.</h2>
                    @elseif(session('completed'))
                        <h2>Your ride has been marked as completed!</h2>
                    @else
                        <h2>Ride detail</h2>
                    @endif
                    <table class="table" style="margin-bottom: 0 !important;">
                        <thead>
                        </thead>
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Origin</h5></td>
                            <td>{{$data_ride->origin_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>{{$data_ride->destination_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Start time</h5></td>
                            <td>{{$data_ride->travel_start_time}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Estimated distance</h5></td>
                            <td>{{convertMetersToText($data_ride->distance)}} </td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Seats available</h5></td>
                            <td>{{$data_ride->seats_available}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Amount to collect from rider</h5></td>
                            <td>${{$data_ride->price_total}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Status</h5></td>
                            <td>{{\App\Enums\RideStatus::getDescription($data_ride->status)}}</td>
                        </tr>
                        </tbody>
                    </table>
                    @if($data_ride->status == \App\Enums\RideStatus::BOOKED)
                        <a href="{{route('completeRide', $data_ride->id)}}">
                            <button class="btn btn-primary" style="margin-top:20px;">Mark Complete</button>
                        </a>
                    @endif
                    @if($data_ride->status != \App\Enums\RideStatus::CANCELED && $data_ride->status != \App\Enums\RideStatus::COMPLETED)
                        <a href="{{route('cancelRide', $data_ride->id)}}">
                            <button class="btn btn-danger" style="margin-top:20px;">Cancel Ride</button>
                        </a>
                    @endif
                    @if($data_request)
                        <h2 style="margin-top: 30px;">Your rider details</h2>
                        <table class="table" style="margin-bottom: 0 !important;">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td><h5 style="margin: 0!important;">Full name</h5></td>
                                <td>{{$data_request->user->first_name}} {{$data_request->user->last_name}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Pickup address</h5></td>
                                <td>{{$data_request->pickup_address}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Pickup time</h5></td>
                                <td>{{$data_request->pickup_time}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Phone</h5></td>
                                <td>{{$data_request->user->phone}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Seats occupy</h5></td>
                                <td>{{$data_request->seats_occupy}}</td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

