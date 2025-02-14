<?php

namespace App\Filament\Resources\KitchenResource\Pages;

use App\Filament\Resources\KitchenResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKitchens extends ListRecords
{
    protected static string $resource = KitchenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
