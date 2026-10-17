@if ($paginator->hasPages())
<nav aria-label="{{ __('site.pagination') }}">
    <ul class="pager">
        <li>@if ($paginator->onFirstPage())<span class="is-disabled" aria-hidden="true">{!! icon('chevron-left', 'icon flip-rtl') !!}</span>@else<a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('site.previous') }}">{!! icon('chevron-left', 'icon flip-rtl') !!}</a>@endif</li>
        @foreach ($elements as $element)
            @if (is_string($element))<li><span>{{ $element }}</span></li>@endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li>@if ($page == $paginator->currentPage())<span aria-current="page">{{ $page }}</span>@else<a href="{{ $url }}">{{ $page }}</a>@endif</li>
                @endforeach
            @endif
        @endforeach
        <li>@if ($paginator->hasMorePages())<a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('site.next') }}">{!! icon('chevron-right', 'icon flip-rtl') !!}</a>@else<span class="is-disabled" aria-hidden="true">{!! icon('chevron-right', 'icon flip-rtl') !!}</span>@endif</li>
    </ul>
</nav>
@endif
