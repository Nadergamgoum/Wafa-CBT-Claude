<?php

namespace App\Models;

use App\Models\Concerns\HasSeo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingProgram extends Model
{
    use HasSeo;

    public const DELIVERY_MODES = ['in_person' => 'In person', 'online' => 'Live online', 'blended' => 'Blended', 'in_house' => 'In-house (at your organization)', 'in_house_online' => 'In-house or online workshops'];

    public const STATUSES = ['open' => 'Registration open', 'upcoming' => 'Coming soon', 'on_request' => 'Available on request', 'full' => 'Fully booked', 'closed' => 'Registration closed'];

    protected $fillable = ['program_category_id', 'slug', 'title', 'summary', 'description', 'image_id', 'trainer', 'starts_at',
        'ends_at', 'duration', 'delivery_mode', 'location', 'online_link', 'registration_status', 'registration_url',
        'has_certificate', 'audience', 'outcomes', 'requirements', 'agenda', 'faqs', 'seo', 'is_featured', 'is_published', 'sort'];

    protected $casts = ['title' => 'array', 'summary' => 'array', 'description' => 'array', 'trainer' => 'array',
        'duration' => 'array', 'location' => 'array', 'audience' => 'array', 'outcomes' => 'array', 'requirements' => 'array',
        'agenda' => 'array', 'faqs' => 'array', 'seo' => 'array', 'starts_at' => 'date', 'ends_at' => 'date',
        'has_certificate' => 'boolean', 'is_featured' => 'boolean', 'is_published' => 'boolean'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function url(?string $locale = null): string
    {
        return lroute('programs.show', ['program' => $this->slug], $locale);
    }

    public function isRegistrable(): bool
    {
        return in_array($this->registration_status, ['open', 'on_request', 'upcoming'], true);
    }
}
