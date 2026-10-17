<?php

namespace App\Filament\Support;

use App\Models\Media;
use App\Support\MediaProcessor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Storage;

/**
 * Select an image from the media library (with thumbnails) or upload a new one inline.
 */
class MediaPicker
{
    public const ACCEPT = ['image/jpeg', 'image/png', 'image/webp', 'image/avif', 'image/gif'];

    public static function make(string $name, string $label, ?string $help = null): Select
    {
        return Select::make($name)
            ->label($label)
            ->helperText($help ?? 'Choose from the media library or upload a new image. Leave empty to use the built-in illustration.')
            ->searchable()
            ->preload(false)
            ->allowHtml()
            ->native(false)
            ->getSearchResultsUsing(fn (string $search) => static::options(
                Media::query()->where(fn ($q) => $q->where('title', 'like', "%{$search}%")->orWhere('original_name', 'like', "%{$search}%"))
            ))
            ->options(fn () => static::options(Media::query()))
            ->getOptionLabelUsing(fn ($value) => ($m = Media::find($value)) ? static::label($m) : null)
            ->createOptionForm([
                FileUpload::make('file')->label('Image')->disk('media')->directory('library/'.date('Y/m'))
                    ->image()->acceptedFileTypes(self::ACCEPT)->maxSize(8192)->required()
                    ->storeFileNamesIn('original_name'),
                TextInput::make('alt_en')->label('Alt text — English')->maxLength(200),
                TextInput::make('alt_ar')->label('Alt text — العربية')->maxLength(200)->extraInputAttributes(['dir' => 'rtl']),
            ])
            ->createOptionUsing(function (array $data) {
                $media = MediaProcessor::register($data['file'], $data['original_name'] ?? null, [
                    'alt' => ['en' => $data['alt_en'] ?? '', 'ar' => $data['alt_ar'] ?? ''],
                    'uploaded_by' => auth()->id(),
                    'folder' => 'library',
                ]);

                return $media->getKey();
            });
    }

    protected static function options($query): array
    {
        return $query->where('mime', 'like', 'image/%')->latest()->limit(60)->get()
            ->mapWithKeys(fn (Media $m) => [$m->id => static::label($m)])->all();
    }

    public static function label(Media $m): string
    {
        $thumb = e($m->url(480));

        return '<span style="display:flex;align-items:center;gap:10px"><img src="'.$thumb.'" alt="" style="width:44px;height:32px;object-fit:cover;border-radius:6px;flex:none">'
            .'<span>'.e($m->label()).'</span></span>';
    }
}
