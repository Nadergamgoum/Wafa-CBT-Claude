<?php

namespace App\Filament\Resources\Users;

use App\Filament\Concerns\SuperAdminOnly;
use App\Models\User;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Password as PasswordBroker;
use Illuminate\Validation\Rules\Password;
use UnitEnum;

class UserResource extends Resource
{
    use SuperAdminOnly;

    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|UnitEnum|null $navigationGroup = 'Administration';

    protected static ?string $navigationLabel = 'Admin users';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make()->columns(2)->schema([
                TextInput::make('name')->required()->maxLength(120),
                TextInput::make('username')->required()->alphaDash()->minLength(3)->maxLength(60)->unique(ignoreRecord: true),
                TextInput::make('email')->email()->required()->maxLength(190)->unique(ignoreRecord: true),
                Select::make('role')->options(User::ROLES)->required()->native(false)->default(User::ROLE_EDITOR)
                    ->helperText('Super Admin: full access. Editor: content only (no users, settings or redirects).')
                    ->disabled(fn (?User $record) => $record && $record->is(auth()->user())),
                TextInput::make('password')->password()->revealable()
                    ->rule(Password::defaults())
                    ->required(fn (string $operation) => $operation === 'create')
                    ->dehydrated(fn ($state) => filled($state))
                    ->helperText(fn (string $operation) => $operation === 'edit' ? 'Leave empty to keep the current password. Setting a new one signs the user out everywhere.' : null),
                Toggle::make('is_active')->label('Active (can sign in)')->default(true)
                    ->disabled(fn (?User $record) => $record && $record->is(auth()->user())),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->description(fn (User $r) => '@'.$r->username),
            TextColumn::make('email')->searchable(),
            TextColumn::make('role')->badge()->formatStateUsing(fn ($state) => User::ROLES[$state] ?? $state)
                ->color(fn ($state) => $state === User::ROLE_SUPER_ADMIN ? 'warning' : 'gray'),
            IconColumn::make('is_active')->label('Active')->boolean(),
            TextColumn::make('last_login_at')->label('Last sign-in')->since()->placeholder('Never'),
        ])->recordActions([
            Action::make('reset')->label('Send reset link')->icon('heroicon-o-envelope')->color('gray')->requiresConfirmation()
                ->action(function (User $r) {
                    $status = PasswordBroker::broker(config('filament.auth.passwords', 'users'))->sendResetLink(['email' => $r->email]);
                    Notification::make()->title(__($status))->{$status === PasswordBroker::RESET_LINK_SENT ? 'success' : 'warning'}()->send();
                }),
            Action::make('logout')->label('Sign out everywhere')->icon('heroicon-o-arrow-right-start-on-rectangle')->color('gray')->requiresConfirmation()
                ->hidden(fn (User $r) => $r->is(auth()->user()))
                ->action(function (User $r) {
                    $n = $r->invalidateSessions();
                    Notification::make()->success()->title("Ended {$n} session(s).")->send();
                }),
            EditAction::make(),
            DeleteAction::make()->hidden(fn (User $r) => $r->is(auth()->user())),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
