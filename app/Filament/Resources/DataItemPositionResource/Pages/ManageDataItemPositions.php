<?php

namespace App\Filament\Resources\DataItemPositionResource\Pages;

use App\Filament\Resources\DataItemPositionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDataItemPositions extends ManageRecords
{
    protected static string $resource = DataItemPositionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
