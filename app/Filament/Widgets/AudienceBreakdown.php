<?php

namespace App\Filament\Widgets;

use App\Support\AnalyticsReport;
use Filament\Widgets\Widget;

class AudienceBreakdown extends Widget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected string $view = 'filament.widgets.audience-breakdown';

    protected function getViewData(): array
    {
        $labels = [
            'contact_submit' => 'Contact form submissions', 'consultation_click' => 'Consultation button clicks',
            'whatsapp_click' => 'WhatsApp clicks', 'phone_click' => 'Phone clicks', 'email_click' => 'Email clicks',
            'medical_inquiry' => 'Medical insurance enquiries', 'training_registration' => 'Training registrations',
        ];

        return [
            'panels' => [
                'Top pages' => AnalyticsReport::top('path', 30, 10),
                'Traffic sources' => AnalyticsReport::top('referrer_host', 30, 8) ?: ['Direct / unknown' => null],
                'Devices' => AnalyticsReport::top('device'),
                'Language' => collect(AnalyticsReport::top('locale'))->mapWithKeys(fn ($v, $k) => [$k === 'ar' ? 'Arabic' : 'English' => $v])->all(),
                'Conversions' => collect(AnalyticsReport::events())->mapWithKeys(fn ($v, $k) => [$labels[$k] ?? $k => $v])->all(),
            ],
        ];
    }
}
