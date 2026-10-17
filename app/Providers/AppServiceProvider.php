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
        $this->ensureAppKeyForInstaller();

        // Before the database exists, the installer must not depend on database sessions.
        if (preg_match('#^/install(\?|$)#', (string) ($_SERVER['REQUEST_URI'] ?? '')) && config('app.install_token')) {
            config(['session.driver' => 'file', 'cache.default' => 'file']);
        }
    }

    /**
     * Shared hosting without SSH cannot run `php artisan key:generate`. While the
     * one-time INSTALL_TOKEN is set (and only then), a missing APP_KEY is generated
     * and written to .env so the web installer can run.
     */
    protected function ensureAppKeyForInstaller(): void
    {
        if (config('app.key') || strlen((string) config('app.install_token')) < 24 || $this->app->configurationIsCached()) {
            return;
        }
        $envFile = $this->app->environmentFilePath();
        if (! is_file($envFile) || ! is_writable($envFile)) {
            return;
        }
        $key = 'base64:'.base64_encode(random_bytes(32));
        $contents = (string) file_get_contents($envFile);
        $contents = preg_match('/^APP_KEY=.*$/m', $contents)
            ? preg_replace('/^APP_KEY=.*$/m', 'APP_KEY='.$key, $contents)
            : "APP_KEY={$key}\n".$contents;
        file_put_contents($envFile, $contents);
        config(['app.key' => $key]);
    }

    public function boot(): void
    {
        if (str_starts_with((string) config('app.url'), 'https://')) {
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
