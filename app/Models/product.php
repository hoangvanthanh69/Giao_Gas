<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_product';
    protected $fillable = [
        'name_product', 'loai', 'price', 'code_product', 'original_price', "image"
    ];

    function product_total() {
        return product::select()->count();
    }
}


