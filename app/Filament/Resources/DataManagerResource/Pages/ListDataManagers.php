<?php

namespace App\Filament\Resources\DataManagerResource\Pages;

use App\Filament\Resources\DataManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataManagers extends ListRecords
{
    protected static string $resource = DataManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
