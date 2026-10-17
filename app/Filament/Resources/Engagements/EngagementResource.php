<?php

namespace App\Filament\Resources\Engagements;

use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\Engagement;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
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

class EngagementResource extends Resource
{
    protected static ?string $model = Engagement::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|UnitEnum|null $navigationGroup = 'Training';

    protected static ?string $navigationLabel = 'Corporate engagements';

    protected static ?string $modelLabel = 'corporate engagement';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('engagement')->columnSpanFull()->persistTabInQueryString()->tabs([
                Tab::make('Content')->schema([
                    Tr::text('title', 'Title', required: true),
                    Tr::textarea('summary', 'Summary'),
                    Tr::rich('body', 'Description'),
                    Tr::lines('highlights', 'Highlights (one per line)'),
                    MediaPicker::make('image_id', 'Featured image'),
                ]),
                Tab::make('Gallery')->schema([
                    Repeater::make('gallery')->label('Photos')
                        ->schema([MediaPicker::make('image', 'Photo'), Tr::text('caption', 'Caption')])
                        ->collapsible()->cloneable()->reorderableWithButtons()->grid(2)
                        ->itemLabel(fn (array $state) => $state['caption']['en'] ?? 'Photo')
                        ->addActionLabel('Add photo')
                        ->helperText('Use genuine event photos only. Alt text is managed per image in the media library.')
                        ->columnSpanFull(),
                ]),
                Tab::make('Details')->schema([
                    Section::make()->columns(2)->schema([
                        DatePicker::make('event_date')->label('Event date')->helperText('Leave empty if not confirmed — no date is shown.'),
                        Toggle::make('client_approved')->label('Client approved being named')->inline(false)
                            ->helperText('The client name is only shown publicly when this is on.'),
                    ]),
                    Tr::text('client_name', 'Client name'),
                    Tr::text('cta_label', 'Call-to-action text', help: 'e.g. “Request a Corporate Engagement Program”.'),
                    TextInput::make('cta_link')->label('Call-to-action link')->maxLength(500)->placeholder('/contact#contact-form')
                        ->helperText('A site path, a full https:// URL or @whatsapp.'),
                ]),
                Tab::make('Settings')->schema([
                    Section::make()->columns(4)->schema([
                        TextInput::make('slug')->required()->alphaDash()->unique(ignoreRecord: true)->helperText('/corporate-engagements/{slug}'),
                        TextInput::make('sort')->numeric()->default(0),
                        Toggle::make('is_featured')->label('Featured'),
                        Toggle::make('is_published')->label('Published')->default(false),
                    ]),
                ]),
                Tab::make('SEO')->schema([SeoFields::make('title', ['image_id'])]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title.en')->label('Engagement')->searchable()->wrap()->description(fn ($record) => t($record->title, 'ar')),
            TextColumn::make('event_date')->date()->label('Date')->placeholder('—'),
            TextColumn::make('gallery')->label('Photos')->state(fn ($record) => count($record->gallery ?? [])),
            IconColumn::make('client_approved')->label('Client named')->boolean(),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])
            ->defaultSort('sort')->reorderable('sort')
            ->recordActions([
                Action::make('view')->label('View')->icon('heroicon-o-arrow-top-right-on-square')->url(fn ($record) => $record->url('en'))->openUrlInNewTab(),
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEngagements::route('/'),
            'create' => Pages\CreateEngagement::route('/create'),
            'edit' => Pages\EditEngagement::route('/{record}/edit'),
        ];
    }
}
