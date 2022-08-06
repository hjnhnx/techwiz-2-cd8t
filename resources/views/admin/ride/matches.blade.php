@extends('admin.layout.master')

@section('title')
    Matches
@endsection



@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <input type="hidden" value="Rides" id="page_active">
                <div class="card-header card-header-primary">
                    <h3 class="card-title " style="margin-right: 30px;display: inline-block">Found {{sizeof($requests)}}
                        matches</h3>
                    <form style="display: inline-block">
                        @csrf
                        <div class="form-group no-border">
                            <input class="ml-4 mr-2" type="text" value="{{$origin}}" name="origin" placeholder="Search by Origin"
                                   style="background: none;border: none;color: #fff">
                            <input class="pr-2" type="text" name="destination" value="{{$destination}}" placeholder="Search by Destination"
                                   style="background: none;border: none;color: #fff">
                            <input style="background: none;border: none;color: #fff;display: inline-block;width: auto;" type="datetime-local" value="{{$start_time}}" name="travel_start_time"
                                   class="pr-2 form-control datetimepickerInputCreateRide datetimepicker"
                                   data-target=".datetimepicker" />
                            <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                User
                            </th>
                            <th>
                                Pickup address<br>
                                <small>(Distance from last pickup point)</small>
                            </th>
                            <th>
                                Destination address<br>
                                <small>(Distance from destination)</small>
                            </th>
                            <th>
                                Pickup time
                            </th>
                            <th>
                                Seats occupy
                            </th>
                            <th>
                                Action
                            </th>
                            </thead>
                            @foreach($requests as $request)
                                <tbody>
                                <tr>
                                    <td>
                                        {{$request->user->first_name}} {{$request->user->last_name}}
                                    </td>
                                    <td>
                                        {{$request->pickup_address}}<br>
                                        ({{$request->origin_difference_text}})
                                    </td>
                                    <td>
                                        {{$request->destination_address}}<br>
                                        ({{$request->destination_difference_text}})
                                    </td>
                                    <td>
                                        Desired: {{date('H:i', strtotime($request->desired_pickup_time))}}<br>
                                        Estimated:
                                        <strong>{{date('H:i', strtotime($request->pickup_time))}}</strong><br>
                                        ({{$request->pickup_time_difference_text}} difference)
                                    </td>
                                    <td>
                                        {{$request->seats_occupy}}
                                    </td>
                                    <td>
                                        <a href="{{route('setMatch', [$ride->id, $request->id, $request->duration])}}">
                                            <button class="btn btn-success">Match</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header card-header-primary">
                    <h3 class="card-title" style="margin-right: 30px;display: inline-block">Ride details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-7 td-left">
                            <table class="table table-sm table-borderless ">
                                <tbody>
                                <tr class="td-left">
                                    <th>Origin:</th>
                                    <td>{{$ride->origin_address}}</td>
                                </tr>
                                <tr class="td-left">
                                    <th>Destination:</th>
                                    <td> {{$ride->destination_address}}</td>
                                </tr>
                                <tr class="td-left">
                                    <th>Start time:</th>
                                    <td>{{date('M d, H:i', strtotime($ride->travel_start_time))}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-5 td-left" style="text-align: left!important;">
                            <table class="table table-sm table-borderless ">
                                <tbody>
                                <tr class="td-left">
                                    <th>Driver:</th>
                                    <td> {{$ride->car->user->first_name}} {{$ride->car->user->last_name}}</td>
                                </tr>
                                <tr class="td-left">
                                    <th>Seats available:</th>
                                    <td>{{$ride->seats_available}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
@endsection
