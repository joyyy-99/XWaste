<?php

namespace App\Http\Controllers;

use App\Models\GarbageBinRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Household;

class GarbageBinRequestController extends Controller
{
    public function index()
    {
        $garbageBinRequests = GarbageBinRequest::all();
        return view('garbage_bin_requests.index', compact('garbageBinRequests'));
    }

    public function create()
    {
        // Assuming authenticated user and relationship to household
        $user = auth()->user();
        $defaultAddress = optional($user->household)->location; // Adjust 'address' to your actual field name

        // Log the fetched default address
        Log::info('Fetched default address: ' . $defaultAddress);

        return view('garbage_bin_requests.create', [
            'defaultAddress' => $defaultAddress,
        ]);
    }

    public function store(Request $request)
    {
    
        // Validate the request
        $validatedData = $request->validate([
            'delivery_address' => 'required|string|max:255',
            'organic_waste' => 'sometimes|boolean',
            'recyclable_waste' => 'sometimes|boolean',
            'non_recyclable_waste' => 'sometimes|boolean',
        ]);

        // Create a new garbage bin request
        GarbageBinRequest::create([
            'user_id' => auth()->user()->id,
            'delivery_address' => $validatedData['delivery_address'],
            'organic_waste' => $request->has('organic_waste'),
            'recyclable_waste' => $request->has('recyclable_waste'),
            'non_recyclable_waste' => $request->has('non_recyclable_waste'),
        ]);

        return redirect()->back()->with('success', 'Garbage bin request submitted successfully!');
    }
}
