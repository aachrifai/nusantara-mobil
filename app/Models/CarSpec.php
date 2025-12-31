<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSpec extends Model
{
    use HasFactory;

    protected $fillable = ['model_name', 'transmisi_options', 'fuel_options', 'image'];

    // Ini PENTING: Mengubah JSON di database otomatis jadi Array di PHP
    protected $casts = [
        'transmisi_options' => 'array',
        'fuel_options'      => 'array',
    ];
}