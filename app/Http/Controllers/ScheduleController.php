<?php
namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pickup_date' => 'required|date',
        ]);

        // Fetch the household ID for the logged-in user
        $householdId = auth()->user()->household->id;

        // Create a new schedule
        Schedule::create([
            'household_id' => $householdId,
            'pickup_date' => $request->pickup_date,
        ]);

        return redirect()->back()->with('success', 'Schedule created successfully!');
    }

}
