<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Truck;
use App\Models\EmployeeTruck;

use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function index()
    {
        $assignments = EmployeeTruck::with('employee', 'truck')->get();
        $employees = Employee::all();
        $trucks = Truck::all();
        return view('admin.assignments.index', compact('assignments', 'employees', 'trucks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'truck_id' => 'required|exists:trucks,id',
        ]);

        EmployeeTruck::create([
            'employee_id' => $request->employee_id,
            'truck_id' => $request->truck_id,
        ]);
        
        return redirect()->back()->with('success', 'Truck assigned to employee successfully.');
    }

    public function destroy($id)
    {
        $assignment = EmployeeTruck::findOrFail($id); 
        $assignment->delete();

        return redirect()->back()->with('success', 'Truck unassigned from employee successfully.');
    }
}
