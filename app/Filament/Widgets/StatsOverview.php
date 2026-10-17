<?php

namespace App\Filament\Widgets;

use App\Models\Lead;
use App\Support\AnalyticsReport;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected ?string $heading = 'Last 30 days';

    protected ?string $description = 'Privacy-friendly first-party statistics (no cookies). For detailed reports, connect Google Analytics in Site settings.';

    protected function getStats(): array
    {
        $daily = AnalyticsReport::daily(14);
        $events = AnalyticsReport::events();
        $contacts = ($events['whatsapp_click'] ?? 0) + ($events['phone_click'] ?? 0) + ($events['email_click'] ?? 0);

        return [
            Stat::make('Visitors', number_format(AnalyticsReport::visitors()))->description('Daily unique visitors, summed')->chart($daily['visitors'])->color('primary'),
            Stat::make('Page views', number_format(AnalyticsReport::pageviews()))->chart($daily['views'])->color('primary'),
            Stat::make('Form submissions', (string) Lead::query()->where('created_at', '>=', now()->subDays(30))->count())
                ->description(Lead::query()->where('status', 'new')->count().' awaiting follow-up')->color('success'),
            Stat::make('Call / WhatsApp / email clicks', (string) $contacts)
                ->description(($events['consultation_click'] ?? 0).' consultation button clicks'),
        ];
    }
}
