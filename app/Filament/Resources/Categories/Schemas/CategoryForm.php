<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                TextInput::make('type')
                    ->required()
                    ->maxLength(128),
                Textarea::make('deskripsi')
                    ->columnSpanFull(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
