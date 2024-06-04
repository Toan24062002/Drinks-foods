<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';

    protected $fillable = ['mahd','ngay_lap','so_ban','gio_vao','gio_ra','Tong_tien'];
    public $timestamps = false;
}
