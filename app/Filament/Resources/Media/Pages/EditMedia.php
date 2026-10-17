<?php

namespace App\Filament\Resources\Media\Pages;

use App\Filament\Resources\Media\MediaResource;
use App\Support\MediaProcessor;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EditMedia extends EditRecord
{
    protected static string $resource = MediaResource::class;

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $oldPath = $record->path;
        $replaced = ! empty($data['path']) && $data['path'] !== $oldPath;
        $record->fill($data);
        if ($replaced) {
            MediaProcessor::process($record);
            Storage::disk($record->disk)->delete($oldPath);
        }
        $record->save();

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
