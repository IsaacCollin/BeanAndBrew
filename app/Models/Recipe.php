<?php

namespace App\Models;

use App\Enum\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

class Recipe extends Model
{
  use HasFactory; use HasRichText;

  protected $fillable = [
    'slug',
    'title',
    'description',
    'user_name',
  ];

  protected $casts = [
    'category' => Category::class
  ];

  protected $richTextFields = [
    'content',
  ];
}
