<?php

namespace App\Filament\Resources\ServiceCategories;

use App\Filament\Support\BlockBuilder;
use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\ServiceCategory;
use BackedEnum;
use Filament\Actions\EditAction;
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

class ServiceCategoryResource extends Resource
{
    protected static ?string $model = ServiceCategory::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-squares-2x2';

    protected static string|UnitEnum|null $navigationGroup = 'Services';

    protected static ?string $navigationLabel = 'Service categories';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('cat')->columnSpanFull()->tabs([
                Tab::make('Content')->schema([
                    Tr::text('title', 'Category name', required: true),
                    Tr::text('nav_title', 'Short menu name'),
                    Tr::textarea('summary', 'Summary'),
                    Tr::text('hero.eyebrow', 'Hero label'),
                    Tr::text('hero.title', 'Hero headline', help: 'Use *asterisks* to highlight words.'),
                    Tr::textarea('hero.lead', 'Hero introduction'),
                    MediaPicker::make('image_id', 'Header image'),
                    Section::make()->columns(3)->schema([
                        TextInput::make('slug')->required()->alphaDash()->unique(ignoreRecord: true),
                        TextInput::make('sort')->numeric()->default(0),
                        Toggle::make('is_published')->default(true),
                    ]),
                ]),
                Tab::make('Sections')->schema([BlockBuilder::make('sections', 'all')]),
                Tab::make('SEO')->schema([SeoFields::make('title', ['image_id'])]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title.en')->label('Category')->description(fn ($record) => t($record->title, 'ar')),
            TextColumn::make('slug')->badge()->color('gray'),
            TextColumn::make('services_count')->counts('services')->label('Services'),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])->defaultSort('sort')->reorderable('sort')->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServiceCategories::route('/'),
            'create' => Pages\CreateServiceCategory::route('/create'),
            'edit' => Pages\EditServiceCategory::route('/{record}/edit'),
        ];
    }
}
