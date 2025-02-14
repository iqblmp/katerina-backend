<?php

namespace App\Filament\Resources\CateringTestimonialResource\Pages;

use App\Filament\Resources\CateringTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCateringTestimonial extends EditRecord
{
    protected static string $resource = CateringTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
