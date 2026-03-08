<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\Size;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Cover')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Nama Project')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),

                TextColumn::make('author')
                    ->label('Author')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('uploaded_at')
                    ->label('Upload')
                    ->dateTime('d M Y H:i')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Publish')
                    ->boolean(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->filters([
                TernaryFilter::make('is_published')
                    ->label('Status Publish'),
            ])
            ->recordActions([
                ActionGroup::make([
                    ViewAction::make()
                        ->label('Lihat')
                        ->icon('heroicon-o-eye'),

                    EditAction::make()
                        ->label('Edit')
                        ->icon('heroicon-o-pencil-square'),

                    DeleteAction::make()
                        ->label('Hapus')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->before(function ($record) {
                            if ($record->image) {
                                \Illuminate\Support\Facades\Storage::disk('public')->delete($record->image);
                            }
                        })
                        ->successNotification(
                            Notification::make()
                                ->title('Berhasil')
                                ->body('Data berhasil dihapus.')
                                ->success()
                        )
                ])
                    ->label('Aksi')
                    ->icon('heroicon-o-ellipsis-horizontal')
                    ->button()
                    ->size(Size::Small),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus Terpilih')
                        ->icon('heroicon-o-trash')
                        ->successNotification(
                            Notification::make()
                                ->title('Berhasil')
                                ->body('Data terpilih berhasil dihapus.')
                                ->success()
                                ->icon('heroicon-o-check-circle')
                        ),
                ]),
            ]);
    }
}
