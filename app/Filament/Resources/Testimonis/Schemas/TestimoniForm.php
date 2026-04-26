<?php

namespace App\Filament\Resources\Testimonis\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimoniForm
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
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                TextInput::make('jabatan')
                    ->maxLength(128),
                FileUpload::make('foto')
                    ->label('Foto')
                    ->image()
                    ->disk('public')
                    ->directory('testimoni/foto')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->inline(false),
            ]);
    }
}
