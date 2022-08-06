@extends('web.layout.master')
    @section('title')
    Create Driving License
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
                                    <form id="login-form" name="login-form" class="nobottommargin" action="{{route('saveLicense')}}" method="post">
                                        @csrf
                                        <h3 class="center">{{$data_user->driving_license_number ? 'Update' : 'Add'}} your driving license</h3>
                                        @if($data_user->driving_license_number && !$data_user->is_driving_license_certified)
                                            <div style="margin-bottom: 10px;">Your driving license needs to be verified before you can create a ride. Please wait while we process yours.</div>
                                        @endif
                                        <div class="col_full">
                                            <label for="login-form-username">Number:</label>
                                            <input type="text" id="login-form-username" name="driving_license_number" value="{{$data_user ? $data_user->driving_license_number:''}}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Driving License Valid From:</label>
                                            <input type="date" id="driving_license_valid_from" name="driving_license_valid_from" value="{{ $data_user ? $data_user->driving_license_valid_from:''}}" class="form-control" />
                                        </div>

                                        <div class="col_full">
                                            <label for="login-form-password">Driving License Valid To:</label>
                                            <input type="date" id="driving_license_valid_to" name="driving_license_valid_to" value="{{ $data_user ? $data_user->driving_license_valid_to :''}}" class="form-control" />
                                        </div>
                                        <div class="col_full">
                                            <div class="form-group">
                                                <label class="form-group">Drivers license photo</label>
                                                <div class="d-flex">
                                                    <input style="display: none" type="file" name="avatar_file"
                                                           id="myFileInput" >
                                                    <input type="hidden" name="drivers_license_photo">
                                                    <div class="col-md-2 pt-cr-img pt-wrap-plus border-success"
                                                         onclick="document.getElementById('myFileInput').click();"
                                                         style="margin-right: 20px;width: 100px;height: 100px;border: #a9afbbd1 2px solid;border-radius:3px;font-size: 35px; cursor: pointer; color: #a9afbbd1;display: flex;justify-content: center;align-items: center">
                                                        +
                                                    </div>
                                                    <div id="img_show" class="d-flex" style="display: {{$data_user ? '':'none'}}">
                                                        <img src="{{$data_user ? $data_user->drivers_license_photo:''}}" class="img_show" style="width: 100px;height: 100px;border: #a9afbbd1 1px solid;border-radius:3px">
                                                    </div>
                                                </div>
                                            </div>

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

    </section><!-- #content end -->
@endsection
@section('botExtraJs')
    <script>
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
        back_to_profile.onclick = function (){
            window.location.href = location.protocol+"/profile";
        }
    </script>
@endsection

