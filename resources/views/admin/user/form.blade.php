@extends('admin.layout.master')

@section('title')
    User profile
@endsection

@section('error')
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong> {{ implode('', $errors->all(':message')) }}</strong>
        </div>
    @endif
@endsection

@section('content')
    <form method="post" id="formUser" action="{{route('storeUser')}}">
        @csrf
        <div class="row">
            <input type="hidden" value="user" id="page_active">
            <div class="col-12 col-md-6">
                <div class="card card-secondary mb-4">
                    <div class="card-header">Log In Info</div>
                    <div class="card-body">
                        <div class="form-group validate">
                            <label class="bmd-label-floating">Username</label>
                            <input type="text" class="form-control" value="{{ $data_user ? $data_user->username : ''}}"
                                   name="username"
                                   aria-describedby="emailHelp" required/>
                        </div>
                        <div class="row">
                            <div class="form-group col-6 validate">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" name="password"
                                       id="password" required/>
                            </div>
                            <div class="form-group col-6 validate">
                                <label class="bmd-label-floating">Confirm Password</label>
                                <input type="password" class="form-control" name="confirmPassword" required/>
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

                            <select class="form-control" name="role">
                                <option hidden selected disabled>Role</option>
                                @foreach(\App\Enums\Role::getValues() as $type)
                                <option value="{{$type}}" {{$data_user && $data_user->role === $type ? 'selected' : ''}}>{{\App\Enums\Role::getDescription($type)}}</option>
                                @endforeach
                            </select>
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
                            <label class="bmd-label-floating">Driving License Number </label>
                            <input type="text" class="form-control" value="{{ $data_user ? $data_user->driving_license_number : ''}}"
                                   name="driving_license_number"
                                   aria-describedby="emailHelp" required/>
                        </div>
                        <label class="bmd-label-floating">Driving License Valid From </label>
                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->driving_license_valid_from : ''}}"
                               name="driving_license_valid_from"
                               aria-describedby="emailHelp" required/>
                    </div>
                    <div class="form-group validate">
                        <label class="bmd-label-floating">Driving License Valid To </label>
                        <input type="date" class="form-control" value="{{ $data_user ? $data_user->driving_license_valid_to : ''}}"
                               name="driving_license_valid_to"
                               aria-describedby="emailHelp" required/>
                    </div>
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
            <div class="modal fade" id="DeleteUser<%= dataUser.id %>" tabindex="-1"
                 role="dialog" aria-labelledby="deleteUser"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p>Are you sure you want to delete
                                <b><%= dataUser.firstName %> <%= dataUser.lastName %></b>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary"
                                    data-dismiss="modal">Cancel
                            </button>
                            <a href="/admin/user/delete/<%= dataUser.id %>"
                               class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection

@section('extraJs')
    <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;

        $(function () {
            $('#demoForm').validate({
                rules: {
                    name: {
                        required: true,
                        maxLength: 255
                    },
                    password: {},
                    email: {
                        required: true,
                        email: true,
                        maxLength: 255,
                    },
                },
                messages: {
                    name: {
                        required: 'Please enter your name',
                        maxlength: 'Name is limited to 255 characters',
                    },
                    password: {
                        required: 'Please enter your password',
                    },
                    email: {
                        required: 'Please enter sort order',
                        email: 'Please enter the correct email format',
                        maxLength: 'Sort order is limiter to 255 characters',
                    },
                }
            })
        })
    </script>
@endsection
