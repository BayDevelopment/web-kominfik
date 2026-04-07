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
                Section::make('Data Member')
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->minLength(3)
                            ->maxLength(255),

                        TextInput::make('intake_year')
                            ->label('Tahun Angkatan')
                            ->numeric()
                            ->required()
                            ->minLength(4)
                            ->maxLength(4)
                            ->placeholder('Contoh: 2024'),

                        Select::make('team_id')
                            ->label('Divisi')
                            ->relationship('team', 'name')
                            ->required()
                            ->disabled(fn() => Team::count() === 0)
                            ->helperText(function () {
                                if (Team::count() === 0) {
                                    return new HtmlString(
                                        '<span class="text-danger-600">Harap isi data divisi terlebih dahulu.</span>'
                                    );
                                }
                                return null;
                            }),

                        TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),

                        TextInput::make('phone')
                            ->label('No WhatsApp')
                            ->tel()
                            ->required()
                            ->minLength(10)
                            ->maxLength(15)
                            ->placeholder('628xxxx'),

                        Toggle::make('is_active')
                            ->label('Status Aktif')
                            ->default(false),

                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
