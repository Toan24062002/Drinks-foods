<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'oder';

    protected $fillable = ['ten_dv','so_luong','don_gia'];
    public $timestamps = false;
}
