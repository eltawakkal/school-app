<?php

namespace App\Filament\Resources\DataVisitorResource\Pages;

use App\Filament\Resources\DataVisitorResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageDataVisitors extends ManageRecords
{
    protected static string $resource = DataVisitorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
