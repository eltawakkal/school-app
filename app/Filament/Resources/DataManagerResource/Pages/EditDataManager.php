<?php

namespace App\Filament\Resources\DataManagerResource\Pages;

use App\Filament\Resources\DataManagerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataManager extends EditRecord
{
    protected static string $resource = DataManagerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
