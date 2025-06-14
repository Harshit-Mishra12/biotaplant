<?php

namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Models\ContactUs;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function ContactUsForm(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'email'        => 'required|email',
            'phone_number' => 'required|string|max:15',
            'message'      => 'required|string|max:1000',
            'state'        => 'required|string|max:100',
            'district'     => 'required|string|max:100',
        ]);

        $contact = ContactUs::create($validated);

        return response()->json([
            'error' => false,
            'message' => 'Contact form submitted successfully.',
            'data' => $contact
        ], 201);
    }
}
