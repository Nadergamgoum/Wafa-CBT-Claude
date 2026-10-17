<?php

namespace App\Filament\Concerns;

/** Restricts a Filament resource or page to Super Admins. */
trait SuperAdminOnly
{
    public static function canAccess(): bool
    {
        return (bool) auth()->user()?->isSuperAdmin();
    }
}
