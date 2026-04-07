<?php

namespace App\Filament\Resources\PartnerShips\Pages;

use App\Filament\Resources\PartnerShips\PartnerShipResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPartnerShips extends ListRecords
{
    protected static string $resource = PartnerShipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Partnership')
                ->icon('heroicon-o-plus'),
        ];
    }
}
