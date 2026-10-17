<?php

namespace App\Filament\Resources\Redirects;

use App\Filament\Concerns\SuperAdminOnly;
use App\Models\Redirect;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class RedirectResource extends Resource
{
    use SuperAdminOnly;

    protected static ?string $model = Redirect::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static string|UnitEnum|null $navigationGroup = 'Site';

    protected static ?string $navigationLabel = 'Redirects & 410';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('from_path')->label('Old path')->required()->maxLength(300)->unique(ignoreRecord: true)
                ->helperText('e.g. /about-us or /?page_id=12 (old WordPress URL). End with * to match everything below a path, e.g. /portfolio*.'),
            Select::make('status_code')->label('Response')->options(Redirect::CODES)->default(301)->native(false)->live(),
            TextInput::make('to_url')->label('New URL')->maxLength(500)
                ->required(fn ($get) => (int) $get('status_code') !== 410)
                ->hidden(fn ($get) => (int) $get('status_code') === 410)
                ->helperText('A site path like /about or a full https:// URL.'),
            Toggle::make('is_active')->label('Active')->default(true),
            TextInput::make('note')->maxLength(190),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('from_path')->searchable(),
            TextColumn::make('to_url')->searchable()->placeholder('— (410 Gone)'),
            TextColumn::make('status_code')->badge(),
            TextColumn::make('hits')->sortable(),
            TextColumn::make('last_hit_at')->since()->placeholder('Never'),
            IconColumn::make('is_active')->label('Active')->boolean(),
        ])->filters([
            \Filament\Tables\Filters\SelectFilter::make('status_code')->label('Response')->options(Redirect::CODES),
        ])->defaultSort('from_path')->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRedirects::route('/'),
            'create' => Pages\CreateRedirect::route('/create'),
            'edit' => Pages\EditRedirect::route('/{record}/edit'),
        ];
    }
}
