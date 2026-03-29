<?php

namespace App\Filament\Resources\PortofolioTools;

use App\Filament\Resources\PortofolioTools\Pages\CreatePortofolioTools;
use App\Filament\Resources\PortofolioTools\Pages\EditPortofolioTools;
use App\Filament\Resources\PortofolioTools\Pages\ListPortofolioTools;
use App\Filament\Resources\PortofolioTools\Schemas\PortofolioToolsForm;
use App\Filament\Resources\PortofolioTools\Tables\PortofolioToolsTable;
use App\Models\PortofolioTools;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortofolioToolsResource extends Resource
{
    protected static ?string $model = PortofolioTools::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return PortofolioToolsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortofolioToolsTable::configure($table);
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
            'index' => ListPortofolioTools::route('/'),
            'create' => CreatePortofolioTools::route('/create'),
            'edit' => EditPortofolioTools::route('/{record}/edit'),
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
