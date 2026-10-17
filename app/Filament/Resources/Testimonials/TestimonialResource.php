<?php

namespace App\Filament\Resources\Testimonials;

use App\Filament\Support\Tr;
use App\Models\Testimonial;
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

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tr::textarea('quote', 'Quote', required: true, rows: 4),
            Section::make('Attribution')->description('Only publish genuine testimonials with the client’s permission.')->columns(3)->schema([
                TextInput::make('author_name')->required()->maxLength(120),
                TextInput::make('company')->maxLength(160),
                TextInput::make('sort')->numeric()->default(0),
            ]),
            Tr::text('author_role', 'Author role'),
            Toggle::make('is_published')->label('Published'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('quote.en')->label('Quote')->limit(80)->wrap(),
            TextColumn::make('author_name'),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])->defaultSort('sort')->reorderable('sort')->recordActions([EditAction::make(), DeleteAction::make()])
            ->emptyStateDescription('Testimonial sections stay hidden on the website until at least one testimonial is published.');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
