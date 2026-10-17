<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    public const TOPICS = ['general' => 'General', 'medical' => 'Medical insurance', 'insurance' => 'Insurance',
        'people' => 'People & organization', 'learning' => 'Learning & leadership', 'contact' => 'Contact'];

    protected $fillable = ['service_id', 'topic', 'question', 'answer', 'show_on_home', 'is_published', 'sort'];

    protected $casts = ['question' => 'array', 'answer' => 'array', 'show_on_home' => 'boolean', 'is_published' => 'boolean'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
