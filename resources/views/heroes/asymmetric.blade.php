<section class="shero shero--asym on-dark">
    <div class="shero__road" aria-hidden="true"></div>
    <div class="container shero__grid">
        <div class="shero__copy">@include('heroes._copy', ['light' => true])
            @if (! empty($hero['highlights']))
                <ul class="shero__ticks">@foreach (array_slice($hero['highlights'], 0, 3) as $h)<li>{!! icon($h['icon'] ?? 'check') !!}{{ t($h['label'] ?? null) }}</li>@endforeach</ul>
            @endif
        </div>
    </div>
    <div class="shero__slant frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '(min-width:1024px) 55vw, 100vw'])</div>
</section>
