<section class="shero shero--layered">
    <div class="shero__bg" aria-hidden="true"><svg viewBox="0 0 400 400"><path d="M200 70v260M70 200h260" stroke="currentColor" stroke-width="56" stroke-linecap="round"/></svg></div>
    <div class="container shero__grid">
        <div class="shero__copy">@include('heroes._copy')</div>
        <div class="shero__visual">
            <div class="frame shero__frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '(min-width:1024px) 46vw, 100vw'])</div>
            @foreach (array_slice($hero['highlights'] ?? [], 0, 3) as $hi => $h)
                <div class="shero__float shero__float--{{ $hi + 1 }}">
                    <span class="icon-tile">{!! icon($h['icon'] ?? 'check') !!}</span><span>{{ t($h['label'] ?? null) }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
