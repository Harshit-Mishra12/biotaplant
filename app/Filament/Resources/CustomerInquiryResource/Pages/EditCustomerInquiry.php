<?php

namespace App\Filament\Resources\CustomerInquiryResource\Pages;

use App\Filament\Resources\CustomerInquiryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerInquiry extends EditRecord
{
    protected static string $resource = CustomerInquiryResource::class;

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
        return 'View Customer Inquiry';
    }
}
