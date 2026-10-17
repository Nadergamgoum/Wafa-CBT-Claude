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
EXCLUDES=(--exclude='.git/' --exclude='.github/' --exclude='node_modules/' --exclude='vendor/' --exclude='dist/' --exclude='public/' --exclude='tests/' --exclude='.env' --exclude='.env.backup' --exclude='.phpunit.result.cache' --exclude='storage/logs/*' --exclude='storage/framework/cache/data/*' --exclude='storage/framework/sessions/*' --exclude='storage/framework/views/*' --exclude='storage/app/livewire-tmp/*' --exclude='database/*.sqlite' --exclude='scripts/' --exclude='docs/' --exclude='deploy/' --exclude='.env.install' --exclude='*.log')
rsync -a "${EXCLUDES[@]}" "$ROOT/" "$APP/"
(cd "$APP" && rm -rf vendor && COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --prefer-dist --no-interaction --quiet --no-scripts)
# Strip VCS metadata and package test suites, then build the optimized autoloader.
find "$APP/vendor" -type d \( -name .git -o -name .github \) -prune -exec rm -rf {} +
find "$APP/vendor" -mindepth 3 -maxdepth 3 -type d \( -name tests -o -name Tests -o -name docs \) -prune -exec rm -rf {} +
(cd "$APP" && COMPOSER_ALLOW_SUPERUSER=1 composer dump-autoload --optimize --no-dev --no-scripts --quiet)
rm -rf "$APP/public" && mkdir -p "$APP/public"
cp "$ROOT/deploy/wafa-app.htaccess" "$APP/.htaccess"
cp "$ROOT/.env.example" "$APP/.env.example"
mkdir -p "$APP/storage/logs" "$APP/storage/framework/"{cache/data,sessions,views} "$APP/storage/app/private" "$APP/bootstrap/cache"
rm -f "$APP/bootstrap/cache/"*.php

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
