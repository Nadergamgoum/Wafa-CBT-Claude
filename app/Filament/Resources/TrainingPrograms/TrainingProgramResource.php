<?php

namespace App\Filament\Resources\TrainingPrograms;

use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\ProgramCategory;
use App\Models\TrainingProgram;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class TrainingProgramResource extends Resource
{
    protected static ?string $model = TrainingProgram::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string|UnitEnum|null $navigationGroup = 'Training';

    protected static ?string $navigationLabel = 'Training programs';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('program')->columnSpanFull()->persistTabInQueryString()->tabs([
                Tab::make('Program')->schema([
                    Tr::text('title', 'Title', required: true),
                    Tr::textarea('summary', 'Summary'),
                    Tr::rich('description', 'Description'),
                    Tr::textarea('audience', 'Audience (who it is for)'),
                    Tr::lines('outcomes', 'Learning outcomes'),
                    Tr::lines('requirements', 'Requirements'),
                    MediaPicker::make('image_id', 'Program image'),
                ]),
                Tab::make('Schedule & registration')->schema([
                    Section::make()->columns(3)->schema([
                        Select::make('program_category_id')->label('Category')->native(false)
                            ->options(fn () => ProgramCategory::query()->orderBy('sort')->get()->mapWithKeys(fn ($c) => [$c->id => t($c->name, 'en')])),
                        Select::make('delivery_mode')->label('Delivery mode')->options(TrainingProgram::DELIVERY_MODES)->native(false),
                        Select::make('registration_status')->options(TrainingProgram::STATUSES)->required()->default('on_request')->native(false),
                        DatePicker::make('starts_at')->label('Start date'),
                        DatePicker::make('ends_at')->label('End date')->afterOrEqual('starts_at'),
                        Select::make('has_certificate')->label('Certificate')->options([1 => 'Certificate of completion', 0 => 'No certificate'])->placeholder('Not specified')->native(false),
                        TextInput::make('registration_url')->label('External registration URL')->url()->maxLength(255)->helperText('Optional. If empty, the built-in registration form is used.'),
                        TextInput::make('online_link')->label('Online session link')->url()->maxLength(255)->helperText('Kept private — shared with registrants only.'),
                    ]),
                    Tr::text('duration', 'Duration', help: 'e.g. “2 days” or “4 × 3-hour sessions”.'),
                    Tr::text('location', 'Location'),
                    Tr::text('trainer', 'Facilitator / trainer'),
                ]),
                Tab::make('Agenda & FAQ')->schema([
                    Repeater::make('agenda')->label('Program outline')->schema([Tr::text('title', 'Module'), Tr::textarea('text', 'Description')])
                        ->collapsible()->reorderableWithButtons()->itemLabel(fn (array $state) => $state['title']['en'] ?? null)->columnSpanFull(),
                    Repeater::make('faqs')->label('FAQ')->schema([Tr::text('q', 'Question'), Tr::textarea('a', 'Answer')])
                        ->collapsible()->reorderableWithButtons()->itemLabel(fn (array $state) => $state['q']['en'] ?? null)->columnSpanFull(),
                ]),
                Tab::make('Settings')->schema([
                    Section::make()->columns(4)->schema([
                        TextInput::make('slug')->required()->alphaDash()->unique(ignoreRecord: true)->helperText('/training-programs/{slug}'),
                        TextInput::make('sort')->numeric()->default(0),
                        Toggle::make('is_featured')->label('Featured'),
                        Toggle::make('is_published')->label('Published')->default(true),
                    ]),
                ]),
                Tab::make('SEO')->schema([SeoFields::make('title', ['image_id'])]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title.en')->label('Program')->searchable()->wrap()->description(fn ($record) => t($record->title, 'ar')),
            TextColumn::make('category.name.en')->label('Category')->badge()->color('gray'),
            TextColumn::make('registration_status')->label('Status')->badge()->formatStateUsing(fn ($state) => TrainingProgram::STATUSES[$state] ?? $state)
                ->color(fn ($state) => match ($state) { 'open' => 'success', 'upcoming' => 'warning', default => 'gray' }),
            TextColumn::make('starts_at')->date()->label('Starts')->placeholder('—'),
            IconColumn::make('is_featured')->label('Featured')->boolean(),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])
            ->filters([SelectFilter::make('registration_status')->options(TrainingProgram::STATUSES)])
            ->defaultSort('sort')->reorderable('sort')
            ->recordActions([
                Action::make('view')->label('View')->icon('heroicon-o-arrow-top-right-on-square')->url(fn ($record) => $record->url('en'))->openUrlInNewTab(),
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrainingPrograms::route('/'),
            'create' => Pages\CreateTrainingProgram::route('/create'),
            'edit' => Pages\EditTrainingProgram::route('/{record}/edit'),
        ];
    }
}
