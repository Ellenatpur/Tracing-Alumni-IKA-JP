<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar';
    protected static string|\UnitEnum|null $navigationGroup = 'Manajemen Event';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('nama_event')
                    ->label('Nama Event')
                    ->required()
                    ->maxLength(255),

                // Menggunakan tanggal_event sesuai struktur database
                Forms\Components\DateTimePicker::make('tanggal_event')
                    ->label('Tanggal & Waktu Event')
                    ->required(),

                Forms\Components\TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->maxLength(255),

                Forms\Components\FileUpload::make('gambar')
                    ->label('Gambar / Poster Event')
                    ->image()
                    ->directory('event-images'),

                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi Event')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar')->square(),
                Tables\Columns\TextColumn::make('nama_event')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tanggal_event')->dateTime()->sortable(),
                Tables\Columns\TextColumn::make('lokasi')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}