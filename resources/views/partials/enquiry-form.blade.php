{{-- Enquiry form. Params: type (contact|training|medical|consultation), service (preselected), program (TrainingProgram) --}}
@php
    $type = $type ?? 'contact';
    $fid = 'f'.substr(md5($type.($program->id ?? '')), 0, 6);
    $serviceOptions = \App\Support\Content::services()->map(fn ($s) => t($s->title))->all();
    $selected = old('service', $service ?? (isset($program) ? t($program->title) : null));
@endphp
@if (session('form_success'))
    <div class="form-status is-success" role="status" tabindex="-1">{{ session('form_success') }}</div>
@endif
<form class="form" method="post" action="{{ route('enquiry.store') }}" data-enquiry novalidate>
    @csrf
    <input type="hidden" name="locale" value="{{ app()->getLocale() }}">
    <input type="hidden" name="type" value="{{ $type }}">
    <input type="hidden" name="page_url" value="{{ url()->current() }}">
    <input type="hidden" name="_ts" value="{{ \Illuminate\Support\Facades\Crypt::encryptString((string) time()) }}">
    <div class="hp" aria-hidden="true"><label for="{{ $fid }}-website">Website</label><input id="{{ $fid }}-website" type="text" name="website" tabindex="-1" autocomplete="off"></div>

    @error('form')<p class="form-status is-error">{{ $message }}</p>@enderror
    <div class="form__row form__row--2">
        <div class="field">
            <label for="{{ $fid }}-name">{{ __('form.name') }}<span class="req" aria-hidden="true">*</span></label>
            <input class="input" id="{{ $fid }}-name" name="name" type="text" autocomplete="name" required minlength="2" maxlength="120" value="{{ old('name') }}" @error('name') aria-invalid="true" @enderror>
            @error('name')<p class="field__error">{{ $message }}</p>@enderror
        </div>
        <div class="field">
            <label for="{{ $fid }}-company">{{ __('form.company') }} <span class="opt">{{ __('form.optional') }}</span></label>
            <input class="input" id="{{ $fid }}-company" name="company" type="text" autocomplete="organization" maxlength="160" value="{{ old('company') }}">
        </div>
    </div>
    <div class="form__row form__row--2">
        <div class="field">
            <label for="{{ $fid }}-email">{{ __('form.email') }}<span class="req" aria-hidden="true">*</span></label>
            <input class="input" id="{{ $fid }}-email" name="email" type="email" autocomplete="email" inputmode="email" required maxlength="190" value="{{ old('email') }}" @error('email') aria-invalid="true" @enderror>
            @error('email')<p class="field__error">{{ $message }}</p>@enderror
        </div>
        <div class="field">
            <label for="{{ $fid }}-phone">{{ __('form.phone') }} <span class="opt">{{ __('form.optional') }}</span></label>
            <input class="input" id="{{ $fid }}-phone" name="phone" type="tel" autocomplete="tel" inputmode="tel" maxlength="40" value="{{ old('phone') }}" @error('phone') aria-invalid="true" @enderror>
            @error('phone')<p class="field__error">{{ $message }}</p>@enderror
        </div>
    </div>
    @if ($type !== 'training')
        <div class="field">
            <label for="{{ $fid }}-service">{{ __('form.service') }}</label>
            <select class="select" id="{{ $fid }}-service" name="service">
                <option value="">{{ __('form.service_placeholder') }}</option>
                @foreach ($serviceOptions as $opt)<option value="{{ $opt }}" @selected($selected === $opt)>{{ $opt }}</option>@endforeach
                <option value="{{ __('form.other') }}" @selected($selected === __('form.other'))>{{ __('form.other') }}</option>
            </select>
        </div>
    @else
        <input type="hidden" name="service" value="{{ $selected }}">
    @endif
    <div class="field">
        <label for="{{ $fid }}-message">{{ $type === 'training' ? __('form.message_training') : __('form.message') }} <span class="opt">{{ __('form.optional') }}</span></label>
        <textarea class="textarea" id="{{ $fid }}-message" name="message" maxlength="4000" rows="5">{{ old('message') }}</textarea>
    </div>
    <div class="field">
        <label class="check"><input type="checkbox" name="consent" value="1" required @checked(old('consent'))> <span>{{ __('form.consent') }}
            @php $privacy = \App\Models\Page::query()->where('key', 'privacy')->first(); @endphp
            @if ($privacy) <a href="{{ $privacy->url() }}">{{ __('form.privacy_link') }}</a>@endif</span></label>
        @error('consent')<p class="field__error">{{ $message }}</p>@enderror
    </div>
    <p class="form-status" data-form-status role="status" aria-live="polite" tabindex="-1" hidden data-success="{{ __('form.success') }}" data-error="{{ __('form.error') }}" data-throttled="{{ __('form.throttled') }}"></p>
    <div><button type="submit" class="btn">{{ $type === 'training' ? __('form.submit_training') : __('form.submit') }} {!! icon('send', 'icon flip-rtl') !!}</button></div>
</form>
