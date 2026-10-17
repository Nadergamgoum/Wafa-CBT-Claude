<section class="shero shero--editorial">
    <div class="shero__wide frame">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '100vw'])</div>
    <div class="container">
        <div class="shero__card">
            @include('heroes._copy')
        </div>
        @if (! empty($hero['highlights']))
            <ul class="shero__facts">
                @foreach (array_slice($hero['highlights'], 0, 4) as $h)
                    <li>{!! icon($h['icon'] ?? 'shield') !!}<span>{{ t($h['label'] ?? null) }}</span></li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
