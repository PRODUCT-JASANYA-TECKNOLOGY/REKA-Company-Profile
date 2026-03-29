<?php

namespace App\Filament\Resources\LayananTools\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LayananToolsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('layanan_id')
                    ->relationship('layanan', 'nama')->searchable()->preload()
                    ->required(),
                Select::make('tools_id')
                    ->relationship('tools', 'nama')->searchable()->preload()
                    ->required(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
