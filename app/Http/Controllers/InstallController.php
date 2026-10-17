<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Password;

/**
 * One-time web installer for hosting plans without SSH. It is only reachable when
 * INSTALL_TOKEN is set in .env AND no administrator exists yet; it runs the
 * migrations, seeds the bilingual starter content and creates the first Super Admin.
 * Remove INSTALL_TOKEN from .env afterwards.
 */
class InstallController extends Controller
{
    protected function guard(Request $request): void
    {
        $token = (string) config('app.install_token');
        abort_if(strlen($token) < 24, 404);
        abort_unless(hash_equals($token, (string) $request->input('token', $request->query('token'))), 404);
        abort_if(Schema::hasTable('users') && User::query()->exists(), 404);
    }

    public function show(Request $request)
    {
        $this->guard($request);

        return view('install', ['token' => $request->query('token')]);
    }

    public function store(Request $request)
    {
        $this->guard($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'username' => ['required', 'alpha_dash', 'min:3', 'max:60'],
            'email' => ['required', 'email', 'max:190'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        @set_time_limit(300);
        Artisan::call('migrate', ['--force' => true]);
        Artisan::call('db:seed', ['--force' => true]);

        User::create($data + ['role' => User::ROLE_SUPER_ADMIN, 'is_active' => true]);
        Artisan::call('optimize:clear');

        return redirect('/admin/login')->with('status', 'Installation complete. Remove INSTALL_TOKEN from .env now.');
    }
}
