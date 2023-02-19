<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class order_product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'order_product';
    protected $fillable = [
        'nameCustomer', 'phoneCustomer', 'diachi', 'country', 'state', 'district', 'ghichu', 'amount', 'type', 'idProduct', 'name_product', 'price', 'image', 'tong',
    ];
    
}