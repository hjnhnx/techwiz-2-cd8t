<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title> Material Dashboard Dark Edition by Creative Tim </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="{{url('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}"/>
    <link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css')}}">
    <!-- link icon -->
    <script src="{{url('https://kit.fontawesome.com/2a33a147b1.js')}}" crossorigin="anonymous"></script>
    <style>
        .login-box {
            width: 30%;
            margin-left: 35%;
        }
        .card-body-1 {
            padding: 5%;
        }
        .login-form {
            width: 90%;
            padding: 0 2%;
            margin: 5%;
        }
        .fa-facebook-square:hover {
            color: #2d8cff;
            zoom: 200%;
            cursor: pointer;
        }
        .fa-instagram:hover {
            color: #ff9220;
            zoom: 200%;
            cursor: pointer;
        }
        .fa-twitter:hover {
            color: #2d8cff;
            zoom: 200%;
            cursor: pointer;
        }
        .fa-line:hover {
            color: #35ff2b;
            zoom: 200%;
            cursor: pointer;
        }
        .fa-skype:hover {
            color: #2cc0ff;
            zoom: 200%;
            cursor: pointer;
        }
        .errorMsg {
            color: red;
        }
        .color-black {
            color: black !important;
        }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin: 50px auto;">
    <div class="card card-outline card-primary card-1 mt-5">
        <div class="card-body-1">
            <p class="login-box-msg text-center text-center-1" style="font-size: 280%">Login</p>
            <form id="login" method="post" action="#" class="login-form">
                <div class="validate">
                    <div class="input-group mb-3 mt-5">
                        <input type="email" name="email" class="form-control color-black" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="validate">
                    <div class="input-group mb-3 mt-4">
                        <input type="password" name="password" class="form-control color-black" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3 mt-4">
                    <button type="submit" class="btn btn-block my-2" style="background: #7b1fa2; color: white">Sign In</button>
                </div>
            </form>
        </div>
    </div>
    <input type="hidden" value="user" id="page_active">
</div>
<script src="{{url('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.s')}}"></script>
<script src="{{url('https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js')}}"></script>
<script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js')}}"></script>

<script>
    $(function () {
        $('#login').validate({
            rules: {
                email: {
                    required: true,
                    maxlength: 255,
                    email: true,
                },
                password: {
                    required: true,
                    minLength: 6,
                },
            },
            messages: {
                email: {
                    required: 'Please enter email',
                    maxlength: 'Email name is limited to 255 characters',
                    email: 'Please enter true email'
                },
                password: {
                    required: 'Please enter a password'
                },
            },
            errorClass: 'errorMsg',
            errorPlacement: function (error, element) {
                error.appendTo(element.parents('.validate'));
            }
        });
    })
</script>
</body>
</html>
