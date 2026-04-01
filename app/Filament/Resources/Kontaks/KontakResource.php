<?php

namespace App\Filament\Resources\Kontaks;

use App\Filament\Resources\Kontaks\Pages\CreateKontak;
use App\Filament\Resources\Kontaks\Pages\EditKontak;
use App\Filament\Resources\Kontaks\Pages\ListKontaks;
use App\Filament\Resources\Kontaks\Schemas\KontakForm;
use App\Filament\Resources\Kontaks\Tables\KontaksTable;
use App\Models\Kontak;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Kontak';
    protected static ?string $modelLabel = 'Kontak';
    protected static ?string $pluralModelLabel = 'Kontak';

    protected static ?string $recordTitleAttribute = 'nama';

    public static function form(Schema $schema): Schema
    {
        return KontakForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KontaksTable::configure($table);
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
            'index' => ListKontaks::route('/'),
            'create' => CreateKontak::route('/create'),
            'edit' => EditKontak::route('/{record}/edit'),
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
