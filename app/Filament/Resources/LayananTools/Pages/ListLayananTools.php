<?php

namespace App\Filament\Resources\LayananTools\Pages;

use App\Filament\Resources\LayananTools\LayananToolsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLayananTools extends ListRecords
{
    protected static string $resource = LayananToolsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
