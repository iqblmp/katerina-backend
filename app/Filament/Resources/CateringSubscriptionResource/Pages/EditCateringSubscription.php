<?php

namespace App\Filament\Resources\CateringSubscriptionResource\Pages;

use App\Filament\Resources\CateringSubscriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCateringSubscription extends EditRecord
{
    protected static string $resource = CateringSubscriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
