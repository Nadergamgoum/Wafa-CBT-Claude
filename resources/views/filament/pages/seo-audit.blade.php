<x-filament-panels::page>
    <x-filament::section>
        <x-slot name="heading">How to read this page</x-slot>
        <p style="color:#4a5b69">Each item is checked for the essentials: page title (H1), SEO title and meta description in both languages, canonical format, noindex, slug quality and image alt text. There is no artificial “score” — just facts you can act on.</p>
        @if ($missingAlt)
            <p style="margin-top:8px;color:#8a5a00;font-weight:600">{{ $missingAlt }} image(s) in the media library are missing English or Arabic alt text.</p>
        @endif
    </x-filament::section>

    <div style="display:grid;gap:12px">
        @foreach ($rows as $row)
            <x-filament::section compact>
                <div style="display:flex;justify-content:space-between;gap:16px;align-items:flex-start;flex-wrap:wrap">
                    <div>
                        <span style="font-size:12px;text-transform:uppercase;letter-spacing:.08em;color:#6b7a86">{{ $row['type'] }}@unless($row['published']) · not published @endunless</span>
                        <div style="font-weight:600;font-size:15px">{{ $row['title'] }}</div>
                    </div>
                    <x-filament::link :href="$row['edit']" icon="heroicon-m-pencil-square">Edit</x-filament::link>
                </div>
                @if (count($row['issues']))
                    <ul style="margin:10px 0 0;padding-left:18px;display:grid;gap:3px">
                        @foreach ($row['issues'] as $issue)
                            <li style="color:{{ ['danger' => '#b42318', 'warning' => '#8a5a00', 'info' => '#33424e'][$issue['level']] }}">{{ $issue['message'] }}</li>
                        @endforeach
                    </ul>
                @else
                    <p style="margin-top:8px;color:#17734a;font-weight:600">✓ No issues found</p>
                @endif
            </x-filament::section>
        @endforeach
    </div>
</x-filament-panels::page>
