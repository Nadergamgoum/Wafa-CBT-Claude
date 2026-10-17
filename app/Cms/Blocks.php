<?php

namespace App\Cms;

/**
 * Registry of content blocks. Each page (home, services, categories, generic pages)
 * stores an ordered list of {type, data} blocks. The same definitions drive the
 * admin form builder and the public renderer (resources/views/blocks/{type}.blade.php).
 *
 * Field kinds:
 *   t      translatable single line      ta    translatable multi-line
 *   rich   translatable rich text         lines translatable "one item per line"
 *   media  media library image            icon  icon picker
 *   link   URL or site path               select [options]
 *   toggle boolean                        number integer
 *   items  repeater [subfields]           services  service picker (multiple)
 */
class Blocks
{
    public const BACKGROUNDS = ['white' => 'White', 'ivory' => 'Warm ivory', 'mist' => 'Soft mist', 'soft' => 'Service tint', 'dark' => 'Dark'];

    public static function all(): array
    {
        $head = ['eyebrow' => 't', 'title' => 't', 'lead' => 'ta'];
        $cta = ['cta_label' => 't', 'cta_link' => 'link'];
        $cta2 = ['cta2_label' => 't', 'cta2_link' => 'link'];
        $iconItems = ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta']]];

        return [
            'hero_home' => ['Homepage hero', 'home', $head + $cta + $cta2 + [
                'image' => 'media',
                'chips' => ['items', ['icon' => 'icon', 'label' => 't', 'text' => 't']],
                'note' => 't',
            ]],
            'medical_spotlight' => ['Medical insurance spotlight (flagship)', 'home', $head + [
                'body' => 'ta',
            ] + $iconItems + ['image' => 'media', 'card_title' => 't', 'card_text' => 'ta'] + $cta + $cta2],
            'challenges' => ['Challenges', 'any', $head + [
                'layout' => ['select', ['numbered' => 'Numbered editorial list', 'grid' => 'Icon grid', 'statements' => 'Statement rows', 'tiles' => 'Risk tiles']],
            ] + $iconItems],
            'process' => ['Process / journey', 'any', $head + [
                'layout' => ['select', ['timeline' => 'Horizontal timeline', 'chevrons' => 'Chevron path', 'vertical' => 'Vertical timeline',
                    'stairs' => 'Ascending steps', 'cards' => 'Phase cards', 'cycle' => 'Continuous cycle']],
                'center_label' => 't',
                'items' => ['items', ['title' => 't', 'text' => 'ta', 'icon' => 'icon']],
            ] + $cta],
            'ecosystem' => ['Ecosystem diagram', 'any', $head + ['center_label' => 't', 'center_text' => 't'] + $iconItems],
            'insurance_lines' => ['Insurance solutions (other lines)', 'home', $head + [
                'services' => 'services',
            ] + $cta],
            'beyond' => ['Beyond insurance — services index', 'home', $head + ['services' => 'services', 'image' => 'media'] + $cta],
            'split_feature' => ['Split feature (image + text)', 'any', $head + [
                'body' => 'ta', 'points' => 'lines', 'image' => 'media', 'image_side' => ['select', ['end' => 'Image on the end side', 'start' => 'Image on the start side']],
                'aside_title' => 't', 'aside_text' => 'ta',
            ] + $cta],
            'programs' => ['Training programs (featured)', 'any', $head + ['limit' => 'number'] + $cta],
            'pillars' => ['Pillars / why us', 'any', $head + [
                'layout' => ['select', ['numbers' => 'Large numerals', 'dark' => 'Dark panel', 'lines' => 'Thin-line grid']],
            ] + $iconItems],
            'insights' => ['Insights (latest articles)', 'any', $head + ['limit' => 'number'] + $cta],
            'faq' => ['FAQ', 'any', $head + [
                'source' => ['select', ['auto' => 'Page FAQs (managed in FAQs)', 'home' => 'Homepage FAQs', 'custom' => 'Custom questions below']],
                'items' => ['items', ['q' => 't', 'a' => 'ta']],
            ] + $cta],
            'cta_band' => ['Call to action', 'any', $head + $cta + $cta2 + [
                'layout' => ['select', ['image' => 'Image background', 'dark' => 'Dark panel', 'soft' => 'Soft panel', 'contact' => 'Contact channels']],
                'image' => 'media',
            ]],
            'approach' => ['Approach (split with checklist)', 'service', $head + ['body' => 'ta', 'image' => 'media'] + ['items' => ['items', ['title' => 't', 'text' => 'ta']]]],
            'model' => ['Management model (quadrant diagram)', 'service', $head + ['center_label' => 't'] + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'experience' => ['Tabs (tabbed panels, e.g. employee moments)', 'any', $head + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'statement' => ['Statement (large quote + points)', 'service', ['eyebrow' => 't', 'title' => 't', 'statement' => 'ta', 'image' => 'media'] + $iconItems],
            'audience' => ['Who it is for', 'service', $head + $iconItems],
            'coverage' => ['Protection / coverage areas', 'service', $head + [
                'layout' => ['select', ['shield' => 'Shielded list', 'compare' => 'Comparison columns', 'assets' => 'Asset tiles']],
                'note' => 'ta',
            ] + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'risk_band' => ['Risk band', 'service', $head + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 't']]]],
            'framework' => ['Framework columns (e.g. People / Process / Performance)', 'service', $head + ['items' => ['items', ['letter' => 't', 'title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'areas' => ['Areas index (numbered)', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta']]]],
            'engagement' => ['Engagement model (phases + deliverables)', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'outcomes' => ['Outcomes band', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta']]]],
            'related' => ['Related services', 'any', $head + ['services' => 'services']],
            'transformation' => ['Transformation flow (current → future)', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'dimensions' => ['Diagnostic dimensions', 'service', $head + $iconItems],
            'roadmap' => ['Roadmap (phased bars)', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta', 'start' => 'number', 'span' => 'number']]]],
            'future_state' => ['Today vs. future state', 'service', $head + ['left_title' => 't', 'left_points' => 'lines', 'right_title' => 't', 'right_points' => 'lines']],
            'formats' => ['Delivery formats', 'service', $head + $iconItems],
            'program_categories' => ['Training program categories', 'service', $head + $cta],
            'focus_grid' => ['Focus areas (tag grid)', 'service', $head + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta']]]],
            'accountability' => ['Goals & accountability', 'service', $head + ['goals_title' => 't', 'goals' => 'lines', 'cycle_title' => 't'] + ['items' => ['items', ['title' => 't', 'text' => 'ta']]]],
            'themes' => ['Leadership themes (refined grid)', 'service', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta']]]],
            'hero_banner' => ['Hero banner (page intro with image)', 'any', $head + $cta + $cta2 + ['image' => 'media',
                'layout' => ['select', ['split' => 'Text beside image', 'overlay' => 'Text over image', 'plain' => 'Text only']]]],
            'founder' => ['Founder / leader profile', 'any', ['eyebrow' => 't', 'title' => 't', 'name' => 't', 'role' => 't', 'bio' => 'ta',
                'quote' => 'ta', 'photo' => 'media', 'points' => 'lines'] + $cta],
            'vision_mission' => ['Vision & mission', 'any', $head + ['vision_title' => 't', 'vision' => 'ta', 'mission_title' => 't', 'mission' => 'ta']],
            'quote' => ['Quote / pull statement', 'any', ['eyebrow' => 't', 'quote' => 'ta', 'author' => 't', 'role' => 't', 'image' => 'media']],
            'cards' => ['Cards (benefits grid, feature list or carousel)', 'any', $head + [
                'layout' => ['select', ['grid' => 'Card grid', 'list' => 'Feature list', 'carousel' => 'Carousel']],
                'items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta', 'image' => 'media', 'link' => 'link', 'link_label' => 't']],
            ] + $cta],
            'accordion' => ['Accordion (expandable items)', 'any', $head + ['items' => ['items', ['title' => 't', 'text' => 'ta', 'points' => 'lines']]] + $cta],
            'stats' => ['Statistics (enter verified figures only)', 'any', $head + ['items' => ['items', ['value' => 't', 'label' => 't', 'note' => 't']],
                'note' => 'ta']],
            'logos' => ['Logo grid (clients/partners — approved only)', 'any', $head + ['items' => ['items', ['image' => 'media', 'name' => 't', 'url' => 'link']]]],
            'gallery' => ['Photo gallery', 'any', $head + [
                'layout' => ['select', ['grid' => 'Grid', 'carousel' => 'Carousel']],
                'items' => ['items', ['image' => 'media', 'caption' => 't']],
            ] + $cta],
            'engagements' => ['Corporate engagements (latest)', 'any', $head + ['limit' => 'number'] + $cta],
            'reporting' => ['Reporting / dashboard showcase', 'any', $head + ['panel_title' => 't'] + ['items' => ['items', ['icon' => 'icon', 'title' => 't', 'text' => 'ta', 'points' => 'lines']]]],
            'testimonials' => ['Testimonials (published only)', 'any', $head],
            'team' => ['Team members (published only)', 'any', $head],
            'rich_text' => ['Rich text', 'any', ['eyebrow' => 't', 'title' => 't', 'body' => 'rich', 'narrow' => 'toggle']],
        ];
    }

    public static function label(string $type): string
    {
        return static::all()[$type][0] ?? $type;
    }

    /** Fields for a block type: [name => kind|array]. */
    public static function fields(string $type): array
    {
        return static::all()[$type][2] ?? [];
    }

    public static function for(string $scope): array
    {
        return array_filter(static::all(), fn ($def) => in_array($def[1], ['any', $scope], true) || $scope === 'all');
    }
}
