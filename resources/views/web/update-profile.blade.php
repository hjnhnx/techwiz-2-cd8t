@extends('web.layout.master')
@section('title')
    Update Profile
@endsection
@section('content')

    <section id="content" class="container">
        <div class="card">
            <form method="POST" id="formUser" action="{{route('saveuser')}}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary mb-4">
                            <div class="card-header">Log In Info</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6 validate">
                                        <label class="bmd-label-floating">Password</label>
                                        <input type="password" class="form-control" name="password"
                                               id="password" />
                                    </div>
                                    <div class="form-group col-6 validate">
                                        <label class="bmd-label-floating">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirmPassword" />
                                    </div>
                                </div>
                                <div class="form-group validate">
                                    <label class="bmd-label-floating">Email</label>
                                    <input type="email" class="form-control" value="{{ $data_user ? $data_user->email : ''}}"
                                           name="email"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group validate">

                                    <select class="form-control" name="email_preference">
                                        <option hidden selected disabled>Email Preference</option>
                                        @foreach(\App\Enums\EmailPreference::getValues() as $type)
                                            <option value="{{$type}}" {{$data_user && $data_user->email_preference === $type ? 'selected' : ''}}>{{\App\Enums\EmailPreference::getDescription($type)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group validate">
                                </div>
                            </div>
                        </div>

                        <div class="card card-secondary mb-4">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="form-group validate">
                                    <p>Is Smoking Allowed</p>
                                    <input type="radio" name="is_smoking_allowed" value="1" {{$data_user && $data_user->is_smoking_allowed === 1 ? 'checked' : ''}}> Yes
                                    <input type="radio" name="is_smoking_allowed" value="0" {{$data_user && $data_user->is_smoking_allowed === 0 ? 'checked' : ''}}> No
                                </div>
                                <div class="form-group validate">
                                    <p>Is Pet Allowed</p>
                                    <input type="radio" name="is_pet_allowed" value="1" {{$data_user && $data_user->is_pet_allowed === 1 ? 'checked' : ''}}> Yes
                                    <input type="radio" name="is_pet_allowed" value="0" {{$data_user && $data_user->is_pet_allowed === 0 ? 'checked' : ''}}> No
                                </div>
                                <select class="form-control" name="music_preference">
                                    <option hidden selected disabled>Music Preference</option>
                                    @foreach(\App\Enums\MusicPreference::getValues() as $type)
                                        <option value="{{$type}}" {{$data_user && $data_user->music_preference === $type ? 'selected' : ''}}>{{\App\Enums\MusicPreference::getDescription($type)}}</option>
                                    @endforeach
                                </select>
                                <select class="form-control" name="chitchat_preference">
                                    <option hidden selected disabled>Chitchat Preference</option>
                                    @foreach(\App\Enums\ChitChatPreference::getValues() as $type)
                                        <option value="{{$type}}" {{$data_user && $data_user->chitchat_preference === $type ? 'selected' : ''}}>{{\App\Enums\ChitChatPreference::getDescription($type)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card card-secondary mb-4">
                            <div class="card-header">General Information</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6 validate">
                                        <label class="bmd-label-floating">First Name </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->first_name : ''}}"
                                               name="first_name">
                                    </div>
                                    <div class="form-group col-6 validate">
                                        <label class="bmd-label-floating">Last Name </label>
                                        <input type="text" class="form-control" value="{{ $data_user ? $data_user->last_name : ''}}"
                                               name="last_name" required/>
                                    </div>
                                </div>
                                <div class="form-group validate">
                                    <label class="bmd-label-floating">Address </label>
                                    <input type="text" class="form-control" value="{{ $data_user ? $data_user->address : ''}}"
                                           name="address"
                                           aria-describedby="emailHelp" required/>
                                </div>
                                <div class="form-group validate">
                                    <label class="bmd-label-floating">Phone</label>
                                    <input type="text" value="{{ $data_user ? $data_user->phone : ''}}" class="form-control"
                                           name="phone" required/>
                                </div>
                            </div>
                        </div>
                        <div class="card card-secondary mb-4">
                            <div class="card-header"></div>
                            <div class="card-body">
                            <div class="form-group validate">
                                <select class="form-control" name="identification_type">
                                    <option hidden disabled>Identification Type</option>
                                    @foreach(\App\Enums\IdentificationType::getValues() as $type)
                                        <option value="{{$type}}" {{$data_user && $data_user->identification_type === $type ? 'selected' : ''}}>{{\App\Enums\IdentificationType::getDescription($type)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group validate">
                                <label class="bmd-label-floating">Identification Id </label>
                                <input type="text" class="form-control" value="{{ $data_user ? $data_user->identification_id : ''}}"
                                       name="identification_id"
                                       aria-describedby="emailHelp" required/>
                            </div>
                            <div class="form-group validate">
                                <label class="bmd-label-floating">Identification Valid From </label>
                                <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_from : ''}}"
                                       name="identification_valid_from"
                                       aria-describedby="emailHelp" required/>
                            </div>
                            <div class="form-group validate">
                                <label class="bmd-label-floating">Identification Valid To </label>
                                <input type="date" class="form-control" value="{{ $data_user ? $data_user->identification_valid_to : ''}}"
                                       name="identification_valid_to"
                                       aria-describedby="emailHelp" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary btn-block" type="submit">Submit</button>
                </div>
            </form>
        </div>

    </section>
@endsection
