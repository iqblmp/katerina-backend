<?php

namespace App\Filament\Resources\CateringPackageResource\Pages;

use App\Filament\Resources\CateringPackageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCateringPackage extends EditRecord
{
    protected static string $resource = CateringPackageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
