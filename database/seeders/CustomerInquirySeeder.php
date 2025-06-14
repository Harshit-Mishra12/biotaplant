<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerInquiry;
use Carbon\Carbon;

class CustomerInquirySeeder extends Seeder
{
    public function run(): void
    {
        $inquiries = [
            [
                'name' => 'Pallav',
                'email' => 'pallavp@example.com',
                'phone_number' => '9876789878',
                'message' => 'I would like to place an order.',
                'state' => 'Uttar Pradesh',
                'district' => 'Noida',
                'status' => 'complete',
                'created_at' => Carbon::now()->subDays(5), // 5 days ago
            ],
            [
                'name' => 'Rohit',
                'email' => 'rohitk@example.com',
                'phone_number' => '9876543210',
                'message' => 'Need details about bulk orders.',
                'state' => 'Maharashtra',
                'district' => 'Mumbai',
                'status' => 'incomplete',
                'created_at' => Carbon::now()->subDays(3), // 3 days ago
            ],
            [
                'name' => 'Priya',
                'email' => 'priyak@example.com',
                'phone_number' => '9123456789',
                'message' => 'I want to know about product availability.',
                'state' => 'Delhi',
                'district' => 'Central Delhi',
                'status' => 'complete',
                'created_at' => Carbon::now()->subDays(2), // 2 days ago
            ],
            [
                'name' => 'Aman',
                'email' => 'amank@example.com',
                'phone_number' => '9898989898',
                'message' => 'Requesting a product catalog.',
                'state' => 'Karnataka',
                'district' => 'Bangalore',
                'status' => 'incomplete',
                'created_at' => Carbon::now()->subDay(), // 1 day ago
            ],
            [
                'name' => 'Neha',
                'email' => 'nehak@example.com',
                'phone_number' => '9876123456',
                'message' => 'Interested in wholesale pricing.',
                'state' => 'West Bengal',
                'district' => 'Kolkata',
                'status' => 'complete',
                'created_at' => Carbon::now(), // Today
            ],
        ];

        // Insert multiple records
        CustomerInquiry::insert($inquiries);
    }
}
