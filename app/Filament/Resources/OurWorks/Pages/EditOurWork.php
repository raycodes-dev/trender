<?php

namespace App\Filament\Resources\OurWorks\Pages;

use App\Filament\Resources\OurWorks\OurWorkResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditOurWork extends EditRecord
{
    protected static string $resource = OurWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
