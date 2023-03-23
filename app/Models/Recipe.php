<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category',
        'description',
        'body',
        'body_2',
        'body_3',
        'image_url',
        'image_alt',
        'image_url_2',
        'image_alt_2',
        'image_url_3',
        'image_alt_3',
        'user_name',
    ];
}
