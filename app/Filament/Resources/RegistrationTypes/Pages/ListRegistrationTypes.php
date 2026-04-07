<?php

namespace App\Filament\Resources\RegistrationTypes\Pages;

use App\Filament\Resources\RegistrationTypes\RegistrationTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRegistrationTypes extends ListRecords
{
    protected static string $resource = RegistrationTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Type Registration')
                ->icon('heroicon-o-plus'),
        ];
    }
}
