@extends('web.layout.master')
@section('title')
    Request Detail | Car Share
@endsection
@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix" style="margin: auto!important; float: none;">
                    @if($data_ride)
                        @if($data_request->status == \App\Enums\RequestStatus::MATCHED)
                            <h2>We found you a match! Please book the ride, or cancel to find another match</h2>
                        @else
                            <h2>You have booked this ride</h2>
                        @endif
                        <table class="table" style="margin-bottom: 0 !important;">
                            <thead>
                            </thead>
                            <tbody>
                            <tr>
                                <td><h5 style="margin: 0!important;">Driver</h5></td>
                                <td>{{$data_ride->car->user->first_name}} {{$data_ride->car->user->last_name}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Car</h5></td>
                                <td>{{$data_ride->car->model->make}} {{$data_ride->car->model->model}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Pickup time</h5></td>
                                <td>{{ $data_request->pickup_time }}</td>
                            </tr>
                            @if($data_request->status == \App\Enums\RequestStatus::MATCHED)
                                <tr>
                                    <td><h5 style="margin: 0!important;">Origin</h5></td>
                                    <td>{{$data_ride->origin_address}}</td>
                                </tr>
                            @else
                                <tr>
                                    <td><h5 style="margin: 0!important;">Pickup address</h5></td>
                                    <td>{{ $data_request->pickup_address}}</td>
                                </tr>
                            @endif
                            <tr>
                                <td><h5 style="margin: 0!important;">Destination</h5></td>
                                <td>{{$data_ride->destination_address}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Seats available</h5></td>
                                <td>{{$data_ride->seats_available}}</td>
                            </tr>
                            <tr>
                                <td><h5 style="margin: 0!important;">Price</h5></td>
                                <td>${{ $data_ride->price_total }}</td>
                            </tr>
                            </tbody>
                        </table>
                        @if($data_request->status == \App\Enums\RequestStatus::MATCHED)
                            <a href="{{route('bookMatch', $data_request->id)}}">
                                <button class="btn btn-primary" style="margin-top:20px; margin-bottom: 30px;">Book This
                                    Ride
                                </button>
                            </a>
                            <a href="{{route('cancelMatch', $data_request->id)}}">
                                <button class="btn btn-danger" style="margin-top:20px; margin-bottom: 30px;">Cancel
                                    Match
                                </button>
                            </a>
                        @endif
                    @endif
                    @if(session('created'))
                        <h2>Your request has been created!</h2>
                        <h3>We will notify you when a match is found</h3>
                    @elseif(session('canceled') || $data_request->status == \App\Enums\RequestStatus::CANCELED)
                        <h2>Your request has been canceled</h2>
                    @elseif($data_request->status == \App\Enums\RequestStatus::WAITING)
                        <h2>We are finding you a match and will notify you once one is found</h2>
                    @else
                        <h2 style="margin-top: 30px;">Your carpool request</h2>
                    @endif
                    <table class="table" style="margin-bottom: 0 !important;">
                        <tbody>
                        <tr>
                            <td><h5 style="margin: 0!important;">Pickup address</h5></td>
                            <td>{{ $data_request->pickup_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Destination</h5></td>
                            <td>{{ $data_request->destination_address}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Seats occupy</h5></td>
                            <td>{{ $data_request->seats_occupy}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Desired pickup time</h5></td>
                            <td>{{ $data_request->desired_pickup_time}}</td>
                        </tr>
                        <tr>
                            <td><h5 style="margin: 0!important;">Status</h5></td>
                            <td>{{ \App\Enums\RequestStatus::getDescription($data_request->status) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    @if($data_request->status != \App\Enums\RequestStatus::CANCELED && $data_request->status != \App\Enums\RequestStatus::COMPLETED)
                        <a href="{{route('cancelRequest', $data_request->id)}}">
                            <button class="btn btn-danger" style="margin-top:20px;">Cancel Request</button>
                        </a>
                    @endif
                </div><!-- .postcontent end -->
            </div>
        </div>
    </section>
@endsection

