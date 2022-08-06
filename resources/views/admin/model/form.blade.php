<!--
=========================================================
* Material Dashboard Dark Edition - v2.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard-dark
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
@extends('admin.layout.master')
@section('title')
    Model Profile
@endsection

@section('styleModel')
        <style>
            ::placeholder {
                border: none;
            }
        </style>
    @endsection

@section('content')
    <div class="row">
        <div class="col-md-7" style="margin: auto">
            <div class="card">
                <input type="hidden" value="models" id="page_active">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong> {{ implode('', $errors->all(':message')) }}</strong>
                    </div>
                @endif
                <div class="card-header card-header-primary">
                    <h3 class="card-title ">New Car</h3>
                    <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <form method="POST" id="demoFormProducts" action="">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Name</label>
                                    <input type="text" value="{{$data_model ? $data_model->name :''}}" name="name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating"> Make</label>
                                    <input type="text" value="{{$data_model ? $data_model->make :''}}" name="make" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Model</label>
                                    <input type="text" value="{{$data_model ? $data_model->model :''}}" name="model" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Make year</label>
                                    <input type="number" value="{{$data_model ? $data_model->make_year :''}}" name="make_year" class="form-control required/">
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

@section('extraJs')
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;

        $(function () {
            $('#demoFormProducts').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 255,
                    }
                },
                messages: {
                    name: {
                        required: 'Please enter size name example : X M L XXl',
                        maxlength: 'Name is limited to 255 characters',
                    }
                },
            });
        })
    </script>
@endsection
