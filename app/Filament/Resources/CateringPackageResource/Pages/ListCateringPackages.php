<?php

namespace App\Filament\Resources\CateringPackageResource\Pages;

use App\Filament\Resources\CateringPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCateringPackages extends ListRecords
{
    protected static string $resource = CateringPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
