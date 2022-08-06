@extends('web.layout.master')
@section('title')
    Add Car
@endsection
@section('content')
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

                    <div class="tab-container">

                        <div class="tab-content clearfix" id="tab-login">
                            <div class="card nobottommargin" style="border: 1px solid rgba(0, 0, 0, 0.125);">
                                <div class="card-body" style="padding: 40px;">
                                    @if($errors->any())
                                        <strong style="color: red"> {{ implode('', $errors->all(':message')) }}</strong>
                                    @endif
                                        @if(session('error-password'))
                                            <div class="text-danger" style="font-weight: bold; margin-bottom: 10px;">
                                                {{session('error-password')}}
                                            </div>
                                        @endif
                                        <h3 class="mb-4">Please enter the password to confirm deletion of the account</h3>
                                    <form id="login-form" name="login-form" class="nobottommargin " action="{{route('delete_user')}}" method="post">
                                        @csrf
                                        <div class="col_full">
                                            <lable>password</lable>
                                            <input type="password"  name="password" value="" class="form-control" />
                                        </div>
                                        <div class="col_full nobottommargin">
                                            <button class="button button-3d button-black nomargin" style="margin-left: 35%!important;" id="login-form-submit" name="login-form-submit" value="login">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
