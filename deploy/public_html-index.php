<?php

/*
| Front controller for Hostinger shared hosting.
| The application lives OUTSIDE the web root, next to public_html:
|
|   domains/example.com/wafa-app/      ← Laravel application (private)
|   domains/example.com/public_html/   ← this file + public assets
|
| If you named the application folder differently, change $app_dir below.
*/

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$app_dir = __DIR__.'/../wafa-app';

if (file_exists($maintenance = $app_dir.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $app_dir.'/vendor/autoload.php';

/** @var Application $app */
$app = require_once $app_dir.'/bootstrap/app.php';
$app->usePublicPath(__DIR__);

$app->handleRequest(Request::capture());
