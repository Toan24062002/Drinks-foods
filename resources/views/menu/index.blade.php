@extends('layouts.master_layout')
@section('title', 'Quản lí quán ăn')
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
                <th>Giá</th>
                <th>Acction</th> 
            </tr> 
        </thead>
        <tbody>
            @foreach ($menu as $mn )
            <tr>
                <td>{{$mn->id}}</td>
                <td>{{$mn->ten}}</td>
                <td>
                    @if ($mn->loai == 1)
                    Đồ uống
                    @elseif ($mn->loai == 2)
                    Đồ ăn
                    @else
                    Game
                    @endif
                </td>
                <td>{{$mn->gia}}</td>
                <td>
                    <a href="#" class="btn btn-info" onclick="editMenu({{$mn->id}}, '{{$mn->ten}}', {{$mn->loai}}, {{$mn->gia}})">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <a href="{{ route('menu.delete', $mn->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                        <i class="bi bi-calendar-x"></i>
                    </a>
                </td>
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm món</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{ route('menu.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="ten">Tên:</label>
                <input type="text" class="form-control" id="ten" name="ten">
            </div>
            <div class="form-group">
                <label for="loai">Loại:</label>
                <select class="form-control" id="loai" name="loai">
                    <option value="1">Đồ uống</option>
                    <option value="2">Đồ ăn</option>
                    <option value="3">Game</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gia">Giá:</label>
                <input type="number" class="form-control" id="gia" name="gia">
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
<script>
    function editMenu(id, ten, loai, gia) {
        $('#editId').val(id);
        $('#editTen').val(ten);
        $('#editLoai').val(loai);
        $('#editGia').val(gia);
        $('#editModal').modal('show');
    }
</script>
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Chỉnh sửa món</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="editId" name="id">
                    <div class="form-group">
                        <label for="editTen">Tên:</label>
                        <input type="text" class="form-control" id="editTen" name="ten">
                    </div>
                    <div class="form-group">
                        <label for="editLoai">Loại:</label>
                        <select class="form-control" id="editLoai" name="loai">
                            <option value="1">Đồ uống</option>
                            <option value="2">Đồ ăn</option>
                            <option value="3">Game</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editGia">Giá:</label>
                        <input type="number" class="form-control" id="editGia" name="gia">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection