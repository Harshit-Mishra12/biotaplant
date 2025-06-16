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
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'product_id'   => 'required|exists:products,id',
            'email'        => 'required|email',
            'phone_number' => 'required|string|max:15',
            'message'      => 'nullable|string|max:1000',
            'state'        => 'nullable|string|max:100',
            'district'     => 'nullable|string|max:100',
        ]);

        $enquiry = CustomerInquiry::create([
            'name'         => $request->name,
            'product_id'   => $request->product_id,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'message'      => $request->message,
            'state'        => $request->state,
            'district'     => $request->district,
            'status'       => 'incomplete',
        ]);

        return response()->json([
            'status_code' => 1,
            'message'     => 'Customer enquiry submitted successfully!',
            'data'        => $enquiry
        ]);
    }
}
