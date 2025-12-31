<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    // Tambahkan bagian ini agar Laravel mengizinkan penyimpanan data
    protected $fillable = [
        'title',
        'brand',
        'price',
        'year',
        'description',
        'image',
        'status',
    ];
}