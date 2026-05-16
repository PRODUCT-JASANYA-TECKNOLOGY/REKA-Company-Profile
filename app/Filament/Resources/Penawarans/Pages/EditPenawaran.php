<?php

namespace App\Filament\Resources\Penawarans\Pages;

use App\Filament\Resources\Penawarans\PenawaranResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditPenawaran extends EditRecord
{
    protected static string $resource = PenawaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
