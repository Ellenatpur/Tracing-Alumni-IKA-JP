<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Infolists\Components as Infolists;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\ViewAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-document-text';

    protected static \UnitEnum|string|null $navigationGroup = 'Konten & Kegiatan';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => 
                        $operation === 'create' ? $set('slug', Str::slug($state)) : null
                    ),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(Post::class, 'slug', ignoreRecord: true),
                Forms\Components\Select::make('kategori')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                        'donasi' => 'Donasi',
                        'about' => 'Tentang Kami',
                    ])
                    ->default('berita')
                    ->required(),
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('posts')
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('konten')
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Publikasikan Berita')
                    ->default(true),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Berita & Artikel')
                    ->description('Detail judul, kategori, dan status publikasi')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Infolists\ImageEntry::make('gambar')
                            ->label('Gambar Utama')
                            ->columnSpanFull(),
                        Infolists\TextEntry::make('judul')
                            ->label('Judul Berita')
                            ->weight('bold'),
                        Infolists\TextEntry::make('slug')
                            ->label('Slug URL'),
                        Infolists\TextEntry::make('kategori')
                            ->label('Kategori')
                            ->badge(),
                        Infolists\IconEntry::make('is_published')
                            ->label('Status Publikasi')
                            ->boolean(),
                        Infolists\TextEntry::make('created_at')
                            ->label('Tanggal Publikasi')
                            ->dateTime(),
                    ])
                    ->columns(2),

                Section::make('Isi Konten Berita')
                    ->description('Konten lengkap berita')
                    ->icon('heroicon-o-pencil-square')
                    ->schema([
                        Infolists\TextEntry::make('konten')
                            ->label('Konten Berita')
                            ->html()
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('judul')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kategori')->badge(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Status Publish'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable(),
            ])
            ->recordUrl(fn (Post $record): string => Pages\ViewPost::getUrl([$record]))
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Dipublikasikan'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}