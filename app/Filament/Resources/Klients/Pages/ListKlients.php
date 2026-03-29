<?php

namespace App\Filament\Resources\Klients\Pages;

use App\Filament\Resources\Klients\KlientResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKlients extends ListRecords
{
    protected static string $resource = KlientResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
