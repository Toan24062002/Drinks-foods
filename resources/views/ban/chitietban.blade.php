@extends('layouts.home_layout')
@section('title', 'Quản lí quán ăn')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="container_ban mt-5  ">
    <div class="dsach">
        <h2 class="section-title" style="text-align:center;"><b>{{$ban->ten_ban}}</b></h2>
        <p><b>Giờ vào:</b> {{ \Carbon\Carbon::parse($ckin)->format('H:i:s d/m/Y') }} </p>
        <table style="width:100%;" class="table-primary ">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Số lượng</th>
                    <th>Gọi lúc</th>
                    <th>Giá</th>
                    <th>Ghi chú</th>
                    <th>Acction</th>
                </tr>
            </thead>
            <tbody>
            @php
                $stt = 1;
                $tongtien=0;
            @endphp
                @foreach ($oder as $acc)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$acc->ten_dv}}</td>
                        <td>{{$acc->so_luong}}</td>
                        <td>{{ \Carbon\Carbon::parse($acc->gio_vao)->format('H:i:s d/m/Y') }}</td>
                        <td>{{$acc->don_gia}}</td>
                        <td>{{$acc->ghi_chu}}</td>
                        <td><a href="" class="btn btn-info"><i class="bi bi-pencil-fill"></i></a> <a href=""
                                class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                                    class="bi bi-calendar-x"></i></a></td>
                    </tr>
                    @php
                        $tongtien += $acc->so_luong * $acc->don_gia;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4"></td>
                    <td><b>Tổng tiền:</b></td>
                    <td>{{$tongtien}}K</td>
                </tr>
                <tr >
                    <td colspan="4"></td>
                    <td>
                    <form action="{{route('order.checkout')}}" method="POST">
                        @csrf
                        <input type="hidden" name="soban" value="{{$ban->ten_ban}}">
                        <input type="hidden" name="tong" value="{{$tongtien}}">
                        <input type="hidden" name="giovao" value="{{$ckin}}">
                        <input type="hidden" name="giora" value="{{$ckout}}">
                        @foreach ($oder as $acc)
                            <input type="hidden" name="ten_dv[]" value="{{$acc->ten_dv}}">
                            <input type="hidden" name="so_luong[]" value="{{$acc->so_luong}}">
                            <input type="hidden" name="don_gia[]" value="{{$acc->don_gia}}">
                            <input type="hidden" name="ghi_chu[]" value="{{$acc->ghi_chu}}">
                        @endforeach
                        <button type="submit" class="btn bg-info"><i class="bi bi-cash-coin"></i> Thanh toán</button>
                    </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="container_ban mt-5  ">
    <h2 class="section-title" style="text-align:center;"><b>Menu</b></h2>

    <div class="ban-list">
        @foreach($menu as $ns)

            <div class="ban-item">

                <form action="{{ route('order.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="ban-list">
                            <div class="ban-item">
                                <div class="form-group">
                                    <input  type="hidden" name="soban" value="{{$ban->ten_ban}}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="name" value="{{$ns->ten}}">
                                    <b>{{$ns->ten}}</b>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Giá: {{$ns->gia}} VNĐ</label>
                                    <input  type="hidden" name="gia" value="{{$ns->gia}}">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Số lượng:</label>
                                    <input class="form-control" type="number" name="so_luong" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ghi chú:</label>
                                    <input class="form-control" type="text" name="ghichu">
                                </div>
                                <button type="submit" class="btn btn-outline-info mt-2"><i
                                        class="bi bi-plus-square-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection