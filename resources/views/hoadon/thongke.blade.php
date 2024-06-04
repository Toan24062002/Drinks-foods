@extends('layouts.master_layout')
@section('title', 'Quản lí quán ăn')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="dsach">
<p><b>Tổng doanh thu:</b> {{ number_format($tongtien, 3, ',', '.') }} vnđ</p>
<p><b>Ngày hôm nay:</b> {{$ngayHienTai}}</p>
<p><b>Top drinks:</b></p>

@foreach ($topmenu as  $key => $top )
    
        <p>+Top {{$key + 1}}: {{$top->ten_dv}} - {{$top->so_luong}} lượt bán</p>    
@endforeach
<canvas id="myChart" width="50px" height="10px"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar', // Loại biểu đồ (ví dụ: bar, line, pie)
    data: {
        labels: ['Tổng doanh thu', 'Doanh thu hôm nay'], // Nhãn trục x
        datasets: [{
            label: 'Thống kê',
            data: [{{$tongtien}}, {{$tongtienngay}}, 3, 5, 2, 3], // Dữ liệu
            backgroundColor: [ // Màu nền của các cột
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [ // Màu đường viền của các cột
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 0.5 // Độ rộng của đường viền
        }]
    },
    options: {
    indexAxis: 'x', // Sử dụng trục y để hiển thị dữ liệu
    scales: {
        y: {
            beginAtZero: true // Bắt đầu trục y từ 0
        }
    },
    elements: {
        bar: {
            borderWidth: 2,
            borderRadius: 2
        }
    },
    layout: {
        padding: {
            left: 10,
            right: 10,
            top: 0,
            bottom: 0
        }
    },
    barPercentage: 0.3 // Điều chỉnh độ rộng của cột theo trục y
}
});
</script>
@endsection