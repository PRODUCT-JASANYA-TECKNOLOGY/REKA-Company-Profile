<?php

namespace App\Filament\Resources\PortofolioTools\Pages;

use App\Filament\Resources\PortofolioTools\PortofolioToolsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPortofolioTools extends ListRecords
{
    protected static string $resource = PortofolioToolsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
