<?php

namespace App\Http\Controllers\V1;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\CareerForm;
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

class CareerFormController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'current_location' => 'required|string|max:255',
            'cv_path' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $cvPath = Helper::saveImageToServer($request->file('cv_path'), '/uploads/cv/');
        if (!$cvPath || !filter_var($cvPath, FILTER_VALIDATE_URL)) {
            return response()->json([
                'error' => true,
                'message' => 'CV upload failed. Please try again.',
            ], 422);
        }

        // Save to DB
        $career = CareerForm::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'current_location' => $validated['current_location'],
            'cv_path' => $cvPath
        ]);

        return response()->json([
            'error' => false,
            'message' => 'Career form submitted successfully.',
            'data' => $career
        ], 201);
    }
}
