<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn - {{$inhd->mahd}}</title>
    <script src="https://cdn.jsdelivr.net/npm/qrcode"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print {
            .print-hide {
                display: none;
            }
            button{
                display: none;
            }
        }
        .container {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 0px solid #ccc;
            border-radius: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 2px dashed  #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            margin-top: 20px;
            text-align: right;
        }
       
        footer {
            margin-top: 20px;
            text-align: center;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container print-container">
        <h1>Coffee Long Xuyên</h1>         
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=http://192.168.0.103/Drink_foods/hoadon/{{$inhd->mahd}}&amp;size=100x100" alt="" title="HELLO" />
        <p><strong>Mã Hóa Đơn:</strong> {{$inhd->mahd}} <strong style="padding-left:60px;"> Thu ngân:</strong>Mỏ Dảnh</p>
        <p><strong>Số Bàn:</strong> {{$inhd->so_ban}}</p>
        <p><strong>Giờ vào:</strong> {{ \Carbon\Carbon::parse($inhd->gio_vao)->format('H:i:s d/m/Y') }} </p>
        <p><strong>Giờ ra:</strong> {{ \Carbon\Carbon::parse($inhd->gio_ra)->format('H:i:s d/m/Y') }} </p>
        <!-- Hiển thị thông tin chi tiết hóa đơn -->
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Món</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Ghi Chú</th>
                </tr>
            </thead>
            <tbody>
                @php
                $stt=1
                @endphp
                @foreach ( $incthd as $in )
                <tr>
                    <td>{{$stt++}}</td>
                    <td>{{$in->ten_dv}}</td>
                    <td>{{$in->so_luong}}</td>
                    <td>{{$in->don_gia}}</td>   
                    <td>{{$in->ghi_chu}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p class="total"><strong>Tổng Tiền:</strong> {{$inhd->Tong_tien}}</p>
        <button class="btn btn-primary"  onclick="window.print()">In Hóa Đơn</button>
        <a  href="{{route('home.index')}}" class="btn btn-success">Trang chủ</a>
        <footer>
            <p><b>Website Design by Nguyễn Phước Toàn DH21PM AGU</b></p>
            <p>Liên hệ 0967386646 - nptoan2002@gmail.com để được hỗ trợ</p>
        </footer>
    </div> 
</body>
</html>