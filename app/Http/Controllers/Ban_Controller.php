<?php

namespace App\Http\Controllers;
use App\Models\Ban;
use App\Models\Menu;
use App\Models\Order;

use Illuminate\Http\Request;

class Ban_Controller extends Controller
{
    public function index()
    {
        $ban = Ban::all();
        return view('ban.index',compact('ban'));
    }
     
    public function store(Request $request)
    {
        $ban = new Ban();
        $ban->ten_ban = $request->ten;
        $ban->loai_ban = $request->loai;
        $ban->save();
        return redirect()->route('ban.index')->with('addsuccess', '');

    }
    public function delete($id){
        $ban = Ban::findOrFail($id);
    $ban->delete();

    return redirect()->route('menu.index')->with('deletesuccess', '');

    }
    public function chitietban($id){
        $ban = Ban::findOrFail($id);
        $menu = Menu::all();
        $oder = Order::where('so_ban', $ban->ten_ban)->get();
        $ckin = Order::where('so_ban', $ban->ten_ban)
        ->orderBy('gio_vao')
        ->value('gio_vao');
        $ckout = Order::where('so_ban', $ban->ten_ban)
        ->orderBy('gio_ra','asc')
        ->value('gio_ra');
        return view('ban.chitietban', compact('ban','menu','oder','ckin','ckout'));
    }
    public function checkout(Request $request)
    {
        
    }
}
