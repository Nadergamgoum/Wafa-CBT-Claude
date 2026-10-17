{{-- Photo gallery with an accessible lightbox. Params: items (Collection of [media => Media, caption => array]), gid, layout ('grid'|'carousel') --}}
@php $layout = $layout ?? 'grid'; $total = $items->count(); @endphp
<div class="gallery gallery--{{ $layout }}" data-gallery>
    @if ($layout === 'carousel')<div class="rail" data-rail>@endif
    <ul class="gallery__grid {{ $layout === 'carousel' ? 'rail__track' : '' }}" @if($layout === 'carousel') data-rail-track tabindex="0" aria-label="{{ __('site.gallery') }}" @endif>
        @foreach ($items as $gi => $g)
            @php $cap = t($g['caption'] ?? null); $alt = $g['media']->altText() ?: $cap; @endphp
            <li class="gallery__item">
                <figure>
                    <a class="frame frame--4x3 gallery__link" href="{{ $g['media']->url(1600) }}" data-gallery-open="{{ $gi }}"
                       data-full="{{ $g['media']->url(1600) }}" data-alt="{{ $alt }}" data-caption="{{ $cap }}"
                       aria-label="{{ __('site.open_photo', ['n' => $gi + 1, 'total' => $total]) }}">
                        @include('components.media', ['media' => $g['media'], 'alt' => $alt, 'sizes' => '(min-width:1100px) 380px, (min-width:700px) 46vw, 90vw', 'widths' => 960])
                    </a>
                    @if ($cap)<figcaption>{{ $cap }}</figcaption>@endif
                </figure>
            </li>
        @endforeach
    </ul>
    @if ($layout === 'carousel')@include('partials.rail-controls')</div>@endif
    <dialog class="lightbox" data-gallery-dialog aria-label="{{ __('site.gallery') }}">
        <div class="lightbox__inner">
            <button type="button" class="lightbox__close" data-gallery-close aria-label="{{ __('site.close') }}">{!! icon('x') !!}</button>
            <figure class="lightbox__fig">
                <img alt="" data-gallery-img>
                <figcaption><span data-gallery-caption></span> <span class="lightbox__count" data-gallery-count data-label="{{ __('site.photo_n', ['n' => '__N__', 'total' => $total]) }}"></span></figcaption>
            </figure>
            @if ($total > 1)
                <button type="button" class="lightbox__nav lightbox__nav--prev" data-gallery-prev aria-label="{{ __('site.previous') }}">{!! icon('chevron-left', 'icon flip-rtl') !!}</button>
                <button type="button" class="lightbox__nav lightbox__nav--next" data-gallery-next aria-label="{{ __('site.next') }}">{!! icon('chevron-right', 'icon flip-rtl') !!}</button>
            @endif
        </div>
    </dialog>
</div>
