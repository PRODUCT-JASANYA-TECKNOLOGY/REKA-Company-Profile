<?php

namespace App\Filament\Resources\Portofolios\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PortofolioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('klient_id')
                    ->relationship('klient', 'nama')->searchable()->preload()
                    ->required(),
                Select::make('category_id')
                    ->relationship('category', 'nama')->searchable()->preload()
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('thumbnail')
                    ->required(),
                Textarea::make('foto')
                    ->columnSpanFull(),
                DatePicker::make('tanggal_proyek')
                    ->required(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
