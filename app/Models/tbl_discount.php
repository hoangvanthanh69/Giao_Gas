<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class tbl_discount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_discount';
    protected $fillable = [
        'name_voucher', 'ma_giam', 'so_luong', 'phan_tram_giam', 'thoi_gian_giam', 'het_han'
    ];
}