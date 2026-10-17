<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EngagementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TrackController;
use Illuminate\Support\Facades\Route;

Route::get('sitemap.xml', [SeoController::class, 'sitemap'])->name('sitemap');
Route::get('robots.txt', [SeoController::class, 'robots'])->name('robots');

Route::post('enquiry', [ContactController::class, 'store'])->middleware('throttle:enquiries')->name('enquiry.store');
Route::post('t', [TrackController::class, 'store'])->middleware('throttle:tracking')->name('track');

Route::get('install', [InstallController::class, 'show'])->name('install');
Route::post('install', [InstallController::class, 'store'])->middleware('throttle:5,10');

/*
| Public pages are registered twice: English at the root and Arabic under /ar.
| Arabic route names are prefixed with "ar." — use lroute() to build URLs.
*/
$reserved = '(?!(?:admin|livewire|filament|install|up|ar|sitemap|robots|storage|uploads|build|images|fonts|t|enquiry)(?:/|$))';

foreach (['ar' => 'ar', 'en' => ''] as $locale => $prefix) {
    Route::prefix($prefix)
        ->name($locale === 'en' ? '' : 'ar.')
        ->middleware('locale:'.$locale)
        ->group(function () use ($reserved) {
            Route::get('/', [HomeController::class, 'show'])->name('home');
            Route::get('about', [PageController::class, 'about'])->name('about');
            Route::get('contact', [PageController::class, 'contact'])->name('contact');
            Route::get('insights', [InsightController::class, 'index'])->name('insights.index');
            Route::get('insights/category/{category:slug}', [InsightController::class, 'category'])->name('insights.category');
            Route::get('insights/{post:slug}', [InsightController::class, 'show'])->name('insights.show');
            Route::get('training-programs', [ProgramController::class, 'index'])->name('programs.index');
            Route::get('training-programs/{program:slug}', [ProgramController::class, 'show'])->name('programs.show');
            Route::get('corporate-engagements', [EngagementController::class, 'index'])->name('engagements.index');
            Route::get('corporate-engagements/{engagement:slug}', [EngagementController::class, 'show'])->name('engagements.show');
            Route::get('{category}/{service}', [ServiceController::class, 'show'])
                ->where(['category' => $reserved.'[a-z0-9-]+', 'service' => '[a-z0-9-]+'])->name('service');
            // Single-segment URLs serve both service-category landing pages and CMS pages.
            Route::get('{slug}', [PageController::class, 'resolve'])
                ->where('slug', $reserved.'[a-z0-9-]+')->name('page');
        });
}
