@extends('web.layout.master')
@section('title')
    User Profile
@endsection
@section('content')

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-md-9">

                        <div class="row clearfix">

                            <div class="col-lg-12">

                                <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tab-feeds"><i class="fas fa-id-badge"></i>Profile</a></li>
                                        <li><a href="#tab-posts"><i class="fas fa-history"></i> history Passenger</a></li>
                                        <li><a href="#tab-replies"><i class="fas fa-history"></i>history Driver</a></li>
                                        <li><a href="#tab-connections"><i class="fas fa-car"></i> Your Car</a></li>
                                    </ul>
                                    <div class="tab-container">
                                        <div class="tab-content clearfix" id="tab-feeds">
                                            <div class="row topmargin-sm clearfix">

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->email}}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Last Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->last_name}}

                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">First Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->first_name}}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->phone}}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Driving license number</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->driving_license_number}}
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Address</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            {{$data_user->address}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content clearfix" id="tab-posts">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Time:</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($requests as $request)
                                                <tr>
                                                    <td>
                                                        <code>{{date('H:i', strtotime($request->desired_pickup_time))}}</code>
                                                    </td>
                                                    <td>{{$request->pickup_address}}</td>
                                                    <td>{{$request->destination_address}}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-content clearfix" id="tab-replies">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Time:</th>
                                                    <th>Origin</th>
                                                    <th>Destination</th>
                                                    <th>Price</th>
                                                    <th>Car</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($rides as $ride)
                                                    <tr>
                                                        <td>
                                                            <code>{{date('H:i', strtotime($ride->travel_start_time))}}</code>
                                                        </td>
                                                        <td>{{$ride->origin_address}}</td>
                                                        <td>{{$ride->destination_address}}</td>
                                                        <td> $ {{$ride->price_total}}</td>
                                                        <td>  {{$ride->car->model->make}}</td>
                                                        <td>
                                                            {{\App\Enums\RideStatus::getDescription($ride->status)}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>



                                        </div>
                                        <div class="tab-content " id="tab-connections">

                                               <table class="table  table-striped">
                                                   <thead>
                                                   <tr>
                                                       <th>Model</th>
                                                       <th>Make</th>
                                                       <th>Make Year</th>
                                                       <th>Color</th>
                                                       <th>Action</th>
                                                   </tr>
                                                   </thead>
                                                   <tbody>
                                                   <tr>
                                                       @foreach($cars as $car)
                                                           <td>{{$car->model->make}}</td>
                                                           <td> {{$car->model->model}}</td>
                                                           <td> {{$car->model->make_year}}</td>
                                                           <td> {{$car->color}}</td>
                                                           <td>
                                                               <a href="" type="button" class="btn btn-success">update</a>
                                                               <a href="" type="button" class="btn btn-danger">delete</a>
                                                           </td>
                                                       @endforeach

                                                   </tr>
                                                   </tbody>
                                               </table>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-3 clearfix">
                        <div class="modal fade" id="delete-modal" tabindex="-1"
                             role="dialog" aria-labelledby="deleteUser"
                             aria-hidden="true">
                        </div>
                        <div class="list-group">
                            <a href="{{route('update_profile')}}" class="list-group-item list-group-item-action clearfix">Update Profile <i class="far fa-user" style="padding-left: 4%"></i></a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action clearfix" data-toggle="modal" data-target="#delete-modal" id="btn-delete">Delete <i class="fas fa-laptop" style="padding-left: 4%"></i></a>
                            <a href="#" class="list-group-item list-group-item-action clearfix">Logout<i class="fas fa-sign-out-alt" style="padding-left: 4%"></i></a>
                        </div>

                        <div class="fancy-title topmargin title-border">
                            <h4>About Me</h4>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum laboriosam, dignissimos veniam obcaecati. Quasi eaque, odio assumenda porro explicabo laborum!</p>

                        <div class="fancy-title topmargin title-border">
                            <h4>Social Profiles</h4>
                        </div>

                        <a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
                            <i class="fab fa-facebook-square"></i>
                        </a>

                        <a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
                            <i class="fab fa-google-plus-square"></i>
                        </a>

                        <a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
                            <i class="fab fa-dribbble-square"></i>
                        </a>

                        <a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
                            <i class="fab fa-flickr"></i>
                        </a>

                        <a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>

                        <a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
                            <i class="fab fa-twitter-square"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

