<?php

namespace App\Http\Controllers;
use App\Models\Order; 
use App\Models\Ban; 
use App\Models\HoaDon;
use App\Models\ChiTietHoaDon; 
use Illuminate\Http\Request;

class Order_Controller extends Controller
{

    public function store(Request $request)
{

    $order = new Order(); 
    // Gán các giá trị từ biểu mẫu vào các thuộc tính của đơn hàng
    $order->ten_dv = $request->name;    
    $order->so_ban = $request->soban;    
    $order->don_gia = $request->gia;
    $order->so_luong = $request->input('so_luong');
    $order->ghi_chu = $request->ghichu;
    $order->gio_vao = now();
    // Lưu đơn hàng vào cơ sở dữ liệu
    $order->save();
    $ban = Ban::where('ten_ban', $request->soban)->first();
    $ban->tinhtrang =1;
    $ban->save();
return redirect()->back()->with('addsuccess','');
}
public function checkout(Request $request)
{

    $hoadon = new HoaDon();
    $hoadon->so_ban = $request->soban;
    $hoadon->gio_vao = $request->giovao; // Thời gian hiện tại, có thể sửa lại nếu cần
    $hoadon->ngay_lap = now();
    $hoadon->gio_ra= now();
    $hoadon->Tong_tien = $request->input('tong');
    $hoadon->save();

    // Lấy ID của hóa đơn vừa lưu
    $hoadon = HoaDon::orderBy('gio_vao', 'desc')->first();
    $hoadon_id = $hoadon->mahd;

        $ten_dv = $request->input('ten_dv');
        $so_luong = $request->input('so_luong');
        $don_gia = $request->input('don_gia');
        $ghi_chu = $request->input('ghi_chu');
        foreach ($ten_dv as $key => $ten) {
            $cthd = new ChiTietHoaDon();
            $cthd->mahd=$hoadon_id ;
            $cthd->ten_dv = $ten_dv[$key];
            $cthd->so_luong = $so_luong[$key];
            $cthd->don_gia = $don_gia[$key];
            $cthd->ghi_chu = $ghi_chu[$key];
            $cthd->save();
        }

        Order::where('so_ban', $request->soban)->delete();
        $ban = Ban::where('ten_ban', $request->soban)->first();
        $ban->tinhtrang =0;
        $ban->save();
        


        return redirect()->route('hoadon.hoadon', ['id' => $hoadon_id])->with('addsuccess', '');
}

}
