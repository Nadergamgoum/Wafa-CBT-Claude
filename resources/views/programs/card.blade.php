@php
    $status = $program->registration_status;
    $statusClass = match ($status) { 'open' => 'pill--ok', 'full', 'closed' => 'pill--neutral', 'upcoming' => 'pill--warn', default => '' };
@endphp
<article class="card prog-card">
    <div class="card__media">@include('components.media', ['media' => $program->image, 'fallback' => art('program-'.(($program->id % 4) + 1)), 'alt' => '', 'sizes' => '(min-width:1024px) 30vw, 85vw', 'widths' => 960])</div>
    <div class="card__body">
        <p class="card__meta">
            @if ($program->category)<span class="pill">{{ t($program->category->name) }}</span>@endif
            <span class="pill {{ $statusClass }}">{{ __('programs.status.'.$status) }}</span>
        </p>
        <h3 class="card__title"><a href="{{ $program->url() }}">{{ t($program->title) }}</a></h3>
        <p>{{ \Illuminate\Support\Str::limit(t($program->summary), 140) }}</p>
        <ul class="prog-card__facts">
            @if ($program->delivery_mode)<li>{!! icon($program->delivery_mode === 'online' ? 'monitor' : ($program->delivery_mode === 'in_house' ? 'building-2' : 'presentation')) !!}{{ __('programs.mode.'.$program->delivery_mode) }}</li>@endif
            @if ($d = t($program->duration))<li>{!! icon('clock') !!}{{ $d }}</li>@endif
            @if ($program->starts_at)<li>{!! icon('calendar') !!}{{ $program->starts_at->translatedFormat('j M Y') }}</li>@endif
        </ul>
    </div>
</article>
