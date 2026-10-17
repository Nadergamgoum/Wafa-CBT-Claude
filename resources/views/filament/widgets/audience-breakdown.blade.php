<x-filament-widgets::widget>
    <div style="display:grid;gap:16px;grid-template-columns:repeat(auto-fit,minmax(260px,1fr))">
        @foreach ($panels as $title => $rows)
            <x-filament::section compact>
                <x-slot name="heading">{{ $title }}</x-slot>
                @php $max = max(1, ...array_map('intval', array_values($rows) ?: [1])); @endphp
                @forelse ($rows as $label => $count)
                    @if ($count === null)
                        <p style="color:#6b7a86;font-size:13px">No referring sites recorded yet.</p>
                    @else
                        <div style="margin-bottom:8px">
                            <div style="display:flex;justify-content:space-between;gap:8px;font-size:13px"><span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap" title="{{ $label }}">{{ $label }}</span><strong>{{ number_format($count) }}</strong></div>
                            <div style="height:6px;border-radius:6px;background:rgba(127,127,127,.15);margin-top:4px"><div style="height:6px;border-radius:6px;background:#0e7f75;width:{{ round($count / $max * 100) }}%"></div></div>
                        </div>
                    @endif
                @empty
                    <p style="color:#6b7a86;font-size:13px">No data yet — statistics appear as visitors use the site.</p>
                @endforelse
            </x-filament::section>
        @endforeach
    </div>
</x-filament-widgets::widget>
