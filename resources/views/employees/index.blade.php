@extends('admin.home')

@section('content')

<div class="container">

<h3 align="center" class="mt-5">Employee Registration</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <div class="form-area">

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="row">
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">First Name:</label>
                            <input type="text" name="first_name" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Last Name:</label>
                            <input type="text" name="last_name" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Phone Number:</label>
                            <input type="text" name="phone" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Email Address:</label>
                            <input type="text" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-info" value="Register">
                        </div>
                    </div>
    </form>

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Email Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $employee)
                <tr>
                    <td scope="col">{{ ++$key }}</td>
                    <td scope="col">{{ $employee->first_name }}</td>
                    <td scope="col">{{ $employee->last_name }}</td>
                    <td scope="col">{{ $employee->phone }}</td>
                    <td scope="col">{{ $employee->email }}</td>
                    <td scope="col">
                        <a href="{{ route('employees.edit', $employee->id) }}">
                        <button class="btn btn-info btn-sm" style="margin-bottom: 5px;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                        </button>
                        </a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
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