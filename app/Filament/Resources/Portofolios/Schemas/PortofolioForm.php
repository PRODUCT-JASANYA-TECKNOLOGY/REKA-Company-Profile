<?php

namespace App\Filament\Resources\Portofolios\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PortofolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('klient_id')
                    ->label('Klient')
                    ->relationship('klient', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->disk('public')
                    ->directory('portofolio/thumbnail')
                    ->required(),
                FileUpload::make('foto')
                    ->label('Foto Tambahan')
                    ->image()
                    ->disk('public')
                    ->directory('portofolio/foto')
                    ->multiple()
                    ->columnSpanFull(),
                DatePicker::make('tanggal_proyek')
                    ->required(),
                Toggle::make('active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->inline(false),
            ]);
    }
}
