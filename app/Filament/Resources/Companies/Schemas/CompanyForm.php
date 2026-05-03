<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('logo')
                    ->label('Logo')
                    ->maxLength(65535),
                TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                TextInput::make('whatsapp_number')
                    ->label('WhatsApp Number')
                    ->maxLength(32),
                TextInput::make('tax_rate')
                    ->label('PPN')
                    ->numeric()
                    ->suffix('%'),
                TextInput::make('nib')
                    ->label('NIB')
                    ->numeric(),
                Textarea::make('address')
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->inline(false),
            ]);
    }
}
