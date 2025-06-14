<?php

namespace App\Filament\Resources\CareerFormResource\Pages;

use App\Filament\Resources\CareerFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCareerForm extends EditRecord
{
    protected static string $resource = CareerFormResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
