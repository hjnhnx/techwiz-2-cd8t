@extends('admin.layout.master')

@section('title')
    Requests
@endsection

@section('content')
             <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <input type="hidden" value="Requests" id="page_active">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="margin-right: 30px;display: inline-block">Requests</h3>
                                <form action="#" style="display: inline-block">
                                    <div class="form-group no-border">
                                        <input type="text" placeholder="Search by keyword" style="background: none;border: none;color: #9c9b9b">
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
                                            Order by
                                        </th>
                                        <th>
                                            Pick Up Address
                                        </th>
                                        <th>
                                            Destination Address
                                        </th>
                                        <th>
                                            Time
                                        </th>
                                        <th>
                                            Seats Occupy
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                        </thead>
                                        @foreach($list_request as $request)
                                        <tbody>
                                        <tr>
                                            <td>
                                                {{$request->user->first_name}} {{$request->user->last_name}}
                                            </td>
                                            <td>
                                                {{$request->pickup_address}}
                                            </td>
                                            <td>
                                                {{$request->destination_address}}
                                            </td>
                                            <td>
                                                {{date('H:i', strtotime($request->desired_pickup_time))}}

                                            </td>

                                            <td>
                                                {{$request->seats_occupy}}
                                            </td>
                                            <td>
                                                {{$request->price}}

                                            </td>
                                            <td>
                                                {{\App\Enums\RequestStatus::getDescription($request->status)}}
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
@endsection
