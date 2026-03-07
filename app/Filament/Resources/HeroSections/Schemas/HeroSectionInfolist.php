<?php

namespace App\Filament\Resources\HeroSections\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HeroSectionInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('sub_title')
                    ->columnSpanFull(),
                TextEntry::make('vision')
                    ->columnSpanFull(),
                TextEntry::make('total_activity'),
                TextEntry::make('total_event'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
