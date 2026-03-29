<?php

namespace App\Filament\Resources\Platforms\Schemas;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PlatformForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required()
                    ->maxLength(128),
                TextInput::make('logo')
                    ->required()
                    ->maxLength(255),
                TextInput::make('no_whatsapp')
                    ->required()
                    ->maxLength(18),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(64),
                Textarea::make('alamat')
                    ->required()
                    ->columnSpanFull(),
                KeyValue::make('sosial_media')
                    ->required()
                    ->columnSpanFull(),
                TagsInput::make('sertifikat')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('status_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
