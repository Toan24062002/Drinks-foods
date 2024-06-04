<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class Menu_Controller extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        return view('menu.index',compact('menu'));
    }
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->ten = $request->ten;
        $menu->loai = $request->loai;
        $menu->gia = $request->gia;
        $menu->save();
        return redirect()->route('menu.index')->with('addsuccess', '');

    }
    public function delete($id){
        $menu = Menu::findOrFail($id);
    $menu->delete();

    return redirect()->route('menu.index')->with('deletesuccess', '');

    }
}
