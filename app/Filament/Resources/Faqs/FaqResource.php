<?php

namespace App\Filament\Resources\Faqs;

use App\Filament\Support\Tr;
use App\Models\Faq;
use App\Models\Service;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use UnitEnum;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'FAQs';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tr::text('question', 'Question', required: true),
            Tr::textarea('answer', 'Answer', required: true, rows: 4),
            Section::make('Where it appears')->columns(4)->schema([
                Select::make('service_id')->label('Service page')->native(false)->placeholder('None')
                    ->options(fn () => Service::query()->orderBy('sort')->get()->mapWithKeys(fn ($s) => [$s->id => t($s->title, 'en')])),
                Select::make('topic')->options(Faq::TOPICS)->native(false)->helperText('Topic FAQs appear on category, about and contact pages.'),
                Toggle::make('show_on_home')->label('Show on homepage'),
                Toggle::make('is_published')->label('Published')->default(true),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('question.en')->label('Question')->searchable()->wrap()->description(fn ($record) => t($record->question, 'ar')),
            TextColumn::make('service.title.en')->label('Service')->placeholder('—')->badge()->color('gray'),
            TextColumn::make('topic')->formatStateUsing(fn ($state) => Faq::TOPICS[$state] ?? $state)->toggleable(),
            IconColumn::make('show_on_home')->label('Home')->boolean(),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])
            ->filters([
                SelectFilter::make('service_id')->label('Service')->options(fn () => Service::query()->get()->mapWithKeys(fn ($s) => [$s->id => t($s->title, 'en')])),
                SelectFilter::make('topic')->options(Faq::TOPICS),
                TernaryFilter::make('show_on_home'),
            ])
            ->defaultSort('sort')->reorderable('sort')
            ->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
