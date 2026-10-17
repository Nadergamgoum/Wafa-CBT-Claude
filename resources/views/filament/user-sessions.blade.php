<div class="fi-ta-ctn" style="display:grid;gap:10px">
    @forelse ($sessions as $s)
        <div style="padding:10px 12px;border:1px solid rgb(0 0 0 / 10%);border-radius:10px">
            <strong>{{ $s->ip_address ?: 'Unknown IP' }}</strong>
            <span style="opacity:.7"> · last active {{ \Illuminate\Support\Carbon::createFromTimestamp($s->last_activity)->diffForHumans() }}</span>
            @if ($s->id === session()->getId())<span style="color:#0e7f75;font-weight:600"> · this session</span>@endif
            <div style="opacity:.7;font-size:.85rem;margin-top:2px">{{ \Illuminate\Support\Str::limit($s->user_agent, 140) }}</div>
        </div>
    @empty
        <p style="opacity:.7">No active sessions{{ config('session.driver') !== 'database' ? ' (session tracking needs SESSION_DRIVER=database)' : '' }}.</p>
    @endforelse
</div>
