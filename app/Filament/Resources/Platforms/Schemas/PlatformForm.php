<?php

namespace App\Filament\Resources\Platforms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
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
                FileUpload::make('logo')
                    ->label('Logo')
                    ->image()
                    ->required()
                    ->directory('platform/logo'),
                TextInput::make('no_whatsapp')
                    ->label('No Whatsapp')
                    ->required()
                    ->maxLength(18),
                TextInput::make('email')
                    ->label('Email')
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
                Toggle::make('active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->inline(false),
            ]);
    }
}
