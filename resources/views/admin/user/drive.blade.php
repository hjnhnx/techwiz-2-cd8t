<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layout.head');
</head>

<body class="dark-edition">
<input type="hidden" value="Approve" id="page_active">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a></div>
        <div class="sidebar-wrapper">
            @include('admin.layout.sidebar')
        </div>
        <style>
            .avatar_user{
                border:none !important;
            }
            .rounded-circle{
                border:none !important;
            }
        </style>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Users List</a>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @if(session()->get('status'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> {{ session()->get( 'user' ) }}
                                    {{ session()->get( 'status' ) }}
                                </div>
                            @endif
                            <div class="card-header card-header-primary card-container">
                                <h3 class="card-title ">Users</h3>
                                <form name="filterForm">
                                    <div class="form-group no-border">
                                        <input type="text" name="search" value="" placeholder="Search by keyword"required/>
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">

                                        <th>
                                            <h3 style="float: left">Full name</h3>
                                        </th>
                                        <th>
                                            <h3 style="float: left">Driving License Number</h3>
                                        </th>

                                        <th>
                                            <h3 style="float: left">Drivers  License  Photo</h3>
                                        </th>
                                        <th>
                                            <h3 style="float: left">Action</h3>
                                        </th>
                                        </thead>
                                        <tbody>
                                        @foreach($dtuser as $user)
                                            <tr></tr>
                                            <div class="modal fade" id="DeleteUser{{ $user->id }}" tabindex="-1"
                                                 role="dialog" aria-labelledby="deleteUser"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to update is driving license certified True by
                                                                <b>{{$user->first_name.' '.$user->last_name}} </b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                            <a href="{{route('set',$user->id)}}"
                                                               class="btn btn-primary">Update</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <tr>
                                                <td>{{$user->first_name.' '.$user->last_name}}
                                                </td>
                                                <td>{{$user->driving_license_number}}
                                                </td>
                                                <td>
                                                    <img class="rounded-circle avatar" src="{{ $user->drivers_license_photo }}" >
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-success" data-toggle="modal" data-target="#DeleteUser{{ $user->id }}">Update</a>
                                                </td>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content avatar_user" id="img01">
            <div id="caption"></div>
        </div>
        <footer class="footer col-md-12">
            <div class="container-fluid">
                <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="https://creative-tim.com/presentation">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="https://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="row">


                </div>

                <div class="copyright" id="date">
                    made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
        <script>
            const x = new Date().getFullYear();
            let date = document.getElementById('date');
            date.innerHTML = '&copy; ' + x + date.innerHTML;
            const limitInput = document.querySelector('select[name="limit"]');
            const formSearch = document.forms['filterForm'];
            const keywordInput = document.querySelector('input[name="search"]');
            keywordInput.onkeypress = function (event) {
                if (event.key == 'Enter') {
                    formSearch.submit();
                }
            }
            if (limitInput) {
                limitInput.onchange = function () {
                    formSearch.submit();
                }
            }

        </script>

    </div>
</div>
<div class="fixed-plugin">

    <div class="fixed-plugin">
        <div class="dropdown show-dropdown">

        </div>
    </div>

</div>
<input type="hidden" value="user" id="page_active">
<!--   Core JS Files   -->
@include('admin.layout.script')

</body>

</html>
