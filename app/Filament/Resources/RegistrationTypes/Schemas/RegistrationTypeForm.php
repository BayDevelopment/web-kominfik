<?php

namespace App\Filament\Resources\RegistrationTypes\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Section;
use Illuminate\Support\Str;
use Filament\Support\Icons\Heroicon;

class RegistrationTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Pengaturan Pendaftaran')
                    ->description('Kelola jenis pendaftaran, status, dan periode aktif.')
                    ->icon(Heroicon::OutlinedClipboardDocumentList) // 🔥 icon modern
                    ->schema([

                        TextInput::make('name')
                            ->label('Nama Pendaftaran')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(
                                fn($state, callable $set) =>
                                $set('slug', Str::slug($state))
                            )
                            ->maxLength(255),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->disabled() // ❌ tidak bisa diubah di UI
                            ->dehydrated() // ✅ tetap dikirim ke server
                            ->maxLength(255)
                            ->helperText('Slug dibuat otomatis dari nama'),

                        Toggle::make('is_open')
                            ->label('Status Dibuka')
                            ->default(true)
                            ->helperText('Aktifkan jika pendaftaran dibuka'),

                        DateTimePicker::make('start_date')
                            ->label('Tanggal Mulai')
                            ->seconds(false)
                            ->nullable(),

                        DateTimePicker::make('end_date')
                            ->label('Tanggal Berakhir')
                            ->seconds(false)
                            ->nullable(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->nullable(),

                    ])
                    ->columns(2),
            ]);
    }
}
