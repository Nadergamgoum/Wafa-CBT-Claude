<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticsEvent extends Model
{
    public const UPDATED_AT = null;

    public const EVENTS = ['contact_submit', 'consultation_click', 'whatsapp_click', 'phone_click', 'email_click', 'medical_inquiry', 'training_registration'];

    protected $fillable = ['type', 'name', 'path', 'locale', 'device', 'referrer_host', 'visitor_hash', 'created_at'];

    protected $casts = ['created_at' => 'datetime'];
}
