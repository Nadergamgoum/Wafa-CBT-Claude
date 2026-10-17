@php
    use App\Support\Content;
    $services = Content::servicesByIds($b['services'] ?? []);
    if ($services->isEmpty()) {
        $services = Content::services()->filter(fn ($s) => in_array($s->category?->key, ['people', 'learning'], true))->values();
    }
    $img = media_find($b['image'] ?? null);
    $bg = $b['background'] ?? 'ivory';
@endphp
@if ($services->isNotEmpty())
<section class="section beyond {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container beyond__grid">
        <div class="beyond__intro">
            @include('partials.shead', ['b' => $b])
            <div class="frame frame--4x3 hide-mobile">@include('components.media', ['media' => $img, 'fallback' => art($b['art'] ?? 'beyond'), 'alt' => '', 'sizes' => '(min-width:1024px) 34vw, 0px'])</div>
        </div>
        <ol class="beyond__index">
            @foreach ($services as $ii => $s)
                <li data-accent="{{ $s->accent }}">
                    <a href="{{ $s->url() }}" class="beyond__row">
                        <span class="beyond__num">{{ str_pad($ii + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="beyond__ico">{!! icon($s->icon ?: 'sparkles') !!}</span>
                        <span class="beyond__text">
                            <span class="beyond__cat">{{ $s->category?->navLabel() }}</span>
                            <strong>{{ t($s->title) }}</strong>
                            <span class="beyond__sum">{{ t($s->summary) }}</span>
                        </span>
                        <span class="beyond__go">{!! icon('arrow-up-right', 'icon flip-rtl') !!}</span>
                    </a>
                </li>
            @endforeach
        </ol>
    </div>
</section>
@endif
