@if (! empty($crumbs) && count($crumbs) > 1)
<nav class="crumbs {{ $light ?? false ? 'crumbs--light' : '' }}" aria-label="{{ __('site.breadcrumb') }}">
    <ol>
        @foreach ($crumbs as $ci => $c)
            <li>
                @if ($ci < count($crumbs) - 1)
                    <a href="{{ $c[1] }}">{{ $c[0] }}</a>
                @else
                    <span aria-current="page">{{ $c[0] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif
