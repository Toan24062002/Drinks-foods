@extends('layouts.home_layout')
@section('title', 'Quản lí quán ăn')
@section('content')
<div class="container_ban mt-5  ">
    <h2 class="section-title" style="text-align:center;"><b>Bàn thường</b></h2>
    <div class="ban-list">
        @foreach($ban as $ns)
        @if($ns->loai_ban==1)
        @if($ns->tinhtrang==1)
        <a href="{{route('ban.chitietban',$ns->id)}}">  
        <div class="ban-item" style="background-color: cadetblue; display:flex;">
                   {{$ns->ten_ban}} | 
                   <p><b>Có khách</b></p>
        </div>
        </a>
        @else
        <a href="{{route('ban.chitietban',$ns->id)}}">  
        <div class="ban-item">
                   {{$ns->ten_ban}}
        </div>
        </a>
        @endif
        @endif
        @endforeach
    </div>
    <h2 class="section-title mt-5" style="text-align:center;"><b>Bàn BILLIARD - 3B</b></h2>
    <div class="ban-list">
        @foreach($ban as $ns)
        @if($ns->loai_ban==2)
        <a href="{{route('ban.chitietban',$ns->id)}}">  
        <div class="ban-item">
                {{$ns->ten_ban}}
        </div>
        </a>
        @endif
        @endforeach
    </div>
    <h2 class="section-title mt-5" style="text-align:center;"><b>Bàn BILLIARD - Lỗ</b></h2>
    <div class="ban-list">
        @foreach($ban as $ns)
        @if($ns->loai_ban==3)
        <a href="{{route('ban.chitietban',$ns->id)}}">  
        <div class="ban-item">
                {{$ns->ten_ban}}
        </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection