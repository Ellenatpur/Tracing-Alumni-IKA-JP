<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Notifications\Notification;

class AlumniResource extends Resource
{
    protected static ?string $model = Alumni::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Alumni';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Kolom Opsional (Allow NULL)
                Forms\Components\TextInput::make('nim')
                    ->label('NIM')
                    ->maxLength(255),

                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->maxLength(255),

                // Kolom Wajib (NOT NULL)
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Lengkap')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('angkatan')
                    ->label('Angkatan')
                    ->required()
                    ->maxLength(4),

                Forms\Components\TextInput::make('tahun_lulus')
                    ->label('Tahun Lulus')
                    ->required()
                    ->maxLength(4),

                Forms\Components\TextInput::make('status')
                    ->label('Status Saat Ini (Misal: Bekerja/Kuliah)')
                    ->required()
                    ->maxLength(255),

                // Kolom Opsional Lainnya
                Forms\Components\TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->maxLength(255),

                Forms\Components\TextInput::make('no_hp')
                    ->label('No. HP')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('no_telp')
                    ->label('No. Telp')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('perusahaan_organisasi')
                    ->label('Perusahaan / Tempat Bekerja')
                    ->maxLength(255),

                Forms\Components\TextInput::make('posisi_jabatan')
                    ->label('Posisi / Jabatan')
                    ->maxLength(255),

                Forms\Components\TextInput::make('linkedin_url')
                    ->label('URL LinkedIn')
                    ->url()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('foto_profil')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('alumni-photos'),

                Forms\Components\Textarea::make('alamat')
                    ->label('Alamat')
                    ->columnSpanFull(),

                Forms\Components\Select::make('status_verifikasi')
                    ->label('Status Verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved (Terverifikasi)',
                        'rejected' => 'Rejected (Ditolak)',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto_profil')->circular(),
                Tables\Columns\TextColumn::make('nim')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('jurusan')->searchable(),
                Tables\Columns\TextColumn::make('angkatan')->sortable(),
                Tables\Columns\TextColumn::make('tahun_lulus')->sortable(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('status_verifikasi')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved' => 'success',
                        'pending' => 'warning',
                        'rejected' => 'danger',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status_verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Action::make('approve')
                    ->label('Verifikasi')
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->hidden(fn (Alumni $record) => $record->status_verifikasi === 'approved')
                    ->action(function (Alumni $record) {
                        $record->update(['status_verifikasi' => 'approved']);
                        Notification::make()
                            ->title('Alumni Berhasil Diverifikasi')
                            ->success()
                            ->send();
                    }),
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
            'index' => Pages\ListAlumnis::route('/'),
            'create' => Pages\CreateAlumni::route('/create'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}