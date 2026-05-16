<?php

namespace App\Filament\Resources\Penawarans\Tables;

use App\Models\Penawaran;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PenawaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_penawaran')
                    ->label('Nomor Penawaran')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('klient.nama')
                    ->label('Klient')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal_pembuatan')
                    ->date('d M Y')
                    ->sortable(),
                TextColumn::make('tanggal_jatuh_tempo')
                    ->date('d M Y')
                    ->sortable(),
                IconColumn::make('is_ppn')
                    ->label('PPN')
                    ->boolean(),
                TextColumn::make('total_tagihan')
                    ->label('Total Tagihan')
                    ->formatStateUsing(fn ($state): string => 'Rp '.number_format((float) $state, 0, ',', '.'))
                    ->sortable(),
                TextColumn::make('createdBy.name')
                    ->label('Created By & When')
                    ->badge()
                    ->description(fn (Penawaran $record): ?string => $record->created_at?->format('d M Y'))
                    ->sortable(),
                TextColumn::make('updatedBy.name')
                    ->label('Updated By & When')
                    ->badge()
                    ->description(fn (Penawaran $record): ?string => $record->updated_at?->format('d M Y'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deletedBy.name')
                    ->label('Deleted By & When')
                    ->badge()
                    ->description(fn (Penawaran $record): ?string => $record->deleted_at?->format('d M Y'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('generatePdf')
                    ->label('Generate PDF')
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('gray')
                    ->visible(fn (Penawaran $record): bool => $record->deleted_at === null)
                    ->url(fn (Penawaran $record): string => route('penawaran.pdf', $record)),
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
