<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layout.head')
</head>
<body class="dark-edition">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
        <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
                Creative Tim
            </a></div>
        <div class="sidebar-wrapper">
            @include('admin.layout.sidebar')
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <a class="navbar-brand" href="javascript:void(0)">Table List</a>
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title ">Orders Detail</h3>
                                <p class="card-category"> Here is a subtitle for this table</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>ID</h3>
                                        </th>
                                        <th>
                                            <h3>Product ID</h3>
                                        </th>
                                        <th>
                                            <h3>Unit Price</h3>
                                        </th>
                                        <th>
                                            <h3>Quantity</h3>
                                        </th>
                                        <th>
                                            <h3>Edit</h3>
                                        </th>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h4>1</h4>
                                            </td>
                                            <td>
                                                <h4>555</h4>
                                            </td>
                                            <td>
                                                <h4>10</h4>
                                            </td>
                                            <td>
                                                <h4>700</h4>
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-danger">Delete</button></a>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                                <a href=""><button class="btn btn-warning">Detail</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>2</h4>
                                            </td>
                                            <td>
                                                <h4>666</h4>
                                            </td>
                                            <td>
                                                <h4>15</h4>
                                            </td>
                                            <td>
                                                <h4>3</h4>
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-danger">Delete</button></a>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                                <a href=""><button class="btn btn-warning">Detail</button></a>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="copyright" id="date">
                    , made with <i class="material-icons">favorite</i> by
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                </div>
            </div>
        </footer>
    </div>
</div>
<div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        @include('admin.layout.edit_style')
    </div>
</div>
<input type="hidden" value="order_detail" id="page_active">
@include('admin.layout.script')
</body>
</html>
