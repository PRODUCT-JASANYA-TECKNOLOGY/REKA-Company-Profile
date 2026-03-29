<?php

namespace App\Filament\Resources\LayananTools;

use App\Filament\Resources\LayananTools\Pages\CreateLayananTools;
use App\Filament\Resources\LayananTools\Pages\EditLayananTools;
use App\Filament\Resources\LayananTools\Pages\ListLayananTools;
use App\Filament\Resources\LayananTools\Schemas\LayananToolsForm;
use App\Filament\Resources\LayananTools\Tables\LayananToolsTable;
use App\Models\LayananTools;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LayananToolsResource extends Resource
{
    protected static ?string $model = LayananTools::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return LayananToolsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LayananToolsTable::configure($table);
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
            'index' => ListLayananTools::route('/'),
            'create' => CreateLayananTools::route('/create'),
            'edit' => EditLayananTools::route('/{record}/edit'),
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
