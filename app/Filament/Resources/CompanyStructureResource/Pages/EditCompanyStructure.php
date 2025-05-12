<?php

namespace App\Filament\Resources\CompanyStructureResource\Pages;

use App\Filament\Resources\CompanyStructureResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompanyStructure extends EditRecord
{
    protected static string $resource = CompanyStructureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
