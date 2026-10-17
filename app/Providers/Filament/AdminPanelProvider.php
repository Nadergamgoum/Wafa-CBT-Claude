<?php

namespace App\Providers\Filament;

use App\Filament\Auth\EditProfile;
use App\Filament\Auth\Login;
use App\Filament\Widgets\AudienceBreakdown;
use App\Filament\Widgets\LatestLeads;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\TrafficChart;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('WAFA CMS')
            ->brandLogo(asset('images/brand/wafa-logo.png'))
            ->brandLogoHeight('2.1rem')
            ->favicon(asset('images/brand/favicon-32.png'))
            ->login(Login::class)
            ->passwordReset()
            ->profile(EditProfile::class, isSimple: false)
            ->colors([
                // WAFA teal, pinned so buttons use #0E7F75 (white text passes WCAG AA).
                'primary' => [50 => '#f1f7f7', 100 => '#ddedec', 200 => '#bcdbd8', 300 => '#8bc2bd', 400 => '#56a59e', 500 => '#2b8e86',
                    600 => '#0e7f75', 700 => '#0b6860', 800 => '#09544d', 900 => '#07403a', 950 => '#042925'],
                'gray' => Color::Slate,
            ])
            ->defaultAvatarProvider(\App\Filament\Support\InitialsAvatar::class)
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth('7xl')
            ->navigationGroups([
                NavigationGroup::make('Content'),
                NavigationGroup::make('Services'),
                NavigationGroup::make('Training'),
                NavigationGroup::make('Insights'),
                NavigationGroup::make('Leads'),
                NavigationGroup::make('Site'),
                NavigationGroup::make('Administration'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([Dashboard::class])
            ->widgets([\Filament\Widgets\AccountWidget::class, StatsOverview::class, TrafficChart::class, AudienceBreakdown::class, LatestLeads::class])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
