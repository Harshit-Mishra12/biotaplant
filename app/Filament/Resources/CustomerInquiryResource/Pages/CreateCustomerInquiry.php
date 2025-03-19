<?php

namespace App\Filament\Resources\CustomerInquiryResource\Pages;

use App\Filament\Resources\CustomerInquiryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomerInquiry extends CreateRecord
{
    protected static string $resource = CustomerInquiryResource::class;
}
