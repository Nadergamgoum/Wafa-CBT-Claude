{{-- Section heading. Params: b (block data), align ('start'|'center'|'split'), tag (h2), actions (html) --}}
@php $align = $align ?? 'start'; $tag = $tag ?? 'h2'; $title = t($b['title'] ?? null); $lead = t($b['lead'] ?? null); @endphp
@if ($title || t($b['eyebrow'] ?? null))
<div class="shead shead--{{ $align }}">
    @if ($eyebrow = t($b['eyebrow'] ?? null))<p class="eyebrow">{{ $eyebrow }}</p>@endif
    @if ($title)<{{ $tag }} class="h2" id="{{ $bid ?? '' }}-title">{!! rich_title($title) !!}</{{ $tag }}>@endif
    @if ($lead)<p class="lead">{{ $lead }}</p>@endif
    {!! $actions ?? '' !!}
</div>
@endif
