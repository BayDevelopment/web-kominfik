<?php

namespace App\Filament\Resources\PartnerShips;

use App\Filament\Resources\PartnerShips\Pages\CreatePartnerShip;
use App\Filament\Resources\PartnerShips\Pages\EditPartnerShip;
use App\Filament\Resources\PartnerShips\Pages\ListPartnerShips;
use App\Filament\Resources\PartnerShips\Schemas\PartnerShipForm;
use App\Filament\Resources\PartnerShips\Tables\PartnerShipsTable;
use App\Models\PartnerShip;
use App\Models\RegistrationTypModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PartnerShipResource extends Resource
{
    protected static ?string $model = PartnerShip::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'instansi_nama';

    // NEW

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static ?string $navigationLabel = 'PartnerShip';

    protected static ?string $modelLabel = 'PartnerShip';

    protected static ?string $pluralModelLabel = 'PartnerShip';

    public static function form(Schema $schema): Schema
    {
        return PartnerShipForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnerShipsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPartnerShips::route('/'),
            'create' => CreatePartnerShip::route('/create'),
            'edit' => EditPartnerShip::route('/{record}/edit'),
        ];
    }
}
