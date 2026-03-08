<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(12)
                    ->schema([

                        Section::make('Informasi Utama Project')
                            ->description('Isi informasi utama project dengan jelas dan profesional.')
                            ->icon('heroicon-o-briefcase')
                            ->columnSpan(12)
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Project')
                                    ->placeholder('Contoh: Website Profile KOMINFIK')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->maxLength(255)
                                    ->columnSpanFull()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        if (filled($state) && blank($get('slug'))) {
                                            $set('slug', Str::slug($state));
                                        }
                                    }),

                                TextInput::make('slug')
                                    ->label('Slug')
                                    ->helperText('Slug akan digunakan untuk URL project.')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255)
                                    ->columnSpanFull()
                                    ->disabled()
                                    ->dehydrated(),

                                Select::make('category')
                                    ->label('Kategori Project')
                                    ->options([
                                        'Company Profile' => 'Company Profile',
                                        'Academic System' => 'Academic System',
                                        'Information System' => 'Information System',
                                        'Event Platform' => 'Event Platform',
                                        'Portfolio' => 'Portfolio',
                                        'Registration' => 'Registration',
                                        'Web App' => 'Web App',
                                        'Landing Page' => 'Landing Page',
                                        'Dashboard' => 'Dashboard',
                                        'Other' => 'Other',
                                    ])
                                    ->searchable()
                                    ->native(false)
                                    ->placeholder('Pilih kategori'),

                                TextInput::make('sort_order')
                                    ->label('Urutan Tampil')
                                    ->numeric()
                                    ->default(0),

                                TextInput::make('author')
                                    ->label('Dibuat Oleh')
                                    ->placeholder('Contoh: Ahmad Rizky'),

                                TextInput::make('collaborator')
                                    ->label('Kolaborasi Dengan')
                                    ->placeholder('Contoh: Tim KOMINFIK'),

                                Textarea::make('description')
                                    ->label('Deskripsi Project')
                                    ->rows(6)
                                    ->columnSpanFull(),
                            ]),


                        Section::make('Media & Publikasi')
                            ->description('Atur gambar utama dan status publikasi project.')
                            ->icon('heroicon-o-photo')
                            ->columnSpan(12)
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Gambar Project')
                                    ->image()
                                    ->directory('projects')
                                    ->disk('public')
                                    ->imageEditor()
                                    ->panelAspectRatio('16:9'),

                                DateTimePicker::make('uploaded_at')
                                    ->label('Tanggal & Jam Upload')
                                    ->displayFormat('d M Y H:i'),

                                Toggle::make('is_published')
                                    ->label('Publish Project')
                                    ->default(true),
                            ]),


                        Section::make('Link Project')
                            ->description('Tambahkan link demo dan repository project jika tersedia.')
                            ->icon('heroicon-o-link')
                            ->columnSpan(12)
                            ->columns(2)
                            ->schema([
                                TextInput::make('demo_url')
                                    ->label('Link Demo')
                                    ->placeholder('https://demo-project.com')
                                    ->url()
                                    ->prefixIcon('heroicon-o-globe-alt'),

                                TextInput::make('github_url')
                                    ->label('Link GitHub')
                                    ->placeholder('https://github.com/username/project')
                                    ->url()
                                    ->prefixIcon('heroicon-o-code-bracket'),
                            ]),
                    ]),
            ]);
    }
}
