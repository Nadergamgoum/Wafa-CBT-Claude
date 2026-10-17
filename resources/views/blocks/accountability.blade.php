@php $items = $b['items'] ?? []; $n = max(1, count($items)); $bg = $b['background'] ?? 'mist'; @endphp
<section class="section acct {{ 'bg-'.$bg }}" id="{{ $bid }}" aria-labelledby="{{ $bid }}-title">
    <div class="container">
        @include('partials.shead', ['b' => $b, 'align' => 'split'])
        <div class="acct__grid">
            <div class="acct__goals">
                <p class="acct__h">{!! icon('target') !!} {{ t($b['goals_title'] ?? null) }}</p>
                <ol>@foreach (lines($b['goals'] ?? null) as $gi => $g)<li><span>{{ $gi + 1 }}</span>{{ $g }}</li>@endforeach</ol>
            </div>
            <div class="acct__cycle">
                <p class="acct__h">{!! icon('refresh-cw') !!} {{ t($b['cycle_title'] ?? null) }}</p>
                <div class="acct__ring" style="--n: {{ $n }}">
                    <svg viewBox="0 0 100 100" aria-hidden="true"><circle cx="50" cy="50" r="38" fill="none" stroke="currentColor" stroke-width=".8" stroke-dasharray="2 2.5"/></svg>
                    <ol>
                        @foreach ($items as $ii => $it)
                            @php $a = deg2rad(-90 + 360 / $n * $ii); @endphp
                            <li style="--x: {{ round(50 + 38 * cos($a), 2) }}%; --y: {{ round(50 + 38 * sin($a), 2) }}%"><span class="acct__dot">{{ $ii + 1 }}</span><span class="acct__lbl">{{ t($it['title'] ?? null) }}</span></li>
                        @endforeach
                    </ol>
                </div>
                <dl class="acct__defs">
                    @foreach ($items as $ii => $it)
                        <div><dt><span>{{ $ii + 1 }}</span> {{ t($it['title'] ?? null) }}</dt><dd>{{ t($it['text'] ?? null) }}</dd></div>
                    @endforeach
                </dl>
            </div>
        </div>
    </div>
</section>
