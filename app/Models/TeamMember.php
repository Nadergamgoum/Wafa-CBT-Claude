<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeamMember extends Model
{
    protected $fillable = ['name', 'role', 'bio', 'photo_id', 'linkedin_url', 'email', 'is_published', 'sort'];

    protected $casts = ['name' => 'array', 'role' => 'array', 'bio' => 'array', 'is_published' => 'boolean'];

    public function photo(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'photo_id');
    }
}
