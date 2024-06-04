@extends('layouts.master_layout')
@section('title', 'Quản lý bàn')
@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="dsach">
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Thêm 
</button>
    <table class="table-primary">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>Acction</th> 
            </tr> 
        </thead>
        <tbody>
            @foreach ($ban as $mn )
            <tr>
                <td>{{$mn->id}}</td>
                <td>{{$mn->ten_ban}}</td>
                <td>
                    @if ($mn->loai_ban == 1)
                    Bàn thường
                    @elseif ($mn->loai_ban == 2)
                    Bàn BILLIARD - 3B
                    @else
                    Bàn BILLIARD - Lỗ
                    @endif
                </td>
                <td><a href="" class="btn btn-info"><i
                            class="bi bi-pencil-fill"></i></a> <a href="{{route('menu.delete',$mn->id)}}"
                        class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
                            class="bi bi-calendar-x"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm bàn</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('ban.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ten">Tên:</label>
                <input type="text" class="form-control" id="ten" name="ten">
            </div>
            <div class="form-group">
                <label for="loai">Loại:</label>
                <select class="form-control" id="loai" name="loai">
                    <option value="1">Bàn thường</option>
                    <option value="2">Bàn BILLIARD - 3B</option>
                    <option value="3">Bàn BILLIARD - Lỗ</option>
                </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endsection