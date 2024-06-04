<?php

namespace App\Http\Controllers;
use App\Models\Ban;

use Illuminate\Http\Request;

class Home_Controller extends Controller
{
    public function index()
    {
        $ban = Ban::all();
        return view('home.index', compact('ban'));
    }
    public function ban()
    {
        $ban = Ban::all();
        return view('home', compact(''));
    }
}
