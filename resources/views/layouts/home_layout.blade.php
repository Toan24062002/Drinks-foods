<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('public/css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container">
        <header class="mt-5">
            <div class="navigation">
                <ul>
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Giới thiệu</a></li>
                    <li><a href="">Dịch vụ</a></li>
                    <a href="{{route('home.index')}}"><img src="{{asset ('public/pic/logo.png')}}" alt=""></a>
                    <li><a href="">Tin tức</a></li>
                    <li><a href="">Liên hệ</a></li>
                    <li><a href="">Thành viên</a></li>
                </ul>
            </div>
        </header>
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
        </div>

    </div>

</body>

</html>