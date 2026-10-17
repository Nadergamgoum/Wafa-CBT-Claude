@php $labels = array_slice($hero['highlights'] ?? [], 0, 3); @endphp
<section class="shero shero--diagram">
    <div class="container shero__grid">
        <div class="shero__copy">@include('heroes._copy')</div>
        <div class="shero__venn" aria-hidden="true">
            @foreach ($labels as $li => $h)
                <span class="venn venn--{{ $li + 1 }}"><span>{!! icon($h['icon'] ?? 'users') !!}<b>{{ t($h['label'] ?? null) }}</b></span></span>
            @endforeach
            <span class="venn__core">{{ __('site.hr_core') }}</span>
        </div>
    </div>
    @if ($service->heroImage)
        <div class="container"><div class="frame frame--16x9 shero__below">@include('components.media', ['media' => $service->heroImage, 'sizes' => '100vw'])</div></div>
    @endif
</section>
