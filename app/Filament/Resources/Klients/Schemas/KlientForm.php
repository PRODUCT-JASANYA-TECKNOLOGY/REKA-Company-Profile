<?php

namespace App\Filament\Resources\Klients\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KlientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'nama')->searchable()->preload()
                    ->required(),
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                TextInput::make('logo')
                    ->required()
                    ->maxLength(255),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
