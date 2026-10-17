<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Support\Analytics;
use Illuminate\Http\Request;

/** Receives first-party, cookieless page-view and conversion beacons. */
class TrackController extends Controller
{
    public function store(Request $request)
    {
        $type = $request->input('type') === 'event' ? 'event' : 'pageview';
        $name = $type === 'event' ? (string) $request->input('name') : null;
        if ($type === 'event' && ! in_array($name, AnalyticsEvent::EVENTS, true)) {
            return response()->noContent();
        }
        $path = '/'.ltrim((string) parse_url((string) $request->input('path', '/'), PHP_URL_PATH), '/');
        $locale = str_starts_with($path, '/ar') ? 'ar' : 'en';

        Analytics::record($type, $name, $path, $locale, $request, (string) $request->input('ref'));

        return response()->noContent();
    }
}
