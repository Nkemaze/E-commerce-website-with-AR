<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'sizes',
        'category',
        'image_path',
        'gallery_images'
    ];
    
    protected $casts = [
        'sizes' => 'array',
        'gallery_images' => 'array'
    ];
}