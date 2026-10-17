<section class="shero shero--overlay on-dark">
    <div class="shero__cover" aria-hidden="true">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '100vw', 'alt' => ''])</div>
    <div class="container">
        <div class="shero__copy">@include('heroes._copy', ['light' => true])</div>
        @if (! empty($hero['highlights']))
            <ul class="shero__strip">
                @foreach (array_slice($hero['highlights'], 0, 4) as $h)
                    <li><span class="shero__strip-ico">{!! icon($h['icon'] ?? 'building-2') !!}</span>{{ t($h['label'] ?? null) }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
