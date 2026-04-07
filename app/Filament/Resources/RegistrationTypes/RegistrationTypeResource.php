<?php

namespace App\Filament\Resources\RegistrationTypes;

use App\Filament\Resources\RegistrationTypes\Pages\CreateRegistrationType;
use App\Filament\Resources\RegistrationTypes\Pages\EditRegistrationType;
use App\Filament\Resources\RegistrationTypes\Pages\ListRegistrationTypes;
use App\Filament\Resources\RegistrationTypes\Schemas\RegistrationTypeForm;
use App\Filament\Resources\RegistrationTypes\Tables\RegistrationTypesTable;
use App\Models\RegistrationType;
use App\Models\RegistrationTypModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class RegistrationTypeResource extends Resource
{
    protected static ?string $model = RegistrationTypModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'name';

    // NEW
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected static ?string $navigationLabel = 'Type Registration';

    protected static ?string $modelLabel = 'Type Registration';

    protected static ?string $pluralModelLabel = 'Type Registration';


    public static function form(Schema $schema): Schema
    {
        return RegistrationTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return RegistrationTypesTable::configure($table);
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
            'index' => ListRegistrationTypes::route('/'),
            'create' => CreateRegistrationType::route('/create'),
            'edit' => EditRegistrationType::route('/{record}/edit'),
        ];
    }
}
