@php $members = \App\Support\Content::team(); $bg = $b['background'] ?? 'white'; @endphp
@if ($members->isNotEmpty())
<section class="section team {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <div class="rail rail--grid" data-rail style="--cols: 4; --rail-item: min(70%, 260px)">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ plain_title(t($b['title'] ?? null)) }}">
                @foreach ($members as $m)
                    <li class="team__card">
                        <div class="frame frame--4x5">@include('components.media', ['media' => $m->photo, 'fallback' => art('person'), 'alt' => t($m->name), 'sizes' => '260px', 'widths' => 480])</div>
                        <h3 class="h4">{{ t($m->name) }}</h3>
                        @if ($r = t($m->role))<p class="muted">{{ $r }}</p>@endif
                        @if ($m->linkedin_url)<a href="{{ $m->linkedin_url }}" target="_blank" rel="noopener" class="team__in" aria-label="LinkedIn — {{ t($m->name) }}">{!! icon('b-linkedin') !!}</a>@endif
                    </li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
@endif
