<?php

namespace App\Filament\Widgets;

use App\Support\AnalyticsReport;
use Filament\Widgets\ChartWidget;

class TrafficChart extends ChartWidget
{
    // Analytics and leads are Super Admin information.
    public static function canView(): bool
    {
        return (bool) auth()->user()?->isSuperAdmin();
    }

    protected static ?int $sort = 2;

    protected ?string $heading = 'Traffic — last 30 days';

    protected int|string|array $columnSpan = 'full';

    protected ?string $maxHeight = '260px';

    protected function getData(): array
    {
        $d = AnalyticsReport::daily(30);

        return [
            'datasets' => [
                ['label' => 'Page views', 'data' => $d['views'], 'borderColor' => '#0e7f75', 'backgroundColor' => 'rgba(14,127,117,.12)', 'fill' => true, 'tension' => .35],
                ['label' => 'Visitors', 'data' => $d['visitors'], 'borderColor' => '#16191c', 'backgroundColor' => 'transparent', 'tension' => .35],
            ],
            'labels' => $d['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
