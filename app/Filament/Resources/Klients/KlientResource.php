<?php

namespace App\Filament\Resources\Klients;

use App\Filament\Resources\Klients\Pages\CreateKlient;
use App\Filament\Resources\Klients\Pages\EditKlient;
use App\Filament\Resources\Klients\Pages\ListKlients;
use App\Filament\Resources\Klients\Schemas\KlientForm;
use App\Filament\Resources\Klients\Tables\KlientsTable;
use App\Models\Klient;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KlientResource extends Resource
{
    protected static ?string $model = Klient::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Klient';
    protected static ?string $modelLabel = 'Klient';
    protected static ?string $pluralModelLabel = 'Klient';
    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return KlientForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KlientsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListKlients::route('/'),
            'create' => CreateKlient::route('/create'),
            'edit' => EditKlient::route('/{record}/edit'),
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
