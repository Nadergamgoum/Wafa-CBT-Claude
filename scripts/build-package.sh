#!/usr/bin/env bash
# Builds the Hostinger deployment ZIP and the source ZIP into ./dist
#   dist/wafa-hostinger-deploy-<date>.zip   (wafa-app/ + public_html/ + docs)
#   dist/wafa-source-<date>.zip             (git HEAD, no vendor/node_modules)
set -euo pipefail
ROOT=$(cd "$(dirname "$0")/.." && pwd)
DATE=$(date +%Y%m%d)
OUT=$ROOT/dist
STAGE=$(mktemp -d)
mkdir -p "$OUT"

echo "› Building front-end assets"
(cd "$ROOT" && npm ci --silent && npm run build --silent && php artisan filament:assets -q)

echo "› Staging application"
APP=$STAGE/wafa-app
mkdir -p "$APP"
rsync -a --exclude-from=- "$ROOT/" "$APP/" <<'EXCL'
.git/
.github/
node_modules/
vendor/
dist/
public/
tests/
.env
.env.backup
.phpunit.result.cache
storage/logs/*
storage/framework/cache/data/*
storage/framework/sessions/*
storage/framework/views/*
storage/app/livewire-tmp/*
database/*.sqlite
scripts/
*.log
EXCL
(cd "$APP" && COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader --no-interaction --quiet --no-scripts && composer dump-autoload --optimize --no-dev --quiet)
cp "$ROOT/deploy/wafa-app.htaccess" "$APP/.htaccess"
cp "$ROOT/.env.example" "$APP/.env.example"
mkdir -p "$APP/storage/logs" "$APP/storage/framework/"{cache/data,sessions,views} "$APP/storage/app/private" "$APP/bootstrap/cache"
rm -f "$APP/bootstrap/cache/"*.php
# Laravel expects ./public for some commands; the real web root is APP_PUBLIC_PATH.
mkdir -p "$APP/public"

echo "› Staging public_html"
PUB=$STAGE/public_html
rsync -a --exclude 'hot' --exclude 'uploads/*' "$ROOT/public/" "$PUB/"
mkdir -p "$PUB/uploads"
cp "$ROOT/public/uploads/.htaccess" "$PUB/uploads/.htaccess"
cp "$ROOT/deploy/public_html-index.php" "$PUB/index.php"

echo "› Adding documentation"
cp -r "$ROOT/docs" "$STAGE/docs"
cp "$ROOT/docs/DEPLOYMENT.md" "$STAGE/README-DEPLOYMENT.md"

echo "› Creating archives"
rm -f "$OUT"/wafa-hostinger-deploy-*.zip "$OUT"/wafa-source-*.zip
(cd "$STAGE" && zip -qr9 "$OUT/wafa-hostinger-deploy-$DATE.zip" wafa-app public_html docs README-DEPLOYMENT.md)
(cd "$ROOT" && git archive --format=zip -9 --prefix=wafa-source/ -o "$OUT/wafa-source-$DATE.zip" HEAD)
rm -rf "$STAGE"
ls -lh "$OUT"
