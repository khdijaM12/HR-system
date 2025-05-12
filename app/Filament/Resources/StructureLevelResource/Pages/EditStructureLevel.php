<?php

namespace App\Filament\Resources\StructureLevelResource\Pages;

use App\Filament\Resources\StructureLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStructureLevel extends EditRecord
{
    protected static string $resource = StructureLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
