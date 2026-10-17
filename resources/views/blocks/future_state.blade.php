@php $bg = $b['background'] ?? 'ivory'; @endphp
<section class="section future {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'center'])
        <div class="future__compare">
            <div class="future__side future__side--now">
                <p class="future__tag">{!! icon('layers') !!} {{ t($b['left_title'] ?? null) }}</p>
                <ul>@foreach (lines($b['left_points'] ?? null) as $p)<li>{{ $p }}</li>@endforeach</ul>
            </div>
            <div class="future__pivot" aria-hidden="true">{!! icon('arrow-right', 'icon flip-rtl') !!}</div>
            <div class="future__side future__side--next">
                <p class="future__tag">{!! icon('sparkles') !!} {{ t($b['right_title'] ?? null) }}</p>
                <ul class="checks">@foreach (lines($b['right_points'] ?? null) as $p)<li>{{ $p }}</li>@endforeach</ul>
            </div>
        </div>
    </div>
</section>
