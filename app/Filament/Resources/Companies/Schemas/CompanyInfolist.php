<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CompanyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                ImageEntry::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->columnSpanFull(),
                TextEntry::make('name')
                    ->label('Name'),
                TextEntry::make('email')
                    ->label('Email'),
                TextEntry::make('whatsapp_number')
                    ->label('WhatsApp Number'),
                TextEntry::make('tax_rate')
                    ->label('PPN')
                    ->suffix('%'),
                TextEntry::make('nib')
                    ->label('NIB'),
                TextEntry::make('address')
                    ->label('Address')
                    ->columnSpanFull(),
                TextEntry::make('description')
                    ->label('Description')
                    ->columnSpanFull(),
                IconEntry::make('active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->columns(2);
    }
}
