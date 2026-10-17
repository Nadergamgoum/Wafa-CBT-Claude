{!! '<'.'?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">
@foreach ($entries as $entry)
@foreach ($entry['urls'] as $locale => $loc)
  <url>
    <loc>{{ $loc }}</loc>
@foreach ($entry['urls'] as $l => $href)
    <xhtml:link rel="alternate" hreflang="{{ $l }}" href="{{ $href }}"/>
@endforeach
    <xhtml:link rel="alternate" hreflang="x-default" href="{{ $entry['urls']['en'] }}"/>
@if ($entry['updated'])
    <lastmod>{{ $entry['updated']->toAtomString() }}</lastmod>
@endif
    <changefreq>{{ $entry['freq'] }}</changefreq>
    <priority>{{ $entry['priority'] }}</priority>
  </url>
@endforeach
@endforeach
</urlset>
