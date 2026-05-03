<?php

namespace App\Filament\Resources\BankAccounts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BankAccountsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bank_name')
                    ->label('Bank Name')
                    ->searchable(),
                TextColumn::make('account_number')
                    ->label('Account Number')
                    ->searchable(),
                TextColumn::make('account_holder_name')
                    ->label('Account Holder Name')
                    ->searchable(),
                IconColumn::make('active')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('createdBy.name')
                    ->label('Created By & When')
                    ->badge()
                    ->description(fn ($record) => $record->created_at?->format('d M Y'))
                    ->sortable(),
                TextColumn::make('updatedBy.name')
                    ->label('Updated By & When')
                    ->badge()
                    ->description(fn ($record) => $record->updated_at?->format('d M Y'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deletedBy.name')
                    ->label('Deleted By & When')
                    ->badge()
                    ->description(fn ($record) => $record->deleted_at?->format('d M Y'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
