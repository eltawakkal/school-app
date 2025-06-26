<?php

namespace App\Filament\Resources\DataItemBuildingResource\Pages;

use App\Filament\Resources\DataItemBuildingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDataItemBuildings extends ManageRecords
{
    protected static string $resource = DataItemBuildingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
