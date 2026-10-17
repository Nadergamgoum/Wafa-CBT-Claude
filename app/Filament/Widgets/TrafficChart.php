<?php

namespace App\Filament\Widgets;

use App\Support\AnalyticsReport;
use Filament\Widgets\ChartWidget;

class TrafficChart extends ChartWidget
{
    protected static ?int $sort = 2;

    protected ?string $heading = 'Traffic — last 30 days';

    protected int|string|array $columnSpan = 'full';

    protected ?string $maxHeight = '260px';

    protected function getData(): array
    {
        $d = AnalyticsReport::daily(30);

        return [
            'datasets' => [
                ['label' => 'Page views', 'data' => $d['views'], 'borderColor' => '#0f7a76', 'backgroundColor' => 'rgba(15,122,118,.12)', 'fill' => true, 'tension' => .35],
                ['label' => 'Visitors', 'data' => $d['visitors'], 'borderColor' => '#0d3150', 'backgroundColor' => 'transparent', 'tension' => .35],
            ],
            'labels' => $d['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
