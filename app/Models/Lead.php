<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public const STATUSES = ['new' => 'New', 'contacted' => 'Contacted', 'qualified' => 'Qualified', 'closed' => 'Closed', 'spam' => 'Spam'];

    public const TYPES = ['contact' => 'Contact form', 'consultation' => 'Consultation request', 'medical' => 'Medical insurance inquiry', 'training' => 'Training registration'];

    protected $fillable = ['type', 'name', 'company', 'email', 'phone', 'service', 'message', 'consent', 'locale', 'page_url',
        'referrer', 'utm', 'ip_hash', 'user_agent', 'status', 'notes'];

    protected $casts = ['consent' => 'boolean', 'utm' => 'array'];
}
