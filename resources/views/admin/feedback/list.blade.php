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
    Feedback
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(session()->get('status'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session()->get( 'user' ) }}
                        {{ session()->get( 'status' ) }}
                    </div>
                @endif
                <div class="card-header card-header-primary">
                    <h3 class="card-title " style="display: inline-block;margin-right: 30px">Feedback</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">

                            <th>
                                By
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Sent at
                            </th>
                            <th>
                                Action
                            </th>
                            </thead>
                            <tbody>
                            @foreach($list_feedback as $feedback)
                                <div class="modal fade" id="Delete{{$feedback->id}}" tabindex="-1"
                                     role="dialog" aria-labelledby="deleteUser"
                                     aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this feedback?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-primary"
                                                        data-dismiss="modal">Cancel
                                                </button>
                                                <a href="{{route('deleteFeedback', $feedback->id)}}"
                                                   class="btn btn-primary">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <tr>
                                    <td>
                                        {{$feedback->user->username}}<br>
                                        ({{$feedback->user->first_name}} {{$feedback->user->last_name}})
                                    </td>
                                    <td>
                                        {{$feedback->title}}
                                    </td>
                                    <td>
                                        {{$feedback->created_at}}
                                    </td>
                                    <td>
                                        <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete{{$feedback->id}}">Delete</a>
                                        <a href="{{route('readFeedback', $feedback->id)}}"><button class="btn btn-success">Read</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" value="Feedback" id="page_active">
    </div>
@endsection

