<?php

namespace App\Filament\Resources\StructureLevelResource\Pages;

use App\Filament\Resources\StructureLevelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStructureLevels extends ListRecords
{
    protected static string $resource = StructureLevelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
