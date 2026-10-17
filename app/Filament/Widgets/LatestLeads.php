<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Leads\LeadResource;
use App\Models\Lead;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class LatestLeads extends TableWidget
{
    // Analytics and leads are Super Admin information.
    public static function canView(): bool
    {
        return (bool) auth()->user()?->isSuperAdmin();
    }

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Latest form submissions';

    public function table(Table $table): Table
    {
        return $table
            ->query(Lead::query()->latest()->limit(6))
            ->paginated(false)
            ->columns([
                TextColumn::make('created_at')->label('Received')->since(),
                TextColumn::make('name')->description(fn (Lead $r) => $r->company),
                TextColumn::make('service')->label('Interest')->placeholder('—')->limit(30),
                TextColumn::make('status')->badge()->formatStateUsing(fn ($state) => Lead::STATUSES[$state] ?? $state)->color(fn ($state) => $state === 'new' ? 'warning' : 'gray'),
            ])
            ->recordActions([Action::make('open')->url(fn (Lead $r) => LeadResource::getUrl('edit', ['record' => $r]))])
            ->emptyStateHeading('No submissions yet');
    }
}
