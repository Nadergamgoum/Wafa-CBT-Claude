<?php

namespace App\Filament\Resources\Engagements\Pages;

use App\Filament\Resources\Engagements\EngagementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditEngagement extends EditRecord
{
    protected static string $resource = EngagementResource::class;

    protected function getHeaderActions(): array
    {
        return [DeleteAction::make()];
    }
}
