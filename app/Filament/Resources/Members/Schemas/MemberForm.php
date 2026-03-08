<?php

namespace App\Filament\Resources\Members\Schemas;

use App\Models\Team;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

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
                    Select::make('team_id')
                        ->relationship('team', 'name')
                        ->required()
                        ->disabled(fn() => Team::count() === 0)
                        ->helperText(function () {
                            if (Team::count() === 0) {
                                return new HtmlString(
                                    '<span class="text-danger-600">Harap isi data Teams terlebih dahulu.</span>'
                                );
                            }

                            return null;
                        }),
                    Toggle::make('is_active')
                        ->required(),
                ])->columnSpanFull()
            ]);
    }
}
