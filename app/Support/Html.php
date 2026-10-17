<?php

namespace App\Support;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

/** Sanitises editor-authored rich text before output (defence in depth against XSS). */
class Html
{
    protected static ?HtmlSanitizer $sanitizer = null;

    public static function clean(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }
        static::$sanitizer ??= new HtmlSanitizer(
            (new HtmlSanitizerConfig)
                ->allowSafeElements()
                ->allowElement('a', ['href', 'title', 'target', 'rel'])
                ->allowElement('img', ['src', 'alt', 'width', 'height', 'loading'])
                ->allowElement('figure')->allowElement('figcaption')
                ->allowElement('table')->allowElement('thead')->allowElement('tbody')->allowElement('tr')
                ->allowElement('th', ['scope', 'colspan', 'rowspan'])->allowElement('td', ['colspan', 'rowspan'])
                ->allowLinkSchemes(['https', 'http', 'mailto', 'tel'])
                ->allowMediaSchemes(['https', 'http'])
                ->allowRelativeLinks()
                ->allowRelativeMedias()
                ->forceAttribute('a', 'rel', 'noopener')
                ->dropElement('script')->dropElement('style')->dropElement('iframe')
                ->withMaxInputLength(200000)
        );

        return static::$sanitizer->sanitize($html);
    }

    /** Builds a table of contents from h2 headings and injects anchor ids. */
    public static function withToc(string $html): array
    {
        $toc = [];
        $i = 0;
        $html = preg_replace_callback('#<h2([^>]*)>(.*?)</h2>#is', function ($m) use (&$toc, &$i) {
            $text = trim(strip_tags($m[2]));
            $id = 'section-'.(++$i);
            $toc[] = ['id' => $id, 'text' => $text];

            return '<h2 id="'.$id.'"'.preg_replace('/\sid="[^"]*"/', '', $m[1]).'>'.$m[2].'</h2>';
        }, $html);

        return [$html, $toc];
    }
}
