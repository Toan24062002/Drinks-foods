<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('public/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('public/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('public/css/admin.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('menu.index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text mx-3"><img src="{{ asset('public/pic/1.png') }}" alt=""></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="">
                    <i class="fas fa-fw bi-person-fill-gear"></i>
                    <span>Tài khoản</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-menu-down"></i>
                    <span>Menu</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thông tin:</h6>
                        <a class="collapse-item" href="{{route('menu.index')}}">Drink</a>
                        <a class="collapse-item" href="{{route('menu.index')}}">Foods</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-columns-gap"></i> <span>Bàn</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Thông tin bàn:</h6>
                        <a class="collapse-item" href="{{route('ban.index')}}">Bàn thường</a>
                        <a class="collapse-item" href="{{route('ban.index')}}">Bàn BILLIARD</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-grid-3x3"></i> <span>Kho</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Nguyên liệu đồ uống</a>
                        <a class="collapse-item" href="">Nguyên liệu đồ ăn</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="{{route('hoadon.index')}}">
                <i class="bi bi-receipt"></i>
                    <span>Hóa đơn</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="{{route('hoadon.thongke')}}">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>Thống kê</span></a>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <div class="toppro">

                <div class="ttadmin">
                    <span><i class="bi bi-person-circle"></i> {{session('user_name')}}</span>
                    <a href=""><i class="bi bi-box-arrow-right"></i></a>
                </div>

            </div>


            <div id="content">
                @yield('content')
                @if(Session::has('addsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Thêm thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('addpksuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Thêm gia phả thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('editsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Cập nhật người dùng thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('udnewsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Cập nhật tin tức thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('deletesuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Xóa người dùng thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('addimgsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Thêm ảnh thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('editimgsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Cập nhật ảnh thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút 
                        });
                    </script>
                @endif
                @if(Session::has('editpksuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Cập nhật phả kí thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút 
                        });
                    </script>
                @endif
                @if(Session::has('deleteimgsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Xóa ảnh thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút
                        });
                    </script>
                @endif
                @if(Session::has('editintrosuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Cập nhật thông tin giới thiệu thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút 
                        });
                    </script>
                @endif
                @if(Session::has('loginsuccess'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Đăng nhập thành công!",
                            icon: "success",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút 
                        });
                    </script>
                @endif
                @if(Session::has('notlogin'))
                    <script>
                        swal({
                            title: "Thông báo",
                            text: "Đăng nhập bằng tài khoản quản trị!",
                            icon: "info",
                            timer: 1000, // Thời gian tự động đóng trong miligiây (3 giây)
                            buttons: false // Ẩn nút 
                        });
                    </script>
                @endif
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Nguyễn Phước Toàn - DPM205495 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('public/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('public/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('public/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('public/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('public/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>