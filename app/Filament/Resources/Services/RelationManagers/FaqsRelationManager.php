<?php

namespace App\Filament\Resources\Services\RelationManagers;

use App\Filament\Support\Tr;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Toggle;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FaqsRelationManager extends RelationManager
{
    protected static string $relationship = 'faqs';

    protected static ?string $title = 'FAQs on this service page';

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            Tr::text('question', 'Question', required: true, max: 300),
            Tr::textarea('answer', 'Answer', required: true, rows: 4),
            Toggle::make('is_published')->label('Published')->default(true),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                TextColumn::make('question.en')->label('Question')->wrap()->description(fn ($record) => t($record->question, 'ar')),
                IconColumn::make('is_published')->label('Live')->boolean(),
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
            ->headerActions([CreateAction::make()])
            ->recordActions([EditAction::make(), DeleteAction::make()]);
    }
}
