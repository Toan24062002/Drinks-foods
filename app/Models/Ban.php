<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    use HasFactory;
    protected $table = 'ban';

    protected $fillable = ['ten_ban','loai_ban'];
    public $timestamps = false;
}
