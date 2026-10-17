<?php

namespace App\Filament\Resources\Media;

use App\Filament\Support\MediaPicker;
use App\Filament\Support\Tr;
use App\Models\Media;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Number;
use UnitEnum;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static string|UnitEnum|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Media library';

    protected static ?string $modelLabel = 'media item';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('File')->schema([
                TextEntry::make('preview')->label('Current image')->hiddenOn('create')->html()
                    ->state(fn (?Media $record) => $record ? new HtmlString('<img src="'.e($record->url(960)).'" alt="" style="max-height:260px;border-radius:12px">'
                        .'<p style="margin-top:8px;color:#6b7a86">'.e(($record->width ? $record->width.' × '.$record->height.' px · ' : '').Number::fileSize($record->size))
                        .' · '.count($record->variants['webp'] ?? []).' WebP and '.count($record->variants['avif'] ?? []).' AVIF sizes</p>') : ''),
                FileUpload::make('path')->label(fn (string $operation) => $operation === 'create' ? 'Image' : 'Replace image')
                    ->disk('media')->directory('library/'.date('Y/m'))
                    ->image()->acceptedFileTypes(MediaPicker::ACCEPT)->maxSize(8192)
                    ->storeFileNamesIn('original_name')
                    ->required(fn (string $operation) => $operation === 'create')
                    ->helperText('JPEG, PNG, WebP, AVIF or GIF up to 8 MB. Large images are resized and responsive WebP versions are generated automatically.'),
            ]),
            Section::make('Details')->schema([
                TextInput::make('title')->maxLength(190),
                Tr::text('alt', 'Alt text (describes the image for screen readers and search engines)', max: 250),
                Tr::text('caption', 'Caption', max: 250),
                Select::make('focal_point')->label('Focal point for cropping')->native(false)->default('50% 50%')->options([
                    '50% 50%' => 'Centre', '50% 20%' => 'Top', '50% 80%' => 'Bottom', '20% 50%' => 'Left', '80% 50%' => 'Right',
                    '25% 25%' => 'Top left', '75% 25%' => 'Top right',
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('thumb')->label('')->state(fn (Media $r) => $r->url(480))->imageHeight(56)->imageWidth(80),
            TextColumn::make('title')->searchable()->description(fn (Media $r) => $r->original_name),
            TextColumn::make('alt.en')->label('Alt text')->placeholder('Missing')->limit(40)
                ->color(fn ($state) => filled($state) ? null : 'danger'),
            TextColumn::make('size')->formatStateUsing(fn ($state) => Number::fileSize((int) $state))->label('Size'),
            TextColumn::make('created_at')->since()->label('Uploaded')->sortable(),
        ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([EditAction::make(), DeleteAction::make()]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
