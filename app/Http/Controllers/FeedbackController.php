<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
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
