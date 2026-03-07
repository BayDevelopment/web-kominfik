<?php

namespace App\Filament\Resources\Members\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class MemberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('intake_year')
                        ->required(),
                    TextInput::make('team_id')
                        ->required()
                        ->numeric(),
                    TextInput::make('position_id')
                        ->required()
                        ->numeric(),
                    Toggle::make('is_active')
                        ->required(),
                ])->columnSpanFull()
            ]);
    }
}
