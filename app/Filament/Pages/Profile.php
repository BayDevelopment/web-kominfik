<?php

namespace App\Filament\Pages\Auth;

use Filament\Actions\Action;
use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Notifications\Notification;

class EditProfile extends BaseEditProfile
{
    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan')
            ->icon('heroicon-o-check');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Kembali')
            ->icon('heroicon-o-arrow-left');
    }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Berhasil')
            ->body('Sandi berhasil diubah.')
            ->success();
    }
    protected function getRedirectUrl(): string
    {
        return url('/myadmin');
    }
}
