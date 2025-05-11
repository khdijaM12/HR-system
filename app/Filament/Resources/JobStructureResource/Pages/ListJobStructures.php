<?php

namespace App\Filament\Resources\JobStructureResource\Pages;

use App\Filament\Resources\JobStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobStructures extends ListRecords
{
    protected static string $resource = JobStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
