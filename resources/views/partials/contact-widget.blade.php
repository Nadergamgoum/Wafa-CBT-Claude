@if (setting('channels.widget_enabled', true) && count($channels))
<div class="cwidget" data-cwidget>
    <div class="cwidget__panel" id="cwidget-panel" role="dialog" aria-label="{{ __('site.contact_options') }}">
        <h2>{{ t(setting('channels.widget_title')) ?: __('site.widget_title') }}</h2>
        <p>{{ t(setting('channels.widget_text')) ?: __('site.widget_text') }}</p>
        <ul class="cwidget__list">
            @foreach ($channels as $ch)
                <li>
                    <a href="{{ $ch['href'] }}" @if($ch['event']) data-event="{{ $ch['event'] }}" @endif @if($ch['external']) target="_blank" rel="noopener" @endif>
                        <span class="ico {{ $ch['key'] === 'whatsapp' ? 'ico--wa' : '' }}">{!! icon($ch['icon']) !!}</span>
                        <span>{{ $ch['label'] }} @if($ch['detail'])<small @if(in_array($ch['key'], ['phone'])) dir="ltr" @endif>{{ $ch['detail'] }}</small>@endif</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <button type="button" class="cwidget__btn" aria-expanded="false" aria-controls="cwidget-panel" data-cwidget-toggle>
        {!! icon('messages-square') !!}<span>{{ __('site.contact_us') }}</span>
    </button>
</div>
@endif
