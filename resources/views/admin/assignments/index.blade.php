@extends('admin.home')

@section('content')

<div class="container">

<h3 align="center" class="mt-5">Assignment of Trucks to Employees</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <div class="form-area">
    <div class="row"> 
    <form action="{{ route('assignments.store') }}" method="POST">
        @csrf
        <div class="col-md-6" style="padding: 15px;">
            <label for="employee_id" style="display: block;">Employee:</label>
            <select name="employee_id" id="employee_id" style="padding: 7px;">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}"  style="padding:10px;">
                        {{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->email }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6" style="padding: 15px;">
            <label for="truck_id" style="display: block;">Truck:</label>
            <select name="truck_id" id="truck_id" style="padding: 7px;">
                @foreach($trucks as $truck)
                    <option value="{{ $truck->id }}">{{ $truck->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <input type="submit" class="btn btn-info" value="Assign">
            </div>
        </div>  
    </form>
    </div>

        <table class="table-area mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee Name</th>
                            <th scope="col">Truck Assigned</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $key => $employee)
                            @foreach ($employee->trucks as $truck)
                                <tr>
                                    <td scope="col">{{ ++$key }}</td>
                                    <td scope="col">{{ $employee->first_name }} {{ $employee->last_name }}</td>
                                    <td scope="col">{{ $truck->name }}</td>
                                    <td scope="col">
                                        <form action="{{ route('assignments.destroy', ['employeeId' => $employee->id, 'truckId' => $truck->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-info btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        @endforeach
                    </tbody>
        </table>
    </div>
    </div>
</div>

@endsection

@push('css')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

        * {
            font-family: "Poppins", sans-serif;
        }

        .form-area {
            padding: 20px;
            margin-top: 20px;
            background-color: white;
            color: #292929; 
        }

        .bi-trash-fill {
            color: red;
            font-size: 18px;
        }

        .bi-pencil {
            color: green;
            font-size: 18px;
            margin-left: 20px;
        }

        .btn.btn-info {
            background-color: #292929;
            color: white;
            padding: 7px;
            border-radius: 0.5rem;
            border-style: hidden;
        }

        .btn.btn-info:hover {
            background-color: grey;
        }
    </style>
@endpush
