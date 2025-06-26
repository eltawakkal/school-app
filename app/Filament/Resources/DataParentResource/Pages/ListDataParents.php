<?php

namespace App\Filament\Resources\DataParentResource\Pages;

use App\Filament\Resources\DataParentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataParents extends ListRecords
{
    protected static string $resource = DataParentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
