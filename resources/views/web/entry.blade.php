@extends('web.layout.master')

@section('title')
    Entry
@endsection

@section('content')
    <section id="content">
        <div class="content-wrap">
            @if(session()->get('status'))
                <h2 style="padding-left:100px">{{ session()->get( 'status' ) }}</h2>
            @endif
            <div class="container clearfix">
                <div class="col-md-4 nobottommargin">
                    <div class="well well-lg nobottommargin">
                        <form id="login-form" name="login-form" class="nobottommargin"
                              action="{{route('loginUser')}}"
                              method="post">
                            @csrf
                            <h3>Login to your Account</h3>
                            @if(session('error-login'))
                                <div class="text-danger" style="font-weight: bold; margin-bottom: 10px;">
                                    {{session('error-login')}}
                                </div>
                            @endif
                            <div class="col_full">
                                <label for="login-form-username">Username:</label>
                                <input type="text" id="login-form-username" name="username" value=""
                                       class="form-control" required/>
                            </div>
                            <div class="col_full">
                                <label for="login-form-password">Password:</label>
                                <input type="password" id="login-form-password" name="password" value=""
                                       class="form-control" required/>
                            </div>
                            <input type="hidden" name="device_token">
                            <div class="col_full">
                                <button class="button button-3d nomargin" id="login-form-submit" value="login">Login
                                </button>
                                <a href="#" class="fright">Forgot Password?</a>
                            </div>

                        </form>
                    </div>

                </div>

                @if(!session('status'))
                    <div class="col-md-8 col_last nobottommargin" style="padding-left: 100px">
                        <div class="row">
                            <h3>Don't have an Account? Register Now.</h3>
                        </div>
                        <div class="row">
                            @if($errors->any())
                                <div class="text-danger">
                                    <strong>
                                        @foreach($errors->all(':message') as $message)
                                            {{$message}}<br>
                                        @endforeach
                                    </strong>
                                </div>
                            @endif
                            <form id="register-form" name="register-form" class="nobottommargin"
                                  action="{{route('registerUser')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-group">Username</label>
                                                <input type="text" name="username" value="" class="form-control" required/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-group">Email</label>
                                                <input type="text" name="email" value="" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 20px">
                                            <div class="col-md-6">
                                                <label class="form-group">Password</label>
                                                <input type="password" name="password" value="" class="form-control" required/>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-group">Confirm Password</label>
                                                <input type="password" name="password" value="" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 20px">
                                            <div class="col-md-3">
                                                <label class="form-group">First Name</label>
                                                <input type="text" name="first_name" value="" class="form-control" required/>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="form-group">Last Name</label>
                                                <input type="text" name="last_name" value="" class="form-control" required/>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-group">Phone</label>
                                                <input type="text" name="phone" value="" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 20px">
                                            <div class="col-md-12">
                                                <label class="form-group">Address</label>
                                                <input type="text" name="address" value="" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="row" style="padding-top: 50px">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                           id="check1">
                                                    <label class="form-check-label" for="check1">
                                                        I have a driving license
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="license" style="display: none;padding-bottom: 50px">
                                            <div class="row" style="padding-top: 50px">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-group">Drivers license photo</label>
                                                        <div class="d-flex">
                                                            <input style="display: none" type="file" name="avatar_file"
                                                                   id="myFileInput">
                                                            <input type="hidden" name="drivers_license_photo">
                                                            <div class="col-md-2 pt-cr-img pt-wrap-plus border-success"
                                                                 onclick="document.getElementById('myFileInput').click();"
                                                                 style="margin-right: 20px;width: 100px;height: 100px;border: #a9afbbd1 2px solid;border-radius:3px;font-size: 35px; cursor: pointer; color: #a9afbbd1;display: flex;justify-content: center;align-items: center">
                                                                +
                                                            </div>
                                                            <div id="img_show" class="d-flex" style="display: none">
                                                                <img class="img_show"
                                                                     style="width: 100px;height: 100px;border: #a9afbbd1 1px solid;border-radius:3px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top: 50px">
                                                <div class="col-md-6">
                                                    <label class="form-group">Driving License Number</label>
                                                    <input type="text" name="driving_license_number" value=""
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-3"><label class="form-group">Valid from</label>
                                                    <input type="date" name="driving_license_number" value=""
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-3"><label class="form-group">Valid To</label>
                                                    <input type="date" name="driving_license_number" value=""
                                                           class="form-control"/>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="row" style="padding-top: 50px; padding-left: 10px">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4" style="padding-left: 7px">
                                                        <label class="form-group">Identification Type:</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input class="form-check-input" type="radio"
                                                               name="identification_type"
                                                               id="exampleRadios1" value="1" required>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Citizen Identification
                                                        </label></div>
                                                    <div class="col-md-3">
                                                        <input class="form-check-input" type="radio"
                                                               name="identification_type"
                                                               id="exampleRadios1" value="2">
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Passport
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="padding-top: 70px;padding-left: 8px">
                                                <div class="col-md-6">
                                                    <label class="form-group">Identification ID</label>
                                                    <input type="text" name="identification_id" value=""
                                                           class="form-control"/>
                                                </div>
                                                <div class="col-md-3"><label class="form-group">Valid from</label>
                                                    <input type="date" name="identification_valid_from" value=""
                                                           class="form-control" required/></div>
                                                <div class="col-md-3"><label class="form-group">Valid To</label>
                                                    <input type="date" name="identification_valid_to" value=""
                                                           class="form-control" required/></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="display: none">
                                        <div class="row" style="padding-top: 50px">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email Preference</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="email_preference"
                                                               id="exampleRadios1" value="0" checked>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Don't send to my email
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="email_preference"
                                                               id="exampleRadios2" value="1" required>
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Only send notification ride to email
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="email_preference"
                                                               id="exampleRadios3" value="2">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Send all notification to my email
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Music Preference</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="music_preference"
                                                               id="exampleRadios1" value="0" checked required>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            No Music
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="music_preference"
                                                               id="exampleRadios2" value="1">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Only calm music
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input" type="radio" name="music_preference"
                                                               id="exampleRadios3" value="2">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Loud Music
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Chitchat Preference</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="chitchat_preference"
                                                               id="exampleRadios1" value="0" checked required>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            Don't chitchat
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                               name="chitchat_preference"
                                                               id="exampleRadios2" value="1">
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            Little chitchat
                                                        </label>
                                                    </div>
                                                    <div class="form-check disabled">
                                                        <input class="form-check-input" type="radio"
                                                               name="chitchat_preference"
                                                               id="exampleRadios3" value="2">
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            Lot chitchat
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top: 50px;padding-left: 15px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Is Smoking Allowed:</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_smoking_allowed" id="exampleRadios2" value="1" required>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check disabled">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_smoking_allowed" id="exampleRadios3" value="0"
                                                                   checked>
                                                            <label class="form-check-label" for="exampleRadios3">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-top: 20px;padding-left: 15px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Is Pet Allowed :</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_pet_allowed"
                                                                   id="exampleRadios2" value="1" required>
                                                            <label class="form-check-label" for="exampleRadios2">
                                                                Yes
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-check disabled">
                                                            <input class="form-check-input" type="radio"
                                                                   name="is_pet_allowed"
                                                                   id="exampleRadios3" value="0" checked>
                                                            <label class="form-check-label" for="exampleRadios3">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top: 50px">
                                        <button style="width: 25%" class="button button-3d button-black nomargin"
                                                id="register-form-submit" name="register-form-submit" value="register">
                                            Register Now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        </div>
    </section><!-- #content end -->
@endsection
@section('botExtraJs')
    <script>
        const license = document.getElementById('license');
        $('#check1').change(function () {
            if (this.checked) {
                $(license).show();
            } else {
                $(license).hide();
            }
        })
        var back_to_profile = document.querySelector('.back_to_profile')
        const imgurl = document.querySelector('input[name="drivers_license_photo"]')
        const cloudName = 'ddmgbaegq';
        const unsignedUploadPreset = 'hrn13yyl';
        const img = document.querySelector('input[name="avatar_file"]');
        img.onchange = function () {
            var file = this.files[0];
            var url = `https://api.cloudinary.com/v1_1/${cloudName}/upload`
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        var dataJson = JSON.parse(this.responseText)
                        imgurl.value = dataJson.url
                        var img_review = document.querySelector('.img_show');
                        img_review.src = dataJson.url;
                        document.querySelector('#img_show').style.display = "block"
                    }
                }
            }
            xhr.open('POST', url, true);
            var ud = new FormData();
            ud.append('upload_preset', unsignedUploadPreset);
            ud.append('tags', 'browser_upload')
            ud.append('file', file)
            xhr.send(ud)
        }
        back_to_profile.onclick = function () {
            window.location.href = location.protocol + "/profile";
        }
    </script>
@endsection
