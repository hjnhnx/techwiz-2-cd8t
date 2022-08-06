@extends('admin.layout.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Daily Rides Stats</h4>
                    <div id="reportrange" style="cursor: pointer; padding: 5px 10px; width: 50%; height: 10%; color: white;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <p id="dateHeader" class="card-category d-none">{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "- 1 week" ) )}} - {{date('Y-m-d')}}</p>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Date</th>
                        <th>Total rides</th>
                        </thead>
                        <tbody id="ride_body">
                        @foreach($ride_stats as $date)
                            <tr>
                                <td>{{$date->date}}</td>
                                <td>{{$date->count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div id="paginationDashboard"></div>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Daily Bills Stats</h4>
                    <div id="reportrangeBill" style="cursor: pointer; padding: 5px 10px; width: 50%; height: 10%; color: white;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <p id="dateHeaderBill" class="card-category d-none">{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "- 1 week" ) )}} - {{date('Y-m-d')}}</p>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Date</th>
                        <th>Total Bill</th>
                        </thead>
                        <tbody id="bill_body">
                        @foreach($ride_stats as $date)
                            <tr>
                                <td>{{$date->date}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div id="paginationDashboard"></div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Top Drivers</h4>
                    <div id="reportrangeTopDrivers" style="cursor: pointer; padding: 5px 10px; width: 50%; height: 10%; color: white;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <p id="dateHeaderTopDrivers" class="card-category d-none">{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "- 1 week" ) )}} - {{date('Y-m-d')}}</p>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Username</th>
                        <th>Total</th>
                        </thead>
                        <tbody id="top_drivers_body">
                        @foreach($ride_stats as $date)
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div id="paginationDashboard"></div>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Top Riders</h4>
                    <div id="reportrangeTopRiders" style="cursor: pointer; padding: 5px 10px; width: 50%; height: 10%; color: white;">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span></span> <i class="fa fa-caret-down"></i>
                    </div>
                    <p id="dateHeaderTopRiders" class="card-category d-none">{{date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "- 1 week" ) )}} - {{date('Y-m-d')}}</p>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>Username</th>
                        <th>Total</th>
                        </thead>
                        <tbody id="top_riders_body">
                        @foreach($ride_stats as $date)
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <div id="paginationDashboard"></div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="Dashboard" id="page_active">
@endsection

@section('botExtraJs')
@endsection
