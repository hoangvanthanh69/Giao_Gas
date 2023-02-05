<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class add_staff extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'add_staff';
    protected $fillable = [
        'last_name', 'birth', 'chuc_vu', 'code_staff', 'date_input', 'phone', 'luong', 'taikhoan', 'dia_chi'
    ];
}