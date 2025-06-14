<?php

namespace App\Http\Controllers\V1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CustomerInquiry;
use App\Models\Product;
use App\Models\SubscriptionDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Log;

class CustomerEnquiryController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validation
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'product_name'         => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required|string|max:15',
            'message'      => 'required|string|max:1000',
            'state'        => 'required|string|max:100',
            'district'     => 'required|string|max:100',
        ]);

        // 🔎 Check if the entry already exists
        // $existingEnquiry = CustomerInquiry::where('email', $request->email)->first();

        // if ($existingEnquiry) {
        //     return response()->json([
        //         'status_code' => 2,
        //         'message'     => 'An inquiry with this email already exists.'
        //     ]); // 409 Conflict for duplicate data
        // }

        // ✅ Store data
        $enquiry = CustomerInquiry::create([
            'name'         => $request->name,
            'product_name'         => $request->product_name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'message'      => $request->message,
            'state'        => $request->state,
            'district'     => $request->district,
            'status'       => 'incomplete' // Default status
        ]);

        // ✅ Success response
        return response()->json([
            'status_code' => 1,
            'message'     => 'Customer enquiry submitted successfully!',
            'data'        => $enquiry
        ]);
    }
}
