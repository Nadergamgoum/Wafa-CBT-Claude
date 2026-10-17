<?php

namespace App\Filament\Resources\Posts;

use App\Filament\Support\MediaPicker;
use App\Filament\Support\SeoFields;
use App\Filament\Support\Tr;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\TeamMember;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use UnitEnum;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static string|UnitEnum|null $navigationGroup = 'Insights';

    protected static ?string $navigationLabel = 'Articles';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('post')->columnSpanFull()->persistTabInQueryString()->tabs([
                Tab::make('Article')->schema([
                    Tr::text('title', 'Title', required: true),
                    Tr::textarea('excerpt', 'Excerpt'),
                    Tr::rich('body', 'Article content'),
                    MediaPicker::make('image_id', 'Featured image'),
                ]),
                Tab::make('Publishing')->schema([
                    Section::make()->columns(3)->schema([
                        TextInput::make('slug')->required()->alphaDash()->maxLength(160)->unique(ignoreRecord: true)->helperText('/insights/{slug}'),
                        Select::make('post_category_id')->label('Category')->native(false)
                            ->options(fn () => PostCategory::query()->orderBy('sort')->get()->mapWithKeys(fn ($c) => [$c->id => t($c->name, 'en')])),
                        DateTimePicker::make('published_at')->label('Publish date')->default(now())->helperText('Future dates schedule the article.'),
                        Select::make('author_id')->label('Author (team member)')->native(false)->placeholder('Use author name below')
                            ->options(fn () => TeamMember::query()->get()->mapWithKeys(fn ($m) => [$m->id => t($m->name, 'en')])),
                        Toggle::make('is_featured')->label('Featured'),
                        Toggle::make('is_published')->label('Published')->default(true),
                    ]),
                    Tr::text('author_name', 'Author name', help: 'Used when no team member is selected.'),
                    Grid::make(2)->schema([
                        TagsInput::make('tags.en')->label('Tags — English'),
                        TagsInput::make('tags.ar')->label('Tags — العربية'),
                    ])->columnSpanFull(),
                ]),
                Tab::make('SEO')->schema([SeoFields::make('title', ['image_id'])]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('title.en')->label('Title')->searchable()->wrap()->description(fn ($record) => t($record->title, 'ar')),
            TextColumn::make('category.name.en')->label('Category')->badge()->color('gray'),
            TextColumn::make('published_at')->dateTime('Y-m-d')->sortable(),
            IconColumn::make('is_featured')->label('Featured')->boolean(),
            IconColumn::make('is_published')->label('Live')->boolean(),
        ])
            ->filters([SelectFilter::make('post_category_id')->label('Category')->relationship('category', 'slug')])
            ->defaultSort('published_at', 'desc')
            ->recordActions([
                Action::make('view')->label('View')->icon('heroicon-o-arrow-top-right-on-square')->url(fn ($record) => $record->url('en'))->openUrlInNewTab(),
                EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
