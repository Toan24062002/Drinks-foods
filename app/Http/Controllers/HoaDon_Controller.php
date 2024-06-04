<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\HoaDon; 
use App\Models\ChiTietHoaDon; 
use Illuminate\Support\Carbon;


class HoaDon_Controller extends Controller
{
    public function index()
    {
        $hoadon = HoaDon::all();
        $hoadonData = HoaDon::select('so_ban', DB::raw('SUM(Tong_tien) as Tong_tien'))
                         ->groupBy('so_ban')
                         ->get();
        return view("hoadon.index", compact("hoadon","hoadonData"));
    }
    public function showhd($id)
    {
        $inhd = HoaDon::where('mahd', $id)->first();
        $incthd = ChiTietHoaDon::where('mahd', $id)->get();
        return view("hoadon.hoadon",compact('inhd','incthd'));
    }
    public function findbyhd(Request $request)  
    {
        if ($request->findhd != null) {
            $findhd = $request->input('findhd');
            $hoadonf = HoaDon::where('mahd', $findhd)->get();
            return view("hoadon.indexfind",compact("hoadonf"));
        }
        else {
            $hoadon = HoaDon::all();
            return view("hoadon.index", compact("hoadon"));

        }
        


    }
    public function thongke()
    {
        $ngayHienTai = Carbon::now()->toDateString();

        $hoadon = HoaDon::all();
        $tongtien = 0;
        foreach($hoadon as $hd)
        {
            $tongtien += $hd->Tong_tien;
        }
        $doanhthungay = HoaDon::where('ngay_lap',$ngayHienTai)->get();
        $tongtienngay = 0;
        foreach($doanhthungay as $hd)
        {
            $tongtienngay += $hd->Tong_tien;
        }
        $topmenu = ChiTietHoaDon ::select('ten_dv', DB::raw('SUM(so_luong) as so_luong'))->groupBy('ten_dv')->orderByDesc(DB::raw('SUM(so_luong)'))->take(3)->get();
        return view ("hoadon.thongke",compact("tongtien","ngayHienTai","tongtienngay","topmenu"));
    }
}