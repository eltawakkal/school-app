<?php

namespace App\Filament\Resources\DataParentResource\Pages;

use App\Filament\Resources\DataParentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDataParent extends EditRecord
{
    protected static string $resource = DataParentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
