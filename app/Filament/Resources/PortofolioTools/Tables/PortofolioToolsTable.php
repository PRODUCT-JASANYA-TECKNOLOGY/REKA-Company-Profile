<?php

namespace App\Filament\Resources\PortofolioTools\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PortofolioToolsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('portofolio.nama')->label('Portofolio')
                    ->searchable(),
                TextColumn::make('tools.nama')->label('Tools')
                    ->searchable(),
                TextColumn::make('status_id')
                    ->numeric()
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
