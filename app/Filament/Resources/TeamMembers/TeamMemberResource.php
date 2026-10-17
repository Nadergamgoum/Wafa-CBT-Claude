<?php

namespace App\Filament\Resources\TeamMembers;

use App\Filament\Support\MediaPicker;
use App\Filament\Support\Tr;
use App\Models\TeamMember;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class TeamMemberResource extends Resource
{
    protected static ?string $model = TeamMember::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Team';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tr::text('name', 'Name', required: true),
            Tr::text('role', 'Role / title'),
            Tr::textarea('bio', 'Short bio'),
            MediaPicker::make('photo_id', 'Photo'),
            Section::make()->columns(4)->schema([
                TextInput::make('linkedin_url')->label('LinkedIn URL')->url()->maxLength(255),
                TextInput::make('email')->email()->maxLength(190),
                TextInput::make('sort')->numeric()->default(0),
                Toggle::make('is_published')->label('Published')->default(true),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name.en')->label('Name')->description(fn ($record) => t($record->role, 'en')),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])->defaultSort('sort')->reorderable('sort')->recordActions([EditAction::make(), DeleteAction::make()])
            ->emptyStateDescription('Team members appear on the About page only once added and published.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeamMembers::route('/'),
            'create' => Pages\CreateTeamMember::route('/create'),
            'edit' => Pages\EditTeamMember::route('/{record}/edit'),
        ];
    }
}
