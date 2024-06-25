<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function create()
    {
        return view('subscription.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        Subscription::create([
            'plan' => $request->input('plan'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('subscription.create')->with('success', 'Subscription created successfully.');
    }
}
