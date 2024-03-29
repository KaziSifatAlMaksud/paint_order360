<?php

namespace App\Http\Controllers;

use App\Models\PushSubscription;
use Illuminate\Http\Request;

class PushSubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'endpoint' => 'required|max:500',
            'public_key' => 'required',
            'auth_token' => 'required',
            'content_encoding' => 'nullable',
        ]);

        $subscription = PushSubscription::create($validatedData);

        return response()->json(['success' => true, 'id' => $subscription->id], 201);
    }
}
