<?php

use App\Models\AnalyticsEvent;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

/*
| Create (or promote) an administrator from the command line:
|   php artisan wafa:admin
*/
Artisan::command('wafa:admin {--role=super_admin : super_admin or editor}', function () {
    $name = $this->ask('Full name');
    $username = $this->ask('Username');
    $email = $this->ask('Email');
    $password = $this->secret('Password (min 12 chars, upper & lower case, number, symbol)');
    $role = in_array($this->option('role'), array_keys(User::ROLES), true) ? $this->option('role') : 'super_admin';

    $v = Validator::make(compact('name', 'username', 'email', 'password'), [
        'name' => ['required', 'max:120'],
        'username' => ['required', 'alpha_dash', 'min:3', 'max:60', 'unique:users,username'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', Password::min(12)->letters()->mixedCase()->numbers()->symbols()],
    ]);
    if ($v->fails()) {
        foreach ($v->errors()->all() as $e) {
            $this->error($e);
        }

        return 1;
    }
    User::create(compact('name', 'username', 'email', 'password') + ['role' => $role, 'is_active' => true]);
    $this->info("Administrator {$username} created ({$role}). Sign in at ".url('/admin'));

    return 0;
})->purpose('Create a WAFA CMS administrator');

// Keep first-party analytics lean: events older than 13 months are removed.
Artisan::command('wafa:prune-analytics', function () {
    $n = AnalyticsEvent::query()->where('created_at', '<', now()->subMonths(13))->delete();
    $this->info("Removed {$n} old analytics events.");
})->purpose('Remove analytics events older than 13 months');

Schedule::command('wafa:prune-analytics')->monthly();
