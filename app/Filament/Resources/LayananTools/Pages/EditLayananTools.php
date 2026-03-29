<?php

namespace App\Filament\Resources\LayananTools\Pages;

use App\Filament\Resources\LayananTools\LayananToolsResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditLayananTools extends EditRecord
{
    protected static string $resource = LayananToolsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
