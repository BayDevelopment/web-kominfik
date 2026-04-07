<?php

namespace App\Filament\Resources\RegistrationTypes\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\TernaryFilter;

class RegistrationTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('slug')
                    ->label('Slug')
                    ->copyable()
                    ->copyMessage('Slug disalin!')
                    ->color('gray'),

                BadgeColumn::make('is_open')
                    ->label('Status')
                    ->formatStateUsing(fn($state) => $state ? 'Dibuka' : 'Ditutup')
                    ->colors([
                        'success' => fn($state) => $state,
                        'danger' => fn($state) => !$state,
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => fn($state) => $state,
                        'heroicon-o-x-circle' => fn($state) => !$state,
                    ]),

                TextColumn::make('start_date')
                    ->label('Mulai')
                    ->dateTime('d M Y')
                    ->placeholder('-'),

                TextColumn::make('end_date')
                    ->label('Berakhir')
                    ->dateTime('d M Y')
                    ->placeholder('-'),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since()
                    ->color('gray'),

            ])

            ->filters([

                TernaryFilter::make('is_open')
                    ->label('Status')
                    ->trueLabel('Dibuka')
                    ->falseLabel('Ditutup'),

            ])
            ->recordActions([
                ActionGroup::make([

                    EditAction::make()
                        ->label('Edit')
                        ->icon('heroicon-o-pencil-square'),

                    DeleteAction::make()
                        ->label('Hapus')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->modalHeading('Hapus Data')
                        ->modalDescription('Apakah kamu yakin ingin menghapus data ini?')
                        ->modalSubmitActionLabel('Ya, Hapus')
                        ->successNotificationTitle('Data berhasil dihapus'),

                ])
                    ->label('Aksi')
                    ->icon('heroicon-m-ellipsis-vertical') // 🔥 icon titik tiga modern
                    ->button(), // jadi button, bukan link
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
