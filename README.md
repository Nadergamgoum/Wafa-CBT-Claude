# WAFA — corporate website & CMS

Bilingual (English / Arabic, RTL) corporate website for WAFA — corporate medical insurance and
employee health benefits, insurance brokerage, life/auto/property insurance, HR consulting,
organizational development, training and coaching — with a secure CMS at `/admin`.

**Stack:** Laravel 13 · PHP 8.3+ · MySQL/MariaDB · Filament 5 (admin) · Blade + hand-written CSS
(logical properties for RTL) + small vanilla JS modules · Vite build. Runs on Hostinger shared
hosting with no Node.js, Redis, workers or root access.

| Document | Purpose |
|---|---|
| [`docs/PROJECT-OVERVIEW.md`](docs/PROJECT-OVERVIEW.md) | Sitemap, design direction, service-page differentiation, mobile UX, CMS, SEO, security, QA, open items |
| [`docs/DEPLOYMENT.md`](docs/DEPLOYMENT.md) | Step-by-step Hostinger deployment, SMTP, cron, backups, local preview |
| [`docs/ADMIN-GUIDE.md`](docs/ADMIN-GUIDE.md) | How to use the CMS |
| [`docs/CONTENT-NOTES.md`](docs/CONTENT-NOTES.md) | Reconciliation with wafa-cbt.com: verified facts, pending claims, redirect map, content to confirm |
| [`docs/IMAGE-BRIEF.md`](docs/IMAGE-BRIEF.md) | Photography brief per image slot |

## Local development

```bash
composer install && npm ci && npm run build
cp .env.example .env        # APP_ENV=local, APP_DEBUG=true, APP_URL=http://127.0.0.1:8000, DB_CONNECTION=sqlite
php artisan key:generate
touch database/database.sqlite && php artisan migrate --seed
php artisan filament:assets
php artisan wafa:admin      # create the first Super Admin
php artisan serve           # site: http://127.0.0.1:8000   admin: http://127.0.0.1:8000/admin
php artisan test            # 38 feature tests
```

## Project layout (highlights)

```
app/Cms/Blocks.php                 Section/block registry (drives both the admin builder and rendering)
app/Filament/                      Admin: resources, settings, SEO checks, dashboard widgets, auth
app/Support/                       Locales, SEO/Schema builders, contact channels, media processing, analytics
resources/views/blocks/            One template per section type (37)
resources/views/heroes/            Nine service hero layouts
resources/css/                     Design system (tokens, layout, components, blocks, services, pages)
database/seeders/content/          Bilingual starter content (EN + AR)
scripts/build-package.sh           Builds the Hostinger deployment ZIP and source ZIP into dist/
deploy/                            public_html front controller + application .htaccess
```
