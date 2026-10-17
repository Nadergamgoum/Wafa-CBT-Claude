<?php

namespace App\Filament\Resources\Services;

use App\Filament\Support\BlockBuilder;
use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\Service;
use App\Models\ServiceCategory;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

    protected static string|UnitEnum|null $navigationGroup = 'Services';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('service')->columnSpanFull()->persistTabInQueryString()->tabs([
                Tab::make('Content')->icon('heroicon-o-pencil-square')->schema([
                    Tr::text('title', 'Service name', required: true),
                    Tr::text('nav_title', 'Short name for menus', help: 'Optional, e.g. “Medical Insurance”.'),
                    Tr::textarea('summary', 'Summary', help: 'Used on cards, menus and as the default meta description.'),
                    Section::make()->columns(3)->schema([
                        Select::make('service_category_id')->label('Category')->required()->native(false)
                            ->options(fn () => ServiceCategory::query()->orderBy('sort')->get()->mapWithKeys(fn ($c) => [$c->id => t($c->title, 'en')])),
                        TextInput::make('slug')->required()->alphaDash()->maxLength(120)->helperText('URL: /{category}/{slug}'),
                        TextInput::make('sort')->numeric()->default(0),
                        Toggle::make('is_published')->label('Published')->default(true),
                        Toggle::make('is_featured')->label('Featured'),
                    ]),
                ]),
                Tab::make('Hero')->icon('heroicon-o-sparkles')->schema([
                    Tr::text('hero.eyebrow', 'Category label (eyebrow)'),
                    Tr::text('hero.title', 'Hero headline', help: 'Wrap words in *asterisks* to highlight them. Defaults to the service name.'),
                    Tr::textarea('hero.lead', 'Hero introduction'),
                    Tr::text('hero.cta_label', 'Primary button text'),
                    TextInput::make('hero.cta_link')->label('Primary button link')->placeholder('/contact#contact-form'),
                    Tr::text('hero.cta2_label', 'Secondary button text'),
                    TextInput::make('hero.cta2_link')->label('Secondary button link'),
                    Repeater::make('hero.highlights')->label('Highlights shown in the hero')->columnSpanFull()
                        ->schema([BlockBuilder::iconSelect('icon'), Tr::text('label', 'Label')])
                        ->collapsible()->reorderableWithButtons()->maxItems(4)
                        ->itemLabel(fn (array $state) => $state['label']['en'] ?? null),
                ]),
                Tab::make('Presentation')->icon('heroicon-o-swatch')->schema([
                    Section::make('Page style')->description('Each service family has its own structure. These settings fine-tune the look.')->columns(2)->schema([
                        Select::make('family')->label('Service family')->options(Service::FAMILIES)->required()->native(false)
                            ->helperText('Determines the default page structure and artwork.'),
                        Select::make('hero_variant')->label('Hero layout')->options(Service::HERO_VARIANTS)->required()->native(false),
                        Select::make('accent')->label('Subtle accent colour')->options(Service::ACCENTS)->native(false),
                        BlockBuilder::iconSelect('icon', 'Menu icon'),
                        Select::make('illustration')->label('Built-in illustration')->options(BlockBuilder::artOptions())->native(false)
                            ->placeholder('Default for the family')->helperText('Shown when no photograph is selected.'),
                    ]),
                    Section::make('Images')->description('Each image can be changed independently.')->columns(3)->schema([
                        MediaPicker::make('hero_image_id', 'Hero image'),
                        MediaPicker::make('secondary_image_id', 'Secondary image'),
                        MediaPicker::make('card_image_id', 'Card / menu image'),
                    ]),
                ]),
                Tab::make('Sections')->icon('heroicon-o-rectangle-group')->schema([BlockBuilder::make('sections', 'all')]),
                Tab::make('SEO')->icon('heroicon-o-magnifying-glass')->schema([SeoFields::make('title', ['hero_image_id', 'secondary_image_id', 'card_image_id'])]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title.en')->label('Service')->searchable()->description(fn (Service $r) => t($r->title, 'ar')),
                TextColumn::make('category.title.en')->label('Category')->badge()->color('gray'),
                TextColumn::make('family')->formatStateUsing(fn ($state) => Service::FAMILIES[$state] ?? $state),
                TextColumn::make('hero_variant')->label('Hero')->formatStateUsing(fn ($state) => explode(' (', Service::HERO_VARIANTS[$state] ?? $state)[0])->toggleable(),
                IconColumn::make('is_published')->label('Live')->boolean(),
            ])
            ->filters([SelectFilter::make('service_category_id')->label('Category')->relationship('category', 'key')])
            ->defaultSort('sort')
            ->reorderable('sort')
            ->recordActions([
                Action::make('view')->label('View')->icon('heroicon-o-arrow-top-right-on-square')->url(fn (Service $r) => $r->url('en'))->openUrlInNewTab(),
                EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [RelationManagers\FaqsRelationManager::class];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
