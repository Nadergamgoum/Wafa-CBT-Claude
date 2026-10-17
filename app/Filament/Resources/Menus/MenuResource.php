<?php

namespace App\Filament\Resources\Menus;

use App\Filament\Support\Tr;
use App\Models\Menu;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-bars-3';

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Menus & footer links';

    protected static ?int $navigationSort = 1;

    public const ROUTES = [
        'home' => 'Home', 'about' => 'About', 'contact' => 'Contact', 'insights.index' => 'Insights',
        'programs.index' => 'Training programs',
    ];

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(2)->schema([
                Select::make('location')->options(Menu::LOCATIONS)->required()->native(false)->disabled(fn (?Menu $record) => (bool) $record),
                TextInput::make('name')->required()->maxLength(120),
            ])->columnSpanFull(),
            Repeater::make('items')->label('Menu items')->columnSpanFull()
                ->schema([
                    Grid::make(3)->schema([
                        Select::make('type')->options(['category' => 'Service category (mega menu)', 'route' => 'Site page', 'url' => 'Custom link'])
                            ->required()->native(false)->live()->default('route'),
                        Select::make('target')->label('Target')->native(false)->required()
                            ->visible(fn (Get $get) => $get('type') !== 'url')
                            ->options(fn (Get $get) => $get('type') === 'category'
                                ? \App\Models\ServiceCategory::query()->orderBy('sort')->get()->mapWithKeys(fn ($c) => [$c->key => t($c->title, 'en')])->all()
                                : self::ROUTES),
                        TextInput::make('target')->label('Link')->required()->maxLength(500)
                            ->visible(fn (Get $get) => $get('type') === 'url')
                            ->helperText('/privacy-policy or https://…'),
                        Toggle::make('enabled')->label('Visible')->default(true)->inline(false),
                    ]),
                    Tr::text('label', 'Label', required: true, max: 60),
                ])
                ->reorderableWithButtons()->collapsible()
                ->itemLabel(fn (array $state) => $state['label']['en'] ?? null)
                ->addActionLabel('Add menu item'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name'),
            TextColumn::make('location')->formatStateUsing(fn ($state) => Menu::LOCATIONS[$state] ?? $state)->badge()->color('gray'),
            TextColumn::make('item_count')->label('Items')->state(fn (Menu $r) => count($r->items ?? [])),
        ])->recordActions([EditAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
