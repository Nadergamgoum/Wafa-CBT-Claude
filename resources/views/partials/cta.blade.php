{{-- Primary/secondary CTA pair from block data. Params: b, light (bool), size --}}
@php $light = $light ?? false; @endphp
@if (t($b['cta_label'] ?? null) || t($b['cta2_label'] ?? null))
<div class="btn-row">
    @if ($l = t($b['cta_label'] ?? null))
        @php $href = link_url($b['cta_link'] ?? '/contact'); @endphp
        <a class="btn {{ $light ? 'btn--light' : '' }}" href="{{ $href }}" @if(str_contains($href, '/contact')) data-event="consultation_click" @elseif(str_contains($href, 'wa.me')) data-event="whatsapp_click" target="_blank" rel="noopener" @endif>{{ $l }} {!! icon('arrow-right', 'icon flip-rtl') !!}</a>
    @endif
    @if ($l2 = t($b['cta2_label'] ?? null))
        @php $href2 = link_url($b['cta2_link'] ?? '#'); @endphp
        <a class="btn {{ $light ? 'btn--outline-light' : 'btn--ghost' }}" href="{{ $href2 }}" @if(str_contains($href2, 'wa.me')) data-event="whatsapp_click" target="_blank" rel="noopener" @elseif(str_contains($href2, '/contact')) data-event="consultation_click" @endif>{{ $l2 }}</a>
    @endif
</div>
@endif
