<section class="shero shero--growth">
    <div class="container shero__grid">
        <div class="shero__copy">@include('heroes._copy')</div>
        <div class="shero__visual">
            <div class="frame shero__frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '(min-width:1024px) 44vw, 100vw'])</div>
            <svg class="shero__chart" viewBox="0 0 300 140" aria-hidden="true"><polyline points="8,124 70,104 120,110 175,70 225,58 292,14" fill="none" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/><circle cx="292" cy="14" r="7" fill="currentColor"/></svg>
            @if (! empty($hero['highlights']))
                <ul class="shero__kpis">@foreach (array_slice($hero['highlights'], 0, 3) as $h)<li>{!! icon($h['icon'] ?? 'trending-up') !!}<span>{{ t($h['label'] ?? null) }}</span></li>@endforeach</ul>
            @endif
        </div>
    </div>
</section>
