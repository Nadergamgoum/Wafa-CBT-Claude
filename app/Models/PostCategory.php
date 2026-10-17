<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
    protected $fillable = ['slug', 'name', 'sort'];

    protected $casts = ['name' => 'array'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function url(?string $locale = null): string
    {
        return lroute('insights.category', ['category' => $this->slug], $locale);
    }
}
