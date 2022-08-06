<link
    href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i"
    rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{url('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}">
<link rel="stylesheet"
      href="{{url('https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{lib_assets('web/css/bootstrap.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/style.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/font-icons.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/animate.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/magnific-popup.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/ride_details.css')}}">
<link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}">
<link rel="stylesheet" href="{{lib_assets('web/css/responsive.css')}}" type="text/css"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" type="text/css" href="{{lib_assets('web/css/settings.css')}}" media="screen"/>
<link rel="stylesheet" type="text/css" href="{{lib_assets('web/css/layers.css')}}">
<link rel="stylesheet" type="text/css" href="{{lib_assets('web/css/navigation.css')}}">
<link rel="stylesheet" href="{{lib_assets('web/css/components/datepicker.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/components/timepicker.css')}}" type="text/css"/>
<link rel="stylesheet" href="{{lib_assets('web/css/components/daterangepicker.css')}}" type="text/css"/>
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-messaging.js"></script>
<style>
    #content {
        overflow: inherit;
    !important;
    }

    html,
    body {
        margin: 0;
        padding: 0;
    }

    @media only screen and (min-width: 600px) {
        #map {
            width: 100%;
            height: 100%;
        }

        .container_map {
            height: 400px;
            position: sticky;
            top: 0;
            float: right
        }

        form {
            margin: auto;
        }
    }

    @media only screen and (max-width: 599px) {
        #map {
            width: 100%;
            height: 100%;
        }

        .container_map {
            height: 600px;
            position: absolute;
            top: 490px;
            float: left;
        }

        form {
            margin: auto;
            padding-top: 20px;
        }
    }

    #origin-input:focus,
    #destination-input:focus {
        border-color: #4d90fe;
    }

    #mode-selector label {
        font-family: Roboto, serif;
        font-size: 13px;
        font-weight: 300;
    }

    .error {
        color: red;
        margin-top: 10px;
    }

    .container input {
        opacity: 1 !important;
        position: inherit !important;
    }

    .tp-caption.NotGeneric-CallToAction, .NotGeneric-CallToAction {
        text-align: center !important;
    }

    .revtp-searchform input[type="text"] {
        width: auto !important;
    }

    .sign-iu {
        display: none;
        right: 0;
        width: 130px;
        position: absolute;
        top: 60px;
        -webkit-transition: opacity .5s ease, top .4s ease;
        -o-transition: opacity .5s ease, top .4s ease;
        transition: opacity .5s ease, top .4s ease;
    }

    .sign-iu1 {
        display: block;
        right: 0;
        width: 130px;
        position: absolute;
        top: 60px;
        -webkit-transition: opacity .5s ease, top .4s ease;
        -o-transition: opacity .5s ease, top .4s ease;
        transition: opacity .5s ease, top .4s ease;
    }

    @media only screen and (max-width: 999px) {
        .footer_responsive {
            width: 100%;
            border-bottom: 2px solid black;
            text-align: center;
        }

        .container_footer_root {
            display: block;
        }

        .container_footer {
            margin: 0;
        }
    }

    @media only screen and (min-width: 1000px) {
        .container_footer {
            margin: 30px auto 0 auto;
        }

        .container_footer_root {
            display: flex;
        }
    }

    @media only screen and (min-width: 1201px) {
        .iconbar {
            display: none;
        }

        .container_footer {
            margin: 30px auto 0 auto;
        }

        .container_footer_root {
            display: flex;
        }
    }
    @media only screen and (max-width: 1200px) {
        .txt_baner {
            display: none !important;
        }
        #header.full-header #primary-menu > ul {
            float: left;
            border-right: 1px solid #EEE;
        }

        .iconbar {
            right: 0;
            position: absolute;
            top: 50%;
            margin-top: -25px;
            width: 50px;
            height: 50px;
            line-height: 50px;
            -o-transition: opacity .3s ease;
            display: block;
        }

        .menu_top {
            display: none;
        }

        #primary-menu {
            height: 200px !important;
        }

        .container_footer {
            margin: 30px auto 0 auto;
        }

        .container_footer_root {
            display: flex;
        }
    }

    @media only screen and (max-width: 500px) {
        #logo {
            width: 60%;
        }

        #primary-menu {
            background: white;
            height: 450px !important;
        }

        .container_footer {
            margin: 30px auto 0 auto;
        }

        .container_footer_root {
            display: flex;
        }
    }

    .accountn {
        display: none;
    }

    .container input {
        opacity: 1 !important;
        position: inherit !important;
    }

    .tp-caption.NotGeneric-CallToAction, .NotGeneric-CallToAction {
        text-align: center !important;
    }

    .revtp-searchform input[type="text"] {
        width: auto !important;
    }

    .button.button-reveal span {
    }

    label.error {
        display: inline-block !important;
    }

    .table > tbody > tr > td {
        padding: 13px !important;
    }

    label.error {
        display: inline-block !important;
    }

    .notification {
        display: none;
        overflow: hidden;
    }

    .title-conten {
        margin: 10px 0 20px;
    }
</style>
