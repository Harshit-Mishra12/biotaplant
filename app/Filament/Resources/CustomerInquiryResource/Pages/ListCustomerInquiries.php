<?php

namespace App\Filament\Resources\CustomerInquiryResource\Pages;

use App\Filament\Resources\CustomerInquiryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomerInquiries extends ListRecords
{
    protected static string $resource = CustomerInquiryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
