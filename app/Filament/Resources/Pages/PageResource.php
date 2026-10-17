<?php

namespace App\Filament\Resources\Pages;

use App\Filament\Support\BlockBuilder;
use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\Page;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-document-duplicate';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'slug';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('page')->columnSpanFull()->persistTabInQueryString()->tabs([
                Tab::make('Content')->icon('heroicon-o-pencil-square')->schema([
                    Tr::text('title', 'Page title (H1)', required: true),
                    Tr::textarea('intro', 'Introduction'),
                    MediaPicker::make('hero_image_id', 'Header image'),
                ]),
                Tab::make('Sections')->icon('heroicon-o-rectangle-group')->schema([
                    BlockBuilder::make('sections', 'all'),
                ]),
                Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([
                    SeoFields::make('title', ['hero_image_id']),
                ]),
                Tab::make('Settings')->icon('heroicon-o-cog-6-tooth')->schema([
                    Section::make()->columns(2)->schema([
                        TextInput::make('slug')->required()->maxLength(150)->alphaDash()->unique(ignoreRecord: true)
                            ->disabled(fn (?Page $record) => $record?->key && in_array($record->key, ['home', 'about', 'contact', 'insights', 'programs'], true))
                            ->helperText('URL: /{slug} (Arabic: /ar/{slug}). System pages keep fixed URLs.'),
                        Select::make('template')->options(Page::TEMPLATES)->required()->native(false)->default('generic')
                            ->disabled(fn (?Page $record) => (bool) $record?->key),
                        Toggle::make('is_published')->label('Published')->default(true),
                        TextInput::make('sort')->numeric()->default(0),
                    ]),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title.en')->label('Title')->formatStateUsing(fn ($state) => str_replace('*', '', (string) $state))->searchable()->description(fn (Page $r) => str_replace('*', '', t($r->title, 'ar'))),
                TextColumn::make('slug')->badge()->color('gray'),
                TextColumn::make('template')->formatStateUsing(fn ($state) => Page::TEMPLATES[$state] ?? $state),
                IconColumn::make('is_published')->label('Live')->boolean(),
                TextColumn::make('updated_at')->since()->label('Updated'),
            ])
            ->defaultSort('sort')
            ->recordActions([
                Action::make('view')->label('View')->icon('heroicon-o-arrow-top-right-on-square')->url(fn (Page $r) => $r->url('en'))->openUrlInNewTab(),
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\Pages\Pages\ListPages::route('/'),
            'create' => \App\Filament\Resources\Pages\Pages\CreatePage::route('/create'),
            'edit' => \App\Filament\Resources\Pages\Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
