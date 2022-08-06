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
                                        <div style="background: red">
                                            <strong style="color: white"> {{ implode('', $errors->all(':message')) }}</strong>
                                        </div>
                                    @endif
                                    <form id="login-form" name="login-form" class="nobottommargin" action="{{route('storeCar')}}" method="post">
                                        @csrf
                                        <h3 class="center">Add your car</h3>

                                        <div class="col_full form-group">
                                            <label for="number">Model:</label>
                                            <select name="model_id" id="number" class="form-control">
                                                @foreach($listModel as $model)
                                                    <option hidden selected disabled>Model</option>
                                                    <option value="{{$model->id}}">{{$model->make.' '.$model->model}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col_full">
                                            <label for="login-form-password">Car Registration Number</label>
                                            <input type="text" id="car_registration_number" name="car_registration_number" value="" class="form-control" required/>
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Color </label>
                                            <input type="text" id="color" name="color" value="" class="form-control" required/>
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
