<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="author" content="SemiColonWeb"/>

    @include('web.layout.style')
    <title>User Profile | CarShare</title>
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>

<body class="stretched">

<div id="wrapper" class="clearfix">
    @include('web.layout.header')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div id="side-navigation">

                    <div class="col_one_third nobottommargin">

                        <ul class="sidenav ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header"
                            role="tablist">

                            <li><a href="#snav-content2"><i class="fa fa-inr" aria-hidden="true"></i>Profile</a></li>
                            <li><a href="#snav-content1"><i class="fa fa-user" aria-hidden="true"></i>My rides</a></li>
                            <li><a href="#snav-content3"><i class="fa fa-flag" aria-hidden="true"></i>My requests</a>
                            </li>
                            <li><a href="#snav-content4"><i class="fa fa-car" aria-hidden="true"></i>My cars</a></li>
                        </ul>
                    </div>

                    <div class="col_two_third col_last nobottommargin">

                        <div id="snav-content2">
                            <div class="heading-block">
                                <h3>Profile</h3>
                                <span>Your account details.</span>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$data_user->email}}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{$data_user->last_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Firstname</th>
                                        <td>{{$data_user->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{$data_user->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Driving license number</th>
                                        <td>{{$data_user->driving_license_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                        <td>{{$data_user->address}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row" style="margin-left:0">

                                <a style="color: white;background: #1ABC9C" href="{{route('updateLicense')}}"
                                   class="btn">Update
                                    Licence</a>
                                <a style="color: white;background: #1ABC9C" href="{{route('update_profile')}}"
                                   class="btn btn-success">Update
                                    Profile</a>
                                <a style="color: white" href="javascript:void(0)" id="btn-delete"
                                   class="btn btn-danger">Delete</a>
                            </div>
                        </div>

                        <div id="snav-content1">
                            <div class="heading-block">
                                <h3>My rides</h3>
                                <span>Details of your trips</span>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <th>Time</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Price</th>
                                        <th>Seats</th>
                                        <th>Action</th>
                                    </tr>


                                    @foreach($requests as $request)

                                        <tr>
                                            <td>
                                                <code>{{date('H:i', strtotime($request->desired_pickup_time))}}</code>
                                            </td>
                                            <td>{{$request->pickup_address}}</td>
                                            <td>{{$request->destination_address}}</td>
                                            <td>{{$request->price}}</td>
                                            <td>{{$request->seats_occupy}}</td>
                                            <td>
                                                <a href="{{route('detailRequest', $request->id)}}" class="btn"
                                                   style="background: #1ABC9C;color: white">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </table>
                            </div>
                        </div>

                        <div id="snav-content3">
                            <div class="heading-block">
                                <h3>My request</h3>
                                <span>Information about the trips you have searched for</span>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <th>Time</th>
                                        <th>Origin</th>
                                        <th>Destination</th>
                                        <th>Price</th>
                                        <th>Car</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>


                                    @foreach($rides as $ride)
                                        <tr>
                                            <td>
                                                <code>{{date('H:i', strtotime($ride->travel_start_time))}}</code>
                                            </td>
                                            <td>{{$ride->origin_address}}</td>
                                            <td>{{$ride->destination_address}}</td>
                                            <td> ${{$ride->price_total}}</td>
                                            <td>  {{$ride->car->model->make}}</td>
                                            <td>
                                                {{\App\Enums\RideStatus::getDescription($ride->status)}}
                                            </td>
                                            <td>
                                                <a href="{{route('detailRide', $ride->id)}}">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>

                        <div id="snav-content4">
                            <div class="heading-block">
                                <h3>My cars</h3>
                                <span>Information about the vehicles you own</span>
                            </div>
                            <div>
                                <table>
                                    <tr>
                                        <th>Model</th>
                                        <th>Make</th>
                                        <th>Make Year</th>
                                        <th>Color</th>
                                        {{--                                        <th>Action</th>--}}
                                    </tr>
                                    @foreach($cars as $car)
                                        <tr>
                                            <td>{{$car->model->make}}</td>
                                            <td> {{$car->model->model}}</td>
                                            <td> {{$car->model->make_year}}</td>
                                            <td> {{$car->color}}</td>
                                            {{--                                            <td>--}}
                                            {{--                                                <a href="" type="button" class="btn btn-success">Update</a>--}}
                                            {{--                                                <a href="" type="button" class="btn btn-danger">Delete</a>--}}
                                            {{--                                            </td>--}}
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="line"></div>
            </div>
        </div>
    </section><!-- #content end -->
</div><!-- #wrapper end -->


@include('web.layout.footer')

<div id="gotoTop" class="icon-angle-up"></div>

@include('web.layout.script')
<script>
    $(function () {
        $("#side-navigation").tabs({show: {effect: "fade", duration: 400}});
    });
</script>

</body>
</html>





