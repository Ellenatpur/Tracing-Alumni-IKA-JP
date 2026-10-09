<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlumniResource\Pages;
use App\Models\Alumni;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components as Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
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

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Profil & Data Diri')
                    ->description('Data identitas utama alumni')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Infolists\ImageEntry::make('foto_profil')
                            ->label('Foto Profil')
                            ->circular(),
                        Infolists\TextEntry::make('nama')
                            ->label('Nama Lengkap')
                            ->weight('bold'),
                        Infolists\TextEntry::make('nim')
                            ->label('NIM')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('nisn')
                            ->label('NISN')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('jenis_kelamin')
                            ->label('Jenis Kelamin')
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'L' => 'Laki-laki',
                                'P' => 'Perempuan',
                                default => $state ?? '-',
                            }),
                        Infolists\TextEntry::make('status_verifikasi')
                            ->label('Status Verifikasi')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'approved' => 'success',
                                'pending' => 'warning',
                                'rejected' => 'danger',
                                default => 'gray',
                            }),
                    ])
                    ->columns(2),

                Section::make('Informasi Karir & Pekerjaan')
                    ->description('Data tempat bekerja alumni saat ini (informasi karir / job posting)')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        Infolists\TextEntry::make('status')
                            ->label('Status Saat Ini')
                            ->badge()
                            ->color('info'),
                        Infolists\TextEntry::make('perusahaan_organisasi')
                            ->label('Perusahaan / Tempat Bekerja')
                            ->icon('heroicon-o-building-office-2')
                            ->placeholder('Belum diisi / belum bekerja'),
                        Infolists\TextEntry::make('posisi_jabatan')
                            ->label('Posisi / Jabatan')
                            ->icon('heroicon-o-identification')
                            ->placeholder('Belum diisi'),
                    ])
                    ->columns(3),

                Section::make('Pendidikan & Akademik')
                    ->description('Riwayat program studi dan kelulusan')
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        Infolists\TextEntry::make('jurusan')
                            ->label('Jurusan')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('angkatan')
                            ->label('Angkatan')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('tahun_lulus')
                            ->label('Tahun Lulus')
                            ->placeholder('-'),
                    ])
                    ->columns(3),

                Section::make('Kontak & Domisili')
                    ->description('Informasi komunikasi dan lokasi alumni')
                    ->icon('heroicon-o-envelope')
                    ->schema([
                        Infolists\TextEntry::make('no_hp')
                            ->label('No. Handphone')
                            ->icon('heroicon-o-phone')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('no_telp')
                            ->label('No. Telepon')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('linkedin_url')
                            ->label('URL LinkedIn')
                            ->url(fn ($state) => $state, true)
                            ->icon('heroicon-o-arrow-top-right-on-square')
                            ->placeholder('-'),
                        Infolists\TextEntry::make('alamat')
                            ->label('Alamat Lengkap')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
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
                Tables\Columns\TextColumn::make('perusahaan_organisasi')
                    ->label('Tempat Bekerja')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('posisi_jabatan')
                    ->label('Posisi / Jabatan')
                    ->searchable()
                    ->toggleable(),
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
            ->recordUrl(fn (Alumni $record): string => Pages\ViewAlumni::getUrl([$record]))
            ->filters([
                Tables\Filters\SelectFilter::make('status_verifikasi')
                    ->options([
                        'pending' => 'Pending',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                ViewAction::make(),
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
            'view' => Pages\ViewAlumni::route('/{record}'),
            'edit' => Pages\EditAlumni::route('/{record}/edit'),
        ];
    }
}