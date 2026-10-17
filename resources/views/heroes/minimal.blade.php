@php $stages = array_slice($hero['highlights'] ?? [], 0, 4); @endphp
<section class="shero shero--minimal">
    <div class="container--narrow shero__center">@include('heroes._copy')</div>
    @if ($stages)
        <div class="container">
            <ol class="shero__journey" aria-label="{{ __('site.transformation_path') }}">
                @foreach ($stages as $si => $h)
                    <li style="--t: {{ count($stages) > 1 ? round($si / (count($stages) - 1), 2) : 1 }}"><span class="dot"></span><span class="lbl">{{ t($h['label'] ?? null) }}</span></li>
                @endforeach
            </ol>
        </div>
    @endif
    <div class="container"><div class="frame shero__band">@include('components.media', ['media' => $service->heroImage, 'fallback' => $service->artUrl(), 'eager' => true, 'sizes' => '100vw'])</div></div>
</section>
