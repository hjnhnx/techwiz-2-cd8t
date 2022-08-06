
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head');
    @yield('styleModel');
</head>

<body class="dark-edition">

<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="{{route('index')}}" class="simple-text logo-normal">
                CarShare
            </a></div>
        <div class="sidebar-wrapper">
            @include('admin.layout.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">@yield('title')</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                    <span class="navbar-toggler-icon icon-bar"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @yield('error')
                @yield('content')
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content avatar_user" id="img01">
            <div id="caption"></div>
        </div>
        <footer class="footer col-md-12">
            <div class="container-fluid">
                <div class="copyright">
                      © 2021 Coder 8 Tuoi
                </div>
            </div>
        </footer>
    </div>
</div>
@include('admin.layout.script')
@yield('extraJs')

</body>

</html>
