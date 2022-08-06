@extends('web.layout.master')
@section('title')
    Update Profile
@endsection
@section('content')
    @if($errors->any())
            <strong style="color: red"> {{ implode('', $errors->all(':message')) }}</strong>
    @endif
    <section id="content" class="container">
        <div class="card">
            <form method="POST" id="formUser" action="{{route('saveuser')}}">
                @csrf
                <div class="row" style="padding-top: 6%">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Log In Info</h4>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="password" class="form-control" name="password"
                                           id="password" />
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirmPassword" />
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" class="form-control" value="{{ $data_user ? $data_user->email : ''}}"
                                           name="email"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="col_full bmd-label-floating">Email Preference</label>
                                            <div class="col_full">
                                                @foreach(\App\Enums\EmailPreference::getValues() as $type)
                                                    <input  type="radio" value="{{$type}}" {{$data_user && $data_user->email_preference === $type ? 'selected' : ''}}> {{\App\Enums\EmailPreference::getDescription($type)}}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col_full"><label>Music Preference</label></div>
                                            <div class="col_full">
                                                @foreach(\App\Enums\MusicPreference::getValues() as $type)
                                                    <input type="radio" value="{{$type}}" name="is_smoking_allowed" value="1" {{$data_user && $data_user->music_preference === $type ? 'selected' : ''}}>  {{\App\Enums\MusicPreference::getDescription($type)}}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col_full"><label>Chitchat Preference</label></div>
                                            <div class="col-12">
                                                @foreach(\App\Enums\ChitChatPreference::getValues() as $type)
                                                    <input type="radio" value="{{$type}}" name="is_smoking_allowed" value="1" {{$data_user && $data_user->chitchat_preference === $type ? 'selected' : ''}}>  {{\App\Enums\ChitChatPreference::getDescription($type)}}<br>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row" style="padding-top: 8px">
                                        <div class="col-md-4"><label style="margin-bottom: 0!important;">Is Smoking Allowed</label></div>
                                        <div class="col-md-2"><input type="radio" name="is_smoking_allowed" value="1" {{$data_user && $data_user->is_smoking_allowed === 1 ? 'checked' : ''}}> Yes</div>
                                        <div class="col-md-2"><input type="radio" name="is_smoking_allowed" value="0" {{$data_user && $data_user->is_smoking_allowed === 0 ? 'checked' : ''}}> No</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4"><label style="margin-bottom: 0!important;">Is Pet Allowed</label></div>
                                        <div class="col-md-2"><input type="radio" name="is_pet_allowed" value="1" {{$data_user && $data_user->is_pet_allowed === 1 ? 'checked' : ''}}> Yes</div>
                                        <div class="col-md-2"><input type="radio" name="is_pet_allowed" value="0" {{$data_user && $data_user->is_pet_allowed === 0 ? 'checked' : ''}}> No</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <h4>General Information</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="bmd-label-floating">First Name </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->first_name : ''}}"
                                               name="first_name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="bmd-label-floating">Last Name </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->last_name : ''}}"
                                               name="last_name" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Address </label>
                                    <input type="text" class="form-control" value="{{ $data_user ? $data_user->address : ''}}"
                                           name="address"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input type="text" value="{{ $data_user ? $data_user->phone : ''}}" class="form-control"
                                           name="phone" required/>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Identification Type</label>
                                    <select class="form-control" name="identification_type">
                                        <option hidden disabled>Identification Type</option>
                                        @foreach(\App\Enums\IdentificationType::getValues() as $type)
                                            <option value="{{$type}}" {{$data_user && $data_user->identification_type === $type ? 'selected' : ''}}>{{\App\Enums\IdentificationType::getDescription($type)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Identification Id </label>
                                    <input type="text" class="form-control" value="{{ $data_user ? $data_user->identification_id : ''}}"
                                           name="identification_id"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Identification Valid From </label>
                                    <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_from : ''}}"
                                           name="identification_valid_from"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group">
                                    <label class="bmd-label-floating">Identification Valid To </label>
                                    <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_to : ''}}"
                                           name="identification_valid_to"
                                           aria-describedby="emailHelp" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 87px">
                        <div class="list-group">
                            <a href="{{route('update_profile')}}" class="list-group-item list-group-item-action clearfix">Update Profile <i class="far fa-user" style="padding-left: 4%"></i></a>
                            <a href="javascript:void(0)" class="list-group-item list-group-item-action clearfix" data-toggle="modal" data-target="#delete-modal" id="btn-delete">Delete <i class="fas fa-laptop" style="padding-left: 4%"></i></a>
                            <a href="#" class="list-group-item list-group-item-action clearfix">Logout<i class="fas fa-sign-out-alt" style="padding-left: 4%"></i></a>
                        </div>
                    </div>
                </div>
                <div style="padding-top: 5%; padding-bottom: 5%">
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                </div>
            </form>
        </div>

    </section>
@endsection
