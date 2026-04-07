<?php

namespace App\Filament\Resources\PartnerShips\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PartnerShipsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('instansi_nama')
                    ->label('Instansi')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('pic_name')
                    ->label('PIC')
                    ->searchable(),

                TextColumn::make('instansi_email')
                    ->label('Email')
                    ->copyable()
                    ->icon('heroicon-o-envelope'),

                TextColumn::make('instansi_phone')
                    ->label('Telepon')
                    ->copyable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(40)
                    ->tooltip(fn($record) => $record->deskripsi),

                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'approved',
                        'danger' => 'rejected',
                    ])
                    ->label('Status'),

                TextColumn::make('submitted_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->since()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ]),

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
