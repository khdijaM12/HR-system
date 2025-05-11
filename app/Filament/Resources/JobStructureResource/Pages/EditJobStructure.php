<?php

namespace App\Filament\Resources\JobStructureResource\Pages;

use App\Filament\Resources\JobStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJobStructure extends EditRecord
{
    protected static string $resource = JobStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
