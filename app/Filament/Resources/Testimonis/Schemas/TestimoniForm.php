<?php

namespace App\Filament\Resources\Testimonis\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TestimoniForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('klient_id')
                    ->relationship('klient', 'nama')->searchable()->preload()
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('foto')
                    ->required(),
                TextInput::make('jabatan'),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
