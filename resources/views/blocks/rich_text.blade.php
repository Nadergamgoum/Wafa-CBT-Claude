@php $bg = $b['background'] ?? 'white'; @endphp
<section class="section richt {{ 'bg-'.$bg }}" id="{{ $bid }}" @if(t($b['title'] ?? null)) aria-labelledby="{{ $bid }}-title" @endif>
    <div class="{{ ($b['narrow'] ?? true) ? 'container--narrow' : 'container' }}">
        @include('partials.shead', ['b' => $b])
        <div class="prose">{!! \App\Support\Html::clean(t($b['body'] ?? null)) !!}</div>
    </div>
</section>
