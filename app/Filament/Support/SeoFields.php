<?php

namespace App\Filament\Support;

use App\Support\SeoAudit;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;

class SeoFields
{
    public static function make(string $h1Attribute = 'title', array $images = []): Section
    {
        return Section::make('Search engine & social sharing')
            ->description('Leave fields empty to use sensible defaults from the page content.')
            ->schema([
                TextEntry::make('seo_warnings')->label('SEO checks')->columnSpanFull()
                    ->state(fn (?Model $record) => static::warnings($record, $h1Attribute, $images))
                    ->html(),
                Tr::text('seo.title', 'SEO title', help: 'About 50–60 characters.', max: 120),
                Tr::textarea('seo.description', 'Meta description', help: 'About 120–160 characters.'),
                Tr::text('seo.focus_keyword', 'Focus keyword', max: 120),
                Tr::text('seo.keywords', 'Secondary keywords', help: 'Comma separated. Used for your own planning — not shown to visitors.', max: 400),
                Tr::text('seo.og_title', 'Open Graph / X title', max: 120),
                Tr::textarea('seo.og_description', 'Open Graph / X description'),
                MediaPicker::make('seo.og_image_id', 'Social sharing image', 'Recommended 1200 × 630 px. Falls back to the page image or the default sharing image.'),
                Tr::text('seo.canonical', 'Canonical URL override', help: 'Only if this content officially lives at another URL. Must start with https://', max: 400),
                Grid::make(3)->schema([
                    Toggle::make('seo.index')->label('Allow search engines to index')->default(true)->formatStateUsing(fn ($state) => $state ?? true),
                    Toggle::make('seo.follow')->label('Allow search engines to follow links')->default(true)->formatStateUsing(fn ($state) => $state ?? true),
                    Select::make('seo.twitter_card')->label('X (Twitter) card')->options(['summary_large_image' => 'Large image', 'summary' => 'Summary'])->default('summary_large_image')->native(false),
                ])->columnSpanFull(),
            ])
            ->collapsible();
    }

    protected static function warnings(?Model $record, string $h1, array $images): HtmlString
    {
        if (! $record) {
            return new HtmlString('<span style="color:#6b7a86">Save the item to run SEO checks.</span>');
        }
        $issues = SeoAudit::check($record, $h1, $images);
        if (! $issues) {
            return new HtmlString('<span style="color:#17734a;font-weight:600">✓ No issues found.</span>');
        }
        $colors = ['danger' => '#b42318', 'warning' => '#8a5a00', 'info' => '#33424e'];

        return new HtmlString('<ul style="margin:0;padding-left:18px;display:grid;gap:4px">'.collect($issues)->map(fn ($i) => '<li style="color:'.$colors[$i['level']].'">'.e($i['message']).'</li>')->implode('').'</ul>');
    }
}
