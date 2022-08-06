@extends('admin.layout.master')
@section('title')
    Send notifications
@endsection
@section('content')
    <div class="row">
        <div class="col-md-7" style="margin: auto">
            <div class="card">
                <input type="hidden" value="Notifications" id="page_active">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong> {{ implode('', $errors->all(':message')) }}</strong>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{session('success')}}</strong>
                    </div>
                @endif
                <div class="card-header card-header-primary">
                    <h3 class="card-title ">Send notifications to all users</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('storeMassNotifications')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Content</label>
                                    <textarea class="form-control" name="content" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Target</label>
                                    <input type="text" name="target" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right d-block">Submit</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
