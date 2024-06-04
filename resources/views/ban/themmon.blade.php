@extends('layouts.master_layout')
@section('title', 'Quản lý bàn')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<h1 class="modal-title fs-5" id="exampleModalLabel">Thêm món - {{$ban->ten_ban}}</h1>
@foreach($menu as $ns)
<form action="{{ route('order.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <div class="ban-list">

            <div class="ban-item">
                <div class="form-group">
                    <input type="hidden" name="soban" value="{{$ban->ten_ban}}">
                </div>
                <div class="form-group">
                    <input type="text" name="name" value="{{$ns->ten}}">
                    {{$ns->ten}}
                    <input type="number" name="gia" value="{{$ns->gia}}">
                </div>
                <div class="form-group">
                    <label>Số lượng:</label>
                    <input type="number" name="so_luong">
                </div>
                <div class="form-group">
                    <label>Ghi chú:</label>
                    <input type="text" name="ghichu">
                </div>
                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-plus-square-fill"></i></button>
            </div>
        </div>
    </div>

    </div>
</form>
@endforeach
@endsection