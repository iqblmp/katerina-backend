<?php

namespace App\Filament\Resources\KitchenResource\Pages;

use App\Filament\Resources\KitchenResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKitchen extends EditRecord
{
    protected static string $resource = KitchenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
