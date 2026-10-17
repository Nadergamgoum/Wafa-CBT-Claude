<!DOCTYPE html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="robots" content="noindex"><title>Install</title>@vite(['resources/css/app.css'])</head>
<body class="no-quickbar">
<main class="errpage">
    <div class="errpage__card install">
        <span class="brand__word">WAFA</span>
        <h1 class="h3">One-time installation</h1>
        <p class="muted">Runs database migrations, loads the bilingual starter content and creates the first Super Admin. This page disappears once an administrator exists.</p>
        @if ($errors->any())<div class="form-status is-error">@foreach ($errors->all() as $e)<div>{{ $e }}</div>@endforeach</div>@endif
        <form class="form" method="post" action="{{ url('/install') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="field"><label for="i-name">Full name</label><input class="input" id="i-name" name="name" required value="{{ old('name') }}"></div>
            <div class="form__row form__row--2">
                <div class="field"><label for="i-user">Username</label><input class="input" id="i-user" name="username" required value="{{ old('username') }}" autocomplete="username"></div>
                <div class="field"><label for="i-email">Email</label><input class="input" id="i-email" name="email" type="email" required value="{{ old('email') }}"></div>
            </div>
            <div class="form__row form__row--2">
                <div class="field"><label for="i-pw">Password</label><input class="input" id="i-pw" name="password" type="password" required autocomplete="new-password"><p class="field__hint">At least 12 characters with upper and lower case letters, a number and a symbol.</p></div>
                <div class="field"><label for="i-pw2">Confirm password</label><input class="input" id="i-pw2" name="password_confirmation" type="password" required autocomplete="new-password"></div>
            </div>
            <button class="btn" type="submit">Install</button>
        </form>
    </div>
</main>
</body></html>
