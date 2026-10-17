<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected bool $passwordChanged = false;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->passwordChanged = filled($data['password'] ?? null);

        return $data;
    }

    protected function afterSave(): void
    {
        if ($this->passwordChanged || ! $this->record->is_active) {
            $this->record->invalidateSessions($this->record->is(auth()->user()) ? request()->session()->getId() : null);
        }
    }

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()->hidden(fn () => $this->record->is(auth()->user()))];
    }
}
