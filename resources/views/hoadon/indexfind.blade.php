@extends('layouts.master_layout')
@section('title', 'Quản lí quán ăn')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="dsach">
    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <form class="d-flex" role="search" action="{{ route('hoadon.indexfind') }}" method="POST">
    @csrf

      <input class="form-control me-2" type="search" placeholder="Tìm theo mã hóa đơn" aria-label="Search" name="findhd">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
  <div class="container-fluid mt-3">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Tìm theo ngày" aria-label="Search">
      <button class="btn btn-success" type="submit">Search</button>
    </form>
  </div>
</nav>
    <table class="table-primary">
        <thead>
            <tr>
                <th>Mã hóa đơn</th>
                <th>Bàn</th>
                <th>Ngày lập</th>
                <th>Tổng tiền</th>
                <th>Acction</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hoadonf as $mn)
                <tr>
                    <td>{{$mn->mahd}}</td>
                    <td>{{$mn->so_ban}}</td>
                    <td>{{ \Carbon\Carbon::parse($mn->ngay_lap)->format('d/m/Y') }}</td>
                    <td>{{$mn->Tong_tien}}đ</td>
                    <td><a href="{{ route('hoadon.hoadon', $mn->mahd) }}" class="btn btn-warning"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection