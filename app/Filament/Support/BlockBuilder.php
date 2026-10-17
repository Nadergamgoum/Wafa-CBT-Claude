<?php

namespace App\Filament\Support;

use App\Cms\Blocks;
use App\Models\Service;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;

/**
 * Builds the Filament "Page sections" builder from the block registry, so editors
 * can edit, reorder, hide and add sections in both languages.
 */
class BlockBuilder
{
    public static function make(string $name = 'sections', string $scope = 'all'): Builder
    {
        $blocks = [];
        foreach (Blocks::for($scope) as $type => [$label, , $fields]) {
            $blocks[] = Block::make($type)
                ->label(fn (?array $state) => $label.(($t = trim(str_replace('*', '', (string) ($state['title']['en'] ?? '')))) !== '' ? ' — '.Str::limit($t, 60) : '')
                    .(($state['visible'] ?? true) ? '' : ' (hidden)'))
                ->icon(static::blockIcon($type))
                ->schema(array_merge(
                    static::fields($fields),
                    [static::display($type, $fields)]
                ));
        }

        return Builder::make($name)
            ->label('Page sections')
            ->helperText('Sections appear on the page in this order. Drag to reorder, use “Show this section” in a section’s display options to hide it, or add new sections.')
            ->blocks($blocks)
            ->collapsible()
            ->collapsed()
            ->cloneable()
            ->blockNumbers(false)
            ->reorderableWithButtons()
            ->addActionLabel('Add section')
            ->columnSpanFull();
    }

    /** @return array<int, mixed> */
    public static function fields(array $fields, string $prefix = ''): array
    {
        $out = [];
        foreach ($fields as $key => $kind) {
            $label = static::labelFor($key);
            $name = $prefix.$key;
            if (is_array($kind)) {
                [$type, $config] = $kind;
                if ($type === 'select') {
                    $out[] = Select::make($name)->label($label)->options($config)->default(array_key_first($config))->native(false);
                } elseif ($type === 'items') {
                    $out[] = Repeater::make($name)->label($label)
                        ->schema(static::fields($config))
                        ->collapsible()->collapsed()->cloneable()->reorderableWithButtons()
                        ->itemLabel(fn (array $state) => Str::limit(trim(str_replace('*', '', (string) ($state['title']['en'] ?? $state['label']['en'] ?? $state['q']['en'] ?? $state['name']['en'] ?? $state['caption']['en'] ?? $state['value']['en'] ?? ''))) ?: 'Item', 70))
                        ->addActionLabel('Add item')
                        ->columnSpanFull();
                }

                continue;
            }
            $out[] = match ($kind) {
                't' => Tr::text($name, $label),
                'ta' => Tr::textarea($name, $label),
                'lines' => Tr::lines($name, $label),
                'rich' => Tr::rich($name, $label),
                'media' => MediaPicker::make($name, $label),
                'icon' => static::iconSelect($name, $label),
                'link' => TextInput::make($name)->label($label)->maxLength(500)
                    ->helperText('A site path such as /contact#contact-form (the Arabic version is added automatically), a full https:// URL, #section-anchor or @whatsapp.'),
                'toggle' => Toggle::make($name)->label($label),
                'number' => TextInput::make($name)->label($label)->numeric()->minValue(0)->maxValue(50),
                'services' => Select::make($name)->label($label)->multiple()->native(false)
                    ->options(fn () => Service::query()->orderBy('sort')->get()->mapWithKeys(fn ($s) => [$s->id => t($s->title, 'en')])->all())
                    ->helperText('Leave empty to show a sensible default selection.'),
                default => TextInput::make($name)->label($label),
            };
        }

        return $out;
    }

    protected static function display(string $type, array $fields): Section
    {
        $schema = [
            Toggle::make('visible')->label('Show this section')->default(true)->inline(false),
            TextInput::make('anchor')->label('Anchor ID')->helperText('Optional, for #links (letters, numbers, dashes).')->regex('/^[a-z0-9-]*$/')->maxLength(60),
        ];
        if (! in_array($type, ['hero_home', 'cta_band', 'medical_spotlight'], true)) {
            $schema[] = Select::make('background')->label('Background')->options(Blocks::BACKGROUNDS)->placeholder('Default')->native(false);
        }
        if (static::hasMedia($fields)) {
            $schema[] = Select::make('art')->label('Built-in illustration (used when no image is selected)')
                ->options(static::artOptions())->placeholder('Default')->native(false);
        } else {
            $schema[] = Hidden::make('art');
        }
        $schema[] = Grid::make(['default' => 1, 'md' => 2])->schema([
            TextInput::make('nav_label.en')->label('On-page menu label — English')->maxLength(40),
            TextInput::make('nav_label.ar')->label('On-page menu label — العربية')->maxLength(40)->extraInputAttributes(['dir' => 'rtl']),
        ])->columnSpanFull();

        return Section::make('Display options')->schema($schema)->columns(2)->collapsed()->compact();
    }

    protected static function hasMedia(array $fields): bool
    {
        return in_array('media', $fields, true);
    }

    public static function iconSelect(string $name, string $label = 'Icon'): Select
    {
        $icons = require app_path('Support/icon-list.php');

        return Select::make($name)->label($label)->searchable()->native(false)
            ->options(array_combine($icons, array_map(fn ($i) => Str::headline($i), $icons)));
    }

    public static function artOptions(): array
    {
        return collect(glob(public_path('images/art/*.svg')) ?: [])
            ->mapWithKeys(fn ($f) => [basename($f, '.svg') => Str::headline(basename($f, '.svg'))])->sort()->all();
    }

    protected static function labelFor(string $key): string
    {
        return match ($key) {
            'cta_label' => 'Primary button text', 'cta_link' => 'Primary button link',
            'cta2_label' => 'Secondary button text', 'cta2_link' => 'Secondary button link',
            'lead' => 'Introduction', 'q' => 'Question', 'a' => 'Answer', 'items' => 'Items',
            'chips' => 'Floating highlight cards', 'image_side' => 'Image position',
            'limit' => 'Number of items', 'points' => 'Bullet points',
            default => Str::headline($key),
        };
    }

    protected static function blockIcon(string $type): string
    {
        return match ($type) {
            'hero_home', 'medical_spotlight' => 'heroicon-o-star',
            'faq' => 'heroicon-o-question-mark-circle',
            'cta_band' => 'heroicon-o-megaphone',
            'process', 'roadmap', 'transformation', 'engagement' => 'heroicon-o-arrow-trending-up',
            'rich_text' => 'heroicon-o-document-text',
            'founder', 'team' => 'heroicon-o-user-circle',
            'gallery', 'engagements' => 'heroicon-o-photo',
            'stats', 'reporting' => 'heroicon-o-chart-bar',
            'quote', 'testimonials' => 'heroicon-o-chat-bubble-left-right',
            'accordion' => 'heroicon-o-bars-3-bottom-left',
            'logos' => 'heroicon-o-building-office-2',
            'programs', 'program_categories', 'formats' => 'heroicon-o-academic-cap',
            'insights' => 'heroicon-o-newspaper',
            'ecosystem', 'model', 'dimensions' => 'heroicon-o-squares-2x2',
            default => 'heroicon-o-rectangle-group',
        };
    }
}
