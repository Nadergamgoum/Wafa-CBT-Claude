{{-- Only figures entered in the CMS are shown; the section is hidden when empty. --}}
@php $items = collect($b['items'] ?? [])->filter(fn ($it) => t($it['value'] ?? null) !== '')->values(); $bg = $b['background'] ?? 'dark'; @endphp
@if ($items->isNotEmpty())
<section class="section stats {{ $bg === 'dark' ? 'on-dark' : 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <dl class="stats__grid" style="--cols: {{ min(4, $items->count()) }}">
            @foreach ($items as $it)
                <div class="stats__item reveal">
                    <dt>{{ t($it['label'] ?? null) }}</dt>
                    <dd><span class="stats__value">{{ t($it['value'] ?? null) }}</span>@if($n = t($it['note'] ?? null))<small>{{ $n }}</small>@endif</dd>
                </div>
            @endforeach
        </dl>
        @if ($note = t($b['note'] ?? null))<p class="stats__note small">{{ $note }}</p>@endif
    </div>
</section>
@endif
