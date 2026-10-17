{{-- Renders an ordered list of CMS blocks. $blocks: [{type, data}], $ctx: owning model (optional) --}}
@foreach (($blocks ?? []) as $i => $block)
    @php
        $type = $block['type'] ?? null;
        $b = $block['data'] ?? [];
    @endphp
    @continue(! $type || ! ($b['visible'] ?? true) || ! view()->exists('blocks.'.$type))
    @include('blocks.'.$type, ['b' => $b, 'ctx' => $ctx ?? null, 'index' => $i, 'bid' => ($b['anchor'] ?? null) ?: $type.'-'.$i])
@endforeach
