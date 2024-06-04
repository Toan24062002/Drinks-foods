<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHoaDon extends Model
{
    use HasFactory;
    protected $table = 'chitiethd';
    protected $fillable = ['mahd','ten_dv','don_gia','so_luong'];
    public $timestamps = false;
}
