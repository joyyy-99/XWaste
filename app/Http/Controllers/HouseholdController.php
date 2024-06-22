<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;

class HouseholdController extends Controller
{
    public function create()
    {
        return view('household.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'subscription_status' => 'boolean',
        ]);

        Household::create([
            'user_id' => auth()->id(), // Assuming user is logged in
            'location' => $request->location,
            'subscription_status' => $request->has('subscription_status'),
        ]);

        return redirect()->back()->with('success', 'Household registered successfully.');
    }
}
