<?php

namespace App\Filament\Resources\Layanans\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class LayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'nama')->searchable()->preload()
                    ->required(),
                TextInput::make('icon')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('lingkup')
                    ->required(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
