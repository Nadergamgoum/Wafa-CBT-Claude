@php $bg = $b['background'] ?? 'dark'; @endphp
<section class="section vm {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b])
        <div class="vm__grid">
            @foreach ([['vision', 'eye'], ['mission', 'compass']] as [$k, $ic])
                @if ($txt = t($b[$k] ?? null))
                    <article class="vm__card reveal">
                        <span class="icon-tile">{!! icon($ic) !!}</span>
                        <h3 class="h3" @if(! t($b['title'] ?? null) && $loop->first) id="{{ $bid }}-title" @endif>{{ t($b[$k.'_title'] ?? null) ?: __('site.'.$k) }}</h3>
                        <p>{{ $txt }}</p>
                    </article>
                @endif
            @endforeach
        </div>
    </div>
</section>
