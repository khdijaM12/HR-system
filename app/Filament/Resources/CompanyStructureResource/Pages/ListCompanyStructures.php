<?php

namespace App\Filament\Resources\CompanyStructureResource\Pages;

use App\Filament\Resources\CompanyStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCompanyStructures extends ListRecords
{
    protected static string $resource = CompanyStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
