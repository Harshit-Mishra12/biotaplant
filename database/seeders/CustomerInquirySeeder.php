<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerInquiry;

class CustomerInquirySeeder extends Seeder
{
    public function run(): void
    {
        CustomerInquiry::create([
            'name' => 'maheep',
            'email' => 'maheep@example.com',
            'phone_number' => '9876789878',
            'message' => 'I would like to place an order.',
            'state' => 'Uttar Pradesh',
            'district' => 'Agra',
            'status' => 'complete',
        ]);
    }
}
