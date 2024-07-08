<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Household;
use Illuminate\Support\Facades\Log;
class HouseholdController extends Controller
{
    public function index()
    {
        
        $household = Household::all();
        Log::info($household);
        
        return view('household.index', compact('household'));
    }
    public function create()
    {
        return view('household.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
        ]);

        Household::create([
            'user_id' => auth()->id(), // Assuming user is logged in
            'household_name' => $request->household_name,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Household registered successfully.');
    }
}
