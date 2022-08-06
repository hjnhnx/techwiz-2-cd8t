<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    @include('web.layout.style')
    <title>@yield('title') | CarShare</title>
    @yield('headExtraJs')
</head>
<body class="stretched">
@include('web.layout.header')
<div id="wrapper" class="clearfix">
    @yield('content')
</div><!-- #wrapper end -->
<div id="gotoTop" class="fa fa-home icon-angle-up"></div>
@include('web.layout.footer')
@include('web.layout.script')
@yield('botExtraJs')
</body>
</html>
