<?php

namespace App\Filament\Resources\PortofolioTools\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PortofolioToolsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('portofolio_id')
                    ->relationship('portofolio', 'nama')->searchable()->preload()
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
