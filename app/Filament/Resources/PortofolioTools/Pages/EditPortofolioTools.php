<?php

namespace App\Filament\Resources\PortofolioTools\Pages;

use App\Filament\Resources\PortofolioTools\PortofolioToolsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPortofolioTools extends EditRecord
{
    protected static string $resource = PortofolioToolsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
