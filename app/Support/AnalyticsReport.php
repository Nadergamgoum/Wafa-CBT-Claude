<?php

namespace App\Support;

use App\Models\AnalyticsEvent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/** Aggregations over first-party analytics events for the admin dashboard. */
class AnalyticsReport
{
    public static function since(int $days): Carbon
    {
        return now()->subDays($days - 1)->startOfDay();
    }

    public static function pageviews(int $days = 30): int
    {
        return AnalyticsEvent::query()->where('type', 'pageview')->where('created_at', '>=', static::since($days))->count();
    }

    /** Visitors are counted per day (the visitor hash rotates daily by design). */
    public static function visitors(int $days = 30): int
    {
        return (int) AnalyticsEvent::query()->where('type', 'pageview')->where('created_at', '>=', static::since($days))
            ->selectRaw('COUNT(DISTINCT visitor_hash) as c')->value('c');
    }

    public static function daily(int $days = 30): array
    {
        $rows = AnalyticsEvent::query()->where('type', 'pageview')->where('created_at', '>=', static::since($days))
            ->selectRaw('DATE(created_at) as d, COUNT(*) as views, COUNT(DISTINCT visitor_hash) as visitors')
            ->groupBy(DB::raw('DATE(created_at)'))->get()->keyBy('d');
        $out = ['labels' => [], 'views' => [], 'visitors' => []];
        for ($i = $days - 1; $i >= 0; $i--) {
            $d = now()->subDays($i)->toDateString();
            $out['labels'][] = Carbon::parse($d)->format('M j');
            $out['views'][] = (int) ($rows[$d]->views ?? 0);
            $out['visitors'][] = (int) ($rows[$d]->visitors ?? 0);
        }

        return $out;
    }

    public static function top(string $column, int $days = 30, int $limit = 8, string $type = 'pageview'): array
    {
        return AnalyticsEvent::query()->where('type', $type)->where('created_at', '>=', static::since($days))
            ->when($column === 'referrer_host', fn ($q) => $q->whereNotNull('referrer_host'))
            ->selectRaw("$column as k, COUNT(*) as c")->groupBy($column)->orderByDesc('c')->limit($limit)
            ->pluck('c', 'k')->all();
    }

    public static function events(int $days = 30): array
    {
        return static::top('name', $days, 10, 'event');
    }
}
