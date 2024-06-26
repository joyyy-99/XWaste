<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;

class TruckController extends Controller
{
    protected $truck;

    public function __construct(){
        $this->truck = new Truck();
    }

    public function index()
    {
        $trucks = $this->truck->all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'registration_number' => 'required|unique:trucks',
        ]);

        $truck = $this->truck->create($request->all());

        return redirect()->route('trucks.index')->with('success', 'Truck created successfully.');
    }

    public function show($id)
    {
        $truck = $this->truck->findOrFail($id);
        return view('trucks.show', compact('truck'));
    }

    public function edit($id)
    {
        $truck = $this->truck->findOrFail($id);
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, $id)
    {
        $truck = $this->truck->findOrFail($id);
        $truck->update($request->all());

        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully.');
    }

    public function destroy($id)
    {
        $truck = $this->truck->findOrFail($id);
        $truck->delete();

        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully.');
    }
}

