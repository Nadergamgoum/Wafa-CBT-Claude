<?php

namespace App\Providers;

use App\Models\Faq;
use App\Models\Media;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\ProgramCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\TrainingProgram;
use App\Support\Content;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($path = config('app.public_path')) {
            $this->app->usePublicPath($path);
        }
    }

    public function boot(): void
    {
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }

        Password::defaults(fn () => Password::min(12)->letters()->mixedCase()->numbers()->symbols()
            ->when($this->app->isProduction(), fn ($rule) => $rule->uncompromised()));

        RateLimiter::for('enquiries', fn (Request $request) => [
            Limit::perMinute(3)->by('enq-m:'.$request->ip()),
            Limit::perHour(12)->by('enq-h:'.$request->ip()),
        ]);
        RateLimiter::for('tracking', fn (Request $request) => Limit::perMinute(90)->by('trk:'.$request->ip()));

        // Any content change invalidates the public read cache.
        foreach ([Page::class, Service::class, ServiceCategory::class, Faq::class, Post::class, PostCategory::class,
            TrainingProgram::class, ProgramCategory::class, TeamMember::class, Testimonial::class, Media::class, Menu::class, Setting::class] as $model) {
            $model::saved(fn () => Content::bust());
            $model::deleted(fn () => Content::bust());
        }
    }
}
