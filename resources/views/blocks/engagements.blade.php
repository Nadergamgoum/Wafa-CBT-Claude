@php $list = \App\Support\Content::engagements((int) ($b['limit'] ?? 3) ?: 3); $bg = $b['background'] ?? 'white'; @endphp
@if ($list->isNotEmpty())
<section class="section {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title" data-accent="teal">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split', 'actions' => '<a class="link-arrow" href="'.e(lroute('engagements.index')).'">'.e(__('site.all_engagements')).' '.icon('arrow-right', 'icon flip-rtl').'</a>'])
        <div class="rail rail--grid" data-rail style="--cols: 3">
            <ul class="rail__track" data-rail-track tabindex="0" aria-label="{{ __('site.engagements') }}">
                @foreach ($list as $e)<li>@include('engagements.card', ['engagement' => $e])</li>@endforeach
            </ul>
            @include('partials.rail-controls')
        </div>
        @include('partials.cta', ['b' => $b])
    </div>
</section>
@endif
