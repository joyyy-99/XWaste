<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule; // Make sure to import your Schedule model

class ScheduleController extends Controller
{
    public function index()
    {
        // Retrieve schedules from the database
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedule.create');
    }


    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'pickup_date' => 'required|date', // Example validation rule for pickup date
            // Add more validation rules as needed
        ]);

        // Create a new Schedule instance
        $schedule = new Schedule();
        $schedule->pickup_date = $request->pickup_date;
        // Add other fields as needed

        // Save the schedule to the database
        $schedule->save();

        // Optionally, you can return a success message or redirect to a different page
        return redirect()->route('schedule.create')->with('success', 'Pickup scheduled successfully!');
    }
}
