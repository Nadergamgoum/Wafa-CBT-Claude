<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = ['quote', 'author_name', 'author_role', 'company', 'is_published', 'sort'];

    protected $casts = ['quote' => 'array', 'author_role' => 'array', 'is_published' => 'boolean'];
}
