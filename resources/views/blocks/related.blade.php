@php
    use App\Support\Content;
    $services = Content::servicesByIds($b['services'] ?? []);
    if ($services->isEmpty() && $ctx instanceof \App\Models\Service) {
        $services = Content::services()->where('id', '!=', $ctx->id)
            ->sortBy(fn ($s) => ($s->service_category_id === $ctx->service_category_id ? 0 : 1).str_pad($s->sort, 4, '0', STR_PAD_LEFT))->take(4)->values();
    }
    $bg = $b['background'] ?? 'mist';
@endphp
@if ($services->isNotEmpty())
<section class="section rel {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => array_merge(['title' => ['en' => __('site.related_services', [], 'en'), 'ar' => __('site.related_services', [], 'ar')]], array_filter($b))])
        <div class="rail rail--grid" data-rail style="--cols: {{ min(4, $services->count()) }}; --rail-item: min(74%, 280px)">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ __('site.related_services') }}">
                @foreach ($services as $s)
                    <li class="rel__card" data-accent="{{ $s->accent }}">
                        <a href="{{ $s->url() }}">
                            <span class="icon-tile">{!! icon($s->icon ?: 'sparkles') !!}</span>
                            <span class="rel__cat">{{ $s->category?->navLabel() }}</span>
                            <strong>{{ t($s->title) }}</strong>
                            <span class="rel__sum">{{ \Illuminate\Support\Str::limit(t($s->summary), 110) }}</span>
                            <span class="rel__go">{!! icon('arrow-right', 'icon flip-rtl') !!}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
    </div>
</section>
@endif
