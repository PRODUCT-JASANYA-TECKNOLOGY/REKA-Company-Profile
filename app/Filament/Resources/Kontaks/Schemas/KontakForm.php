<?php

namespace App\Filament\Resources\Kontaks\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KontakForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(128),
                TextInput::make('no_wa')
                    ->label('Nomor WhatsApp')
                    ->tel()
                    ->maxLength(18),
                Textarea::make('deskripsi')
                    ->rows(5)
                    ->columnSpanFull(),
            ]);
    }
}
