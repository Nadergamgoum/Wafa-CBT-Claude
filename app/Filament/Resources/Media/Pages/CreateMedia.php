<?php

namespace App\Filament\Resources\Media\Pages;

use App\Filament\Resources\Media\MediaResource;
use App\Support\MediaProcessor;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateMedia extends CreateRecord
{
    protected static string $resource = MediaResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return MediaProcessor::register($data['path'], $data['original_name'] ?? null, [
            'title' => $data['title'] ?? null,
            'alt' => $data['alt'] ?? null,
            'caption' => $data['caption'] ?? null,
            'focal_point' => $data['focal_point'] ?? '50% 50%',
            'uploaded_by' => auth()->id(),
            'folder' => 'library',
        ]);
    }
}
