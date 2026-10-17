<?php

namespace App\Filament\Resources\Leads;

use App\Filament\Concerns\SuperAdminOnly;
use App\Models\Lead;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use UnitEnum;

class LeadResource extends Resource
{
    // Form submissions contain personal data: Super Admins only.
    use SuperAdminOnly;

    protected static ?string $model = Lead::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-inbox-arrow-down';

    protected static string|UnitEnum|null $navigationGroup = 'Leads';

    protected static ?string $navigationLabel = 'Form submissions';

    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        $n = Lead::query()->where('status', 'new')->count();

        return $n ? (string) $n : null;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Submission')->columns(3)->schema([
                TextEntry::make('name'),
                TextEntry::make('company')->placeholder('—'),
                TextEntry::make('type')->formatStateUsing(fn ($state) => Lead::TYPES[$state] ?? $state)->badge(),
                TextEntry::make('email')->copyable()->url(fn (Lead $r) => 'mailto:'.$r->email),
                TextEntry::make('phone')->placeholder('—')->copyable(),
                TextEntry::make('service')->label('Interest')->placeholder('—'),
                TextEntry::make('message')->columnSpanFull()->placeholder('—')->extraAttributes(['style' => 'white-space:pre-wrap']),
                TextEntry::make('locale')->label('Language')->formatStateUsing(fn ($state) => strtoupper((string) $state)),
                TextEntry::make('page_url')->label('Submitted from')->placeholder('—')->limit(60),
                TextEntry::make('created_at')->label('Received')->dateTime(),
                TextEntry::make('utm')->label('Campaign (UTM)')->placeholder('—')
                    ->formatStateUsing(fn ($state) => is_array($state) ? collect($state)->map(fn ($v, $k) => "$k: $v")->implode(' · ') : $state),
                TextEntry::make('consent')->label('Consent')->formatStateUsing(fn ($state) => $state ? 'Given' : 'No'),
            ]),
            Section::make('Follow-up')->columns(2)->schema([
                Select::make('status')->options(Lead::STATUSES)->required()->native(false),
                Textarea::make('notes')->label('Internal notes')->rows(3),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('created_at')->label('Received')->dateTime('Y-m-d H:i')->sortable(),
            TextColumn::make('name')->searchable()->description(fn (Lead $r) => $r->company),
            TextColumn::make('email')->searchable()->copyable(),
            TextColumn::make('phone')->searchable()->placeholder('—')->toggleable(),
            TextColumn::make('service')->label('Interest')->limit(30)->placeholder('—'),
            TextColumn::make('type')->formatStateUsing(fn ($state) => Lead::TYPES[$state] ?? $state)->badge()
                ->color(fn ($state) => $state === 'medical' ? 'success' : 'gray'),
            TextColumn::make('locale')->label('Lang')->formatStateUsing(fn ($state) => strtoupper((string) $state)),
            TextColumn::make('status')->badge()->formatStateUsing(fn ($state) => Lead::STATUSES[$state] ?? $state)
                ->color(fn ($state) => match ($state) { 'new' => 'warning', 'qualified' => 'success', 'spam' => 'danger', default => 'gray' }),
        ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')->options(Lead::STATUSES),
                SelectFilter::make('type')->options(Lead::TYPES),
                \Filament\Tables\Filters\Filter::make('received')->schema([
                    \Filament\Forms\Components\DatePicker::make('from')->label('Received from'),
                    \Filament\Forms\Components\DatePicker::make('until')->label('Received until'),
                ])->query(fn ($query, array $data) => $query
                    ->when($data['from'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '>=', $d))
                    ->when($data['until'] ?? null, fn ($q, $d) => $q->whereDate('created_at', '<=', $d))),
            ])
            ->headerActions([
                Action::make('export')->label('Export CSV')->icon('heroicon-o-arrow-down-tray')->color('gray')
                    ->action(fn ($livewire) => static::export($livewire->getFilteredTableQuery()->latest()->get())),
            ])
            ->recordActions([
                Action::make('contacted')->label('Contacted')->icon('heroicon-o-phone-arrow-up-right')->color('gray')
                    ->visible(fn (Lead $record) => $record->status === 'new')
                    ->action(fn (Lead $record) => $record->update(['status' => 'contacted'])),
                Action::make('close')->label('Close')->icon('heroicon-o-check-circle')->color('gray')
                    ->visible(fn (Lead $record) => ! in_array($record->status, ['closed', 'spam'], true))
                    ->action(fn (Lead $record) => $record->update(['status' => 'closed'])),
                EditAction::make()->label('Open'),
                DeleteAction::make(),
            ])
            ->toolbarActions([BulkActionGroup::make([
                BulkAction::make('exportSelected')->label('Export selected')->icon('heroicon-o-arrow-down-tray')
                    ->action(fn (Collection $records) => static::export($records)),
                BulkAction::make('markContacted')->label('Mark as contacted')->icon('heroicon-o-check')
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'contacted'])),
                BulkAction::make('markClosed')->label('Mark as closed')->icon('heroicon-o-check-circle')
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'closed'])),
                BulkAction::make('markSpam')->label('Mark as spam')->icon('heroicon-o-no-symbol')->color('danger')
                    ->action(fn (Collection $records) => $records->each->update(['status' => 'spam'])),
                DeleteBulkAction::make(),
            ])]);
    }

    public static function export($records)
    {
        $columns = ['created_at', 'type', 'status', 'name', 'company', 'email', 'phone', 'service', 'message', 'locale', 'page_url'];

        return response()->streamDownload(function () use ($records, $columns) {
            $out = fopen('php://output', 'w');
            fwrite($out, "\xEF\xBB\xBF"); // UTF-8 BOM so Excel shows Arabic correctly
            fputcsv($out, $columns);
            foreach ($records as $r) {
                // Prefix formula-like values to prevent CSV injection in spreadsheet apps.
                fputcsv($out, array_map(fn ($c) => preg_replace('/^([=+\-@\t\r])/', "'$1", (string) $r->{$c}), $columns));
            }
            fclose($out);
        }, 'leads-'.now()->format('Y-m-d').'.csv', ['Content-Type' => 'text/csv; charset=UTF-8']);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLeads::route('/'),
            'edit' => Pages\EditLead::route('/{record}'),
        ];
    }
}
