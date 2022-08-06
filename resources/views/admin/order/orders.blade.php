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
        <!-- Navbar -->
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
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h3 class="card-title " style="display: inline-block;margin-right: 30px">Orders</h3>
                                <form action="#" style="display: inline-block;margin-right: 30px">
                                    <div class="form-group no-border">
                                        <input type="text" placeholder="Search by keyword" style="background: none;border: none;color: #9c9b9b">
                                        <button type="submit" class="btn btn-default btn-round btn-just-icon">
                                            <i class="material-icons">search</i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                                <label>Filter by order status</label>
                                <select id="fillter_by_status" class="select custom-select" name="fillter_by_status">
                                    <option value="Order" selected>All</option>
{{--                                    đặt hàng--}}
                                    <option value="Order">Order</option>
{{--                                    hàng trong tay đơn vị vận chuyển--}}
                                    <option value="Delivery">Delivery</option>
{{--                                    đã nhận hàng và thanh toán--}}
                                    <option value="Receive">Receive</option>
{{--                                    đã hủy đơn--}}
                                    <option value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                        <th>
                                            <h3>ID</h3>
                                        </th>
                                        <th>
                                            <h3>Customer Name</h3>
                                        </th>
                                        <th>
                                            <h3>Address</h3>
                                        </th>
                                        <th>
                                            <h3>Email</h3>
                                        </th>

                                        <th>
                                            <h3>Phone Number</h3>
                                        </th>
                                        <th>
                                            <h3>Toltal Price</h3>
                                        </th>
                                        <th>
                                            <h3>Status</h3>
                                        </th>
                                        <th>
                                            <h3>Action</h3>
                                        </th>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <h4>1</h4>
                                            </td>
                                            <td>
                                                <h4>Dakota Rice</h4>
                                            </td>
                                            <td>
                                                <h4>Đây là address</h4>
                                            </td>
                                            <td>
                                                <h4>daylaemail@gmail.com</h4>
                                            </td>
                                            <td>
                                                <h4>0989987789</h4>
                                            </td>
                                            <td>
                                                <h4>1350</h4>
                                            </td>
                                            <td>
                                                <h4>Tiếp nhận hàng</h4>
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
                                                <h4>Dakota Rice</h4>
                                            </td>
                                            <td>
                                                <h4>Đây là address</h4>
                                            </td>
                                            <td>
                                                <h4>daylaemail@gmail.com</h4>
                                            </td>
                                            <td>
                                                <h4>0989987789</h4>
                                            </td>
                                            <td>
                                                <h4>3530</h4>
                                            </td>
                                            <td>
                                                <h4>Đang giao hàng</h4>
                                            </td>
                                            <td>
                                                <a href=""><button class="btn btn-danger">Delete</button></a>
                                                <a href=""><button class="btn btn-success">Edit</button></a>
                                                <a href=""><button class="btn btn-warning">Detail</button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>3</h4>
                                            </td>
                                            <td>
                                                <h4>Dakota Rice</h4>
                                            </td>
                                            <td>
                                                <h4>Đây là address</h4>
                                            </td>
                                            <td>
                                                <h4>daylaemail@gmail.com</h4>
                                            </td>
                                            <td>
                                                <h4>0989987789</h4>
                                            </td>
                                            <td>
                                                <h4>3502</h4>
                                            </td>
                                            <td>
                                                <h4>Đã thanh toán</h4>
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
<input type="hidden" value="order" id="page_active">
@include('admin.layout.script')
<script>
    $('#fillter_by_status').change(function (){
        // window.location.href = "http://facebook.com"
    })
</script>
</body>
</html>
