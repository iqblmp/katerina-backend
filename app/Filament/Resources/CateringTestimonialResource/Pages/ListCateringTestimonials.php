<?php

namespace App\Filament\Resources\CateringTestimonialResource\Pages;

use App\Filament\Resources\CateringTestimonialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCateringTestimonials extends ListRecords
{
    protected static string $resource = CateringTestimonialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
