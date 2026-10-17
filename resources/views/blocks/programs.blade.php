@php
    $programs = \App\Support\Content::programs((int) ($b['limit'] ?? 6) ?: 6);
    $bg = $b['background'] ?? 'white';
@endphp
@if ($programs->isNotEmpty())
<section class="section progs {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title" data-accent="amber">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <div class="rail" data-rail style="--rail-item: min(82%, 360px); --rail-item-md: 46%">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($programs as $p)
                    <li>@include('programs.card', ['program' => $p])</li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
        <div class="progs__cta">
            @if (t($b['cta_label'] ?? null))
                @include('partials.cta', ['b' => $b])
            @else
                <a class="link-arrow" href="{{ lroute('programs.index') }}">{{ __('site.all_programs') }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
            @endif
        </div>
    </div>
</section>
@endif
