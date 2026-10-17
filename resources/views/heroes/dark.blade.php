<section class="shero shero--dark on-dark">
    <div class="shero__lines" aria-hidden="true"></div>
    <div class="container shero__grid">
        <div class="shero__copy">@include('heroes._copy', ['light' => true])
            @if (! empty($hero['highlights']))
                <ul class="shero__themes">@foreach (array_slice($hero['highlights'], 0, 4) as $h)<li>{{ t($h['label'] ?? null) }}</li>@endforeach</ul>
            @endif
        </div>
        <div class="shero__arch frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '(min-width:1024px) 38vw, 100vw'])</div>
    </div>
</section>
