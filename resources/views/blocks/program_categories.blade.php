@php
    $cats = \App\Models\ProgramCategory::query()->orderBy('sort')->withCount(['programs' => fn ($q) => $q->where('is_published', true)])->get();
    $bg = $b['background'] ?? 'white';
@endphp
@if ($cats->isNotEmpty())
<section class="section pcat {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <ul class="pcat__grid">
            @foreach ($cats as $ci => $c)
                <li>
                    <a class="pcat__item" href="{{ lroute('programs.index', ['category' => $c->slug]) }}">
                        <span class="pcat__n">{{ str_pad($ci + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <span class="pcat__txt"><strong>{{ t($c->name) }}</strong>@if($d = t($c->description))<span>{{ $d }}</span>@endif</span>
                        @if ($c->programs_count)<span class="pill">{{ trans_choice('site.programs_count', $c->programs_count, ['n' => $c->programs_count]) }}</span>@endif
                    </a>
                </li>
            @endforeach
        </ul>
        @if (t($b['cta_label'] ?? null))<div class="pcat__cta">@include('partials.cta', ['b' => $b])</div>@endif
    </div>
</section>
@endif
