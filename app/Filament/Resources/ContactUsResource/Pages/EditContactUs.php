<?php

namespace App\Filament\Resources\ContactUsResource\Pages;

use App\Filament\Resources\ContactUsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUs extends EditRecord
{
    protected static string $resource = ContactUsResource::class;

    // protected function getActions(): array
    // {
    //     return [
    //         Actions\DeleteAction::make(),
    //     ];
    // }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // You can customize the data here before it's shown
        return $data;
    }

    protected function getFormActions(): array
    {
        // Hides the "Save" and other form buttons
        return [];
    }

    protected function getTitle(): string
    {
        return 'View Contact Data';
    }
}
