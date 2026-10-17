<?php

namespace App\Filament\Auth;

use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use SensitiveParameter;

/**
 * Sign in with either username or email. On top of Filament's per-IP limit,
 * attempts are throttled per account identifier to slow down credential stuffing.
 */
class Login extends BaseLogin
{
    public function authenticate(): ?LoginResponse
    {
        $identifier = Str::lower(trim((string) ($this->data['login'] ?? '')));
        $key = 'admin-login:'.sha1($identifier);
        if (RateLimiter::tooManyAttempts($key, 8)) {
            Notification::make()->danger()
                ->title('Too many sign-in attempts')
                ->body('Please wait '.ceil(RateLimiter::availableIn($key) / 60).' minute(s) before trying again.')
                ->send();

            return null;
        }
        RateLimiter::hit($key, 15 * 60);

        $response = parent::authenticate();
        if ($response) {
            RateLimiter::clear($key);
            auth()->user()?->forceFill(['last_login_at' => now(), 'last_login_ip' => request()->ip()])->saveQuietly();
        }

        return $response;
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('login')
            ->label('Username or email')
            ->required()
            ->maxLength(190)
            ->autocomplete('username')
            ->autofocus();
    }

    protected function getCredentialsFromFormData(#[SensitiveParameter] array $data): array
    {
        $login = trim((string) $data['login']);
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [$field => $login, 'password' => $data['password'], 'is_active' => true];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('filament-panels::auth/pages/login.messages.failed'),
        ]);
    }
}
