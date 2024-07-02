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
        $employees = Employee::all();
        $trucks = Truck::all();
        return view('admin.assignments.index', compact('employees', 'trucks'));
    }

    public function store(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        $employee->trucks()->syncWithoutDetaching($request->truck_id);
        return redirect()->back()->with('success', 'Truck assigned to employee successfully.');
    }

    public function destroy($id)
    {
        $assignment = EmployeeTruck::findOrFail($id); 
        $assignment->delete();

        return redirect()->back()->with('success', 'Truck unassigned from employee successfully.');
    }
}
