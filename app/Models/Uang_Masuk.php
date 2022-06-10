<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uang_Masuk extends Model
{
    use HasFactory;
    protected $table = "uang_masuks";
    protected $primaryKey ="id";
    protected $fillable =[
        'id',
        'uang',
        'deskripsi',
        'kategori',
    ];
    use HasFactory;
}
