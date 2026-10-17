<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * CMS-controlled maintenance mode (Settings → Site behaviour). Visitors get a
 * 503 page; signed-in CMS users can still browse the site to check changes,
 * and the admin panel, installer and health check stay available.
 */
class MaintenanceMode
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('admin', 'admin/*', 'livewire*', 'filament/*', 'install', 'up', 'robots.txt')) {
            return $next($request);
        }
        try {
            $enabled = (bool) setting('general.maintenance', false);
        } catch (\Throwable) {
            return $next($request);
        }
        if (! $enabled || auth()->check()) {
            return $next($request);
        }
        $ar = $request->is('ar', 'ar/*');
        app()->setLocale($ar ? 'ar' : 'en');

        return response()->view('errors.maintenance', [
            'title' => t(setting('general.maintenance_title')) ?: __('site.maintenance_title'),
            'message' => t(setting('general.maintenance_message')) ?: __('site.maintenance_text'),
        ], 503, ['Retry-After' => '3600', 'X-Robots-Tag' => 'noindex']);
    }
}
