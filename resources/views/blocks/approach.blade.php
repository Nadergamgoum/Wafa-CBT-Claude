@php $img = media_find($b['image'] ?? null); $items = $b['items'] ?? []; $bg = $b['background'] ?? 'white'; @endphp
<section class="section appr {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container appr__grid">
        <div class="appr__media">
            <div class="frame frame--4x5 frame--m-16x9">@include('components.media', ['media' => $img ?? ($ctx?->secondaryImage ?? null), 'fallback' => art($b['art'] ?? (($ctx?->family ?? 'medical').'-detail')), 'sizes' => '(min-width:1024px) 40vw, 100vw'])</div>
            <div class="appr__badge" aria-hidden="true">{!! icon('stethoscope') !!}</div>
        </div>
        <div class="appr__copy">
            @include('partials.shead', ['b' => $b])
            @if ($body = t($b['body'] ?? null))<p class="appr__body">{{ $body }}</p>@endif
            <ol class="appr__steps">
                @foreach ($items as $ii => $it)
                    <li>
                        <span class="appr__tick" aria-hidden="true">{!! icon('check') !!}</span>
                        <div><h3 class="h4">{{ t($it['title'] ?? null) }}</h3><p>{{ t($it['text'] ?? null) }}</p></div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
