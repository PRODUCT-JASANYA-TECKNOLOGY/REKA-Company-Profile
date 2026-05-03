<?php

namespace App\Filament\Resources\BankAccounts\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BankAccountForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('bank_name')
                    ->label('Bank Name')
                    ->options([
                        'BCA' => 'BCA',
                        'BNI' => 'BNI',
                        'BRI' => 'BRI',
                        'BTN' => 'BTN',
                        'CIMB Niaga' => 'CIMB Niaga',
                        'Danamon' => 'Danamon',
                        'Mandiri' => 'Mandiri',
                        'Maybank' => 'Maybank',
                        'OCBC' => 'OCBC',
                        'Permata Bank' => 'Permata Bank',
                        'SeaBank' => 'SeaBank',
                    ])
                    ->searchable()
                    ->required(),
                TextInput::make('account_number')
                    ->label('Account Number')
                    ->required()
                    ->maxLength(64),
                TextInput::make('account_holder_name')
                    ->label('Account Holder Name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),
                Toggle::make('active')
                    ->label('Active')
                    ->default(true)
                    ->required()
                    ->inline(false),
            ]);
    }
}
