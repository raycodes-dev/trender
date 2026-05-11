<?php

namespace App\Filament\Resources\OurWorks\Pages;

use App\Filament\Resources\OurWorks\OurWorkResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOurWork extends ViewRecord
{
    protected static string $resource = OurWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
