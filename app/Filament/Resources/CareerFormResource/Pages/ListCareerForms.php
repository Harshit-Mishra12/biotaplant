<?php

namespace App\Filament\Resources\CareerFormResource\Pages;

use App\Filament\Resources\CareerFormResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCareerForms extends ListRecords
{
    protected static string $resource = CareerFormResource::class;
    protected static ?string $title = 'Career Submissions';

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
