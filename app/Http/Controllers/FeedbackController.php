<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    public function index()
    {
        // Fetch all feedback records
        $feedback = Feedback::all();
        Log::info($feedback);
        // Return view with feedback data
        return view('feedback.index', compact('feedback'));
    }

    public function create()
    {
        return view('feedback.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Feedback::create([
            'email' => $request->email,
            'message' => $request->message,
            'feedback_date' => now(),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }
}
