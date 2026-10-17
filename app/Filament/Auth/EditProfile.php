<?php

namespace App\Filament\Auth;

use Filament\Actions\Action;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use SensitiveParameter;

/**
 * Profile: name, username, email and password. Changing the password signs the
 * user out of every other session (database session driver).
 */
class EditProfile extends BaseEditProfile
{
    public static function isSimple(): bool
    {
        return false;
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            $this->getNameFormComponent(),
            TextInput::make('username')->label('Username')->required()->alphaDash()->minLength(3)->maxLength(60)
                ->unique(ignoreRecord: true),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
            $this->getCurrentPasswordFormComponent(),
        ]);
    }

    protected function handleRecordUpdate(Model $record, #[SensitiveParameter] array $data): Model
    {
        $record = parent::handleRecordUpdate($record, $data);
        if (array_key_exists('password', $data)) {
            $record->invalidateSessions(request()->hasSession() ? request()->session()->getId() : null);
        }

        return $record;
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('logoutOtherSessions')
                ->label('Sign out other sessions')
                ->icon('heroicon-o-arrow-right-start-on-rectangle')
                ->color('gray')
                ->requiresConfirmation()
                ->modalDescription('All other browsers and devices signed in to your account will be signed out.')
                ->action(function () {
                    $count = $this->getUser()->invalidateSessions(request()->session()->getId());
                    Notification::make()->success()->title('Signed out of '.$count.' other session(s).')->send();
                }),
        ];
    }
}
