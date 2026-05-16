<?php

namespace App\Filament\Resources\Penawarans;

use App\Filament\Resources\Penawarans\Pages\CreatePenawaran;
use App\Filament\Resources\Penawarans\Pages\EditPenawaran;
use App\Filament\Resources\Penawarans\Pages\ListPenawarans;
use App\Filament\Resources\Penawarans\Schemas\PenawaranForm;
use App\Filament\Resources\Penawarans\Tables\PenawaransTable;
use App\Models\Penawaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenawaranResource extends Resource
{
    protected static ?string $model = Penawaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;
    protected static string|\UnitEnum|null $navigationGroup = 'Dokumen';
    protected static ?string $navigationLabel = 'Penawaran';
    protected static ?string $modelLabel = 'Penawaran';
    protected static ?string $pluralModelLabel = 'Penawaran';
    protected static ?string $recordTitleAttribute = 'nomor_penawaran';

    public static function form(Schema $schema): Schema
    {
        return PenawaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PenawaransTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPenawarans::route('/'),
            'create' => CreatePenawaran::route('/create'),
            'edit' => EditPenawaran::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
