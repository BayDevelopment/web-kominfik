<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HeroSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make([
                    TextInput::make('title')
                        ->required(),
                    Textarea::make('sub_title')
                        ->required()
                        ->columnSpanFull(),
                    Textarea::make('vision')
                        ->required()
                        ->columnSpanFull(),
                    TextInput::make('total_activity')
                        ->required(),
                    TextInput::make('total_event')
                        ->required(),
                ])->columnSpanFull()
            ]);
    }
}
