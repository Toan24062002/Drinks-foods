<?php
use App\Http\Controllers\Menu_Controller;
use App\Http\Controllers\Ban_Controller;
use App\Http\Controllers\Order_Controller;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\HoaDon_Controller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
 Route::get('/menu', [Menu_Controller::class, 'index'])->name('menu.index');
 Route::post('Menu/Themmoi', [Menu_Controller::class, 'store'])->name('menu.store');
 Route::get('/menu', [Menu_Controller::class, 'index'])->name('menu.index');
 Route::get('menu//{id}/Delete', [Menu_Controller::class, 'delete'])->name('menu.delete');
 Route::get('/home', [Home_Controller::class, 'index'])->name('home.index');
 Route::get('/ban', [Ban_Controller::class, 'index'])->name('ban.index');
 Route::post('Ban/Themmoi', [Ban_Controller::class, 'store'])->name('ban.store');
 Route::get('//{id}/Chitietban', [Ban_Controller::class, 'chitietban'])->name('ban.chitietban');
 Route::post('Oder/Themmoi', [Order_Controller::class, 'store'])->name('order.store');
 Route::post('Oder/Thanhtoan', [Order_Controller::class, 'checkout'])->name('order.checkout');
 Route::get('/hoadon', [HoaDon_Controller::class, 'index'])->name('hoadon.index');
 Route::get('/hoadon/{id}', [HoaDon_Controller::class, 'showhd'])->name('hoadon.hoadon');
 Route::post('/hoadon/timkiem', [HoaDon_Controller::class, 'findbyhd'])->name('hoadon.indexfind');
 Route::get('/thongke', [HoaDon_Controller::class, 'thongke'])->name('hoadon.thongke');
   