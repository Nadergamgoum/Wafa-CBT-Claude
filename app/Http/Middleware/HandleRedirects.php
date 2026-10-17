<?php

namespace App\Http\Middleware;

use App\Models\Redirect;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Applies CMS-managed redirects (e.g. legacy WordPress URLs) before routing. */
class HandleRedirects
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->isMethod('GET') || $request->is('admin', 'admin/*', 'livewire*')) {
            return $next($request);
        }
        try {
            $map = Redirect::map();
        } catch (\Throwable) {
            return $next($request);
        }
        if ($map === []) {
            return $next($request);
        }

        $path = Redirect::normalize($request->getPathInfo());
        $candidates = [$path];
        // WordPress-style query URLs such as /?page_id=12 or /?p=34
        foreach (['page_id', 'p', 'cat'] as $q) {
            if ($request->query($q) !== null) {
                $candidates[] = '/?'.$q.'='.$request->query($q);
            }
        }
        foreach ($candidates as $candidate) {
            if ($rule = Redirect::match($map, $candidate)) {
                [$to, $code, $id] = $rule;
                Redirect::query()->whereKey($id)->update(['hits' => \DB::raw('hits + 1'), 'last_hit_at' => now()]);
                if ($code === 410 || ! $to) {
                    abort(410);
                }
                $target = preg_match('#^https?://#', $to) ? $to : url($to);

                return redirect()->to($target, in_array($code, [301, 302, 307, 308], true) ? $code : 301);
            }
        }

        return $next($request);
    }
}
