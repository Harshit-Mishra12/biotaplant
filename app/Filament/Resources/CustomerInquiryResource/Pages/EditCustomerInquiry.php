<?php

namespace App\Filament\Resources\CustomerInquiryResource\Pages;

use App\Filament\Resources\CustomerInquiryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomerInquiry extends EditRecord
{
    protected static string $resource = CustomerInquiryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
