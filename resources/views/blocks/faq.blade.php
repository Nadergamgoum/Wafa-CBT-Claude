@php
    use App\Support\Content;
    $source = $b['source'] ?? 'auto';
    $list = collect();
    if ($source === 'custom') {
        $list = collect($b['items'] ?? [])->map(fn ($f) => ['q' => t($f['q'] ?? null), 'a' => t($f['a'] ?? null)]);
    } elseif ($source === 'home' || ! ($ctx instanceof \App\Models\Service)) {
        $list = ($source === 'home' ? Content::homeFaqs() : (isset($faqTopic) ? Content::faqsForTopic($faqTopic) : Content::homeFaqs()))
            ->map(fn ($f) => ['q' => t($f->question), 'a' => t($f->answer)]);
    } else {
        $list = Content::faqsForService($ctx->id)->map(fn ($f) => ['q' => t($f->question), 'a' => t($f->answer)]);
    }
    $list = $list->filter(fn ($f) => $f['q'] !== '')->values();
    $bg = $b['background'] ?? 'white';
@endphp
@if ($list->isNotEmpty())
<section class="section faq {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container faq__grid">
        <div class="faq__aside">
            @include('partials.shead', ['b' => $b])
            <div class="faq__help hide-mobile">
                <p>{{ __('site.faq_help') }}</p>
                <a class="btn btn--ghost btn--sm" href="{{ link_url($b['cta_link'] ?? '/contact') }}#contact-form" data-event="consultation_click">{{ t($b['cta_label'] ?? null) ?: __('site.ask_question') }}</a>
            </div>
        </div>
        <div class="acc" data-acc data-acc-single>
            @foreach ($list as $fi => $f)
                <div class="acc__item">
                    <h3 class="acc__h">
                        <button type="button" class="acc__btn" id="{{ $bid }}-q{{ $fi }}" aria-expanded="{{ $fi === 0 ? 'true' : 'false' }}" aria-controls="{{ $bid }}-a{{ $fi }}" data-acc-btn>
                            <span>{{ $f['q'] }}</span><span class="acc__sign" aria-hidden="true"></span>
                        </button>
                    </h3>
                    <div class="acc__panel" id="{{ $bid }}-a{{ $fi }}" role="region" aria-labelledby="{{ $bid }}-q{{ $fi }}" @if($fi !== 0) hidden @endif>{!! nl2br(e(strip_tags($f['a']))) !!}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
