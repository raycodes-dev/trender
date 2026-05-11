<?php

namespace App\Filament\Resources\OurWorks\Pages;

use App\Filament\Resources\OurWorks\OurWorkResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOurWorks extends ListRecords
{
    protected static string $resource = OurWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
