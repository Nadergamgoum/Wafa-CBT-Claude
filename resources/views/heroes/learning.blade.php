@php $programCount = \App\Models\TrainingProgram::where('is_published', true)->count(); @endphp
<section class="shero shero--learning">
    <div class="shero__grid-bg" aria-hidden="true"></div>
    <div class="container shero__grid">
        <div class="shero__visual">
            <div class="frame shero__frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '(min-width:1024px) 44vw, 100vw'])</div>
            @if ($programCount)
                <a class="shero__count" href="{{ lroute('programs.index') }}"><strong>{{ $programCount }}</strong><span>{{ trans_choice('site.programs_available', $programCount) }}</span>{!! icon('arrow-right', 'icon flip-rtl') !!}</a>
            @endif
        </div>
        <div class="shero__copy">
            @include('heroes._copy')
            @if (! empty($hero['highlights']))
                <ul class="shero__chips">@foreach ($hero['highlights'] as $h)<li>{!! icon($h['icon'] ?? 'book-open') !!}{{ t($h['label'] ?? null) }}</li>@endforeach</ul>
            @endif
        </div>
    </div>
</section>
