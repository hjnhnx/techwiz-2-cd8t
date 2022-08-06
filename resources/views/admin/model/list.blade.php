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
    List Model
@endsection
@section('error')
    @if(session()->get('status'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> {{ session()->get( 'user' ) }}
            {{ session()->get( 'status' ) }}
        </div>
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h3 class="card-title " style="display: inline-block;margin-right: 30px">{{$title}}</h3>
                    <a href="{{route('createModel')}}" class="btn btn-warning">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                <h3>Make</h3>
                            </th>
                            <th>
                                <h3>Model</h3>
                            </th>
                            <th>
                                <h3>Make Year</h3>
                            </th>
                            <th>
                                <h3>Action</h3>
                            </th>
                            </thead>
                            <tbody>
                            @foreach($list_model as $model)
                                <div class="modal fade" id="Delete{{$model->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="deleteUser"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete
                                                    <b> Delete{{$model->name}} </b>
                                                </p>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <a href="{{route('deleteModel', $model->id)}}"
                                                   class="btn btn-primary">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>
                                        <h4>{{$model->name}}</h4>
                                    </td>
                                    <td>
                                        <h4>{{$model->make}}</h4>
                                    </td>
                                    <td>
                                        <h4>{{$model->model}}</h4>
                                    </td>
                                    <td>
                                        <h4>{{$model->make_year}}</h4>
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$model->id}}">Delete</a>
                                        <a href="{{route('updateModel', $model->id)}}"><button class="btn btn-success">Update</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" value="models" id="page_active">
                </div>
            </div>
        </div>
        <input type="hidden" value="" id="page_active">
    </div>
@endsection

