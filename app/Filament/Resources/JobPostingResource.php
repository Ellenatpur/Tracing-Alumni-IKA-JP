<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobPostingResource\Pages;
use App\Models\JobPosting;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components as Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class JobPostingResource extends Resource
{
    protected static ?string $model = JobPosting::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-briefcase';

    protected static \UnitEnum|string|null $navigationGroup = 'Karir & Proyek';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('judul_posisi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_perusahaan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipe')
                    ->options([
                        'Pekerjaan' => 'Pekerjaan',
                        'Proyek Kolaborasi' => 'Proyek Kolaborasi',
                        'Magang' => 'Magang',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('lokasi'),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('link_pendaftaran')
                    ->url()
                    ->placeholder('https://...'),
                Forms\Components\Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Lowongan & Perusahaan')
                    ->description('Detail posisi lowongan dan instansi pemberi kerja')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        Infolists\TextEntry::make('judul_posisi')
                            ->label('Posisi / Jabatan')
                            ->weight('bold'),
                        Infolists\TextEntry::make('nama_perusahaan')
                            ->label('Nama Perusahaan')
                            ->icon('heroicon-o-building-office-2'),
                        Infolists\TextEntry::make('tipe')
                            ->label('Tipe Lowongan')
                            ->badge(),
                        Infolists\TextEntry::make('lokasi')
                            ->label('Lokasi')
                            ->icon('heroicon-o-map-pin')
                            ->placeholder('Indonesia / Remote'),
                        Infolists\IconEntry::make('is_active')
                            ->label('Status Aktif')
                            ->boolean(),
                        Infolists\TextEntry::make('created_at')
                            ->label('Tanggal Diposting')
                            ->dateTime(),
                    ])
                    ->columns(2),

                Section::make('Deskripsi & Kualifikasi Lowongan')
                    ->description('Rincian tanggung jawab dan persyaratan pelamar')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Infolists\TextEntry::make('deskripsi')
                            ->label('Deskripsi Pekerjaan')
                            ->columnSpanFull(),
                    ]),

                Section::make('Pendaftaran / Lamaran')
                    ->description('Tautan eksternal untuk mengirim lamaran')
                    ->icon('heroicon-o-link')
                    ->schema([
                        Infolists\TextEntry::make('link_pendaftaran')
                            ->label('Link Pendaftaran')
                            ->url(fn ($state) => $state, true)
                            ->icon('heroicon-o-arrow-top-right-on-square')
                            ->placeholder('Tidak ada link eksternal'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul_posisi')->searchable(),
                Tables\Columns\TextColumn::make('nama_perusahaan')->searchable(),
                Tables\Columns\TextColumn::make('tipe')->badge(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->recordUrl(fn (JobPosting $record): string => Pages\ViewJobPosting::getUrl([$record]))
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobPostings::route('/'),
            'create' => Pages\CreateJobPosting::route('/create'),
            'view' => Pages\ViewJobPosting::route('/{record}'),
            'edit' => Pages\EditJobPosting::route('/{record}/edit'),
        ];
    }
}