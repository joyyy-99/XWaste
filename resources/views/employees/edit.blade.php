@extends('admin.home')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Employee Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('employees.update', $employee->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                         <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">First Name:</label>
                            <input type="text" name="first_name" value="{{ $employee->first_name }}" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Last Name:</label>
                            <input type="text" name="last_name" value="{{ $employee->last_name }}" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Phone Number:</label>
                            <input type="text" name="phone" value="{{ $employee->phone }}" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Email Address:</label>
                            <input type="text" name="email" value="{{ $employee->email }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>

                    </div>
                </form>
            </div>

            </div>
        </div>
    </div>

@endsection


@push('css')
    <style>
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
        .btn.btn-primary {
            background-color: #292929;
            color: white;
            padding: 7px;
            border-radius: 0.5rem;
            border-style: hidden;
        }

        .btn.btn-primary:hover {
            background-color: grey;
        }

        .or-container {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .or-line {
            flex: 1;
            height: 1px;
            background-color: gray;
        }

        .or-text {
            padding: 0 10px;
            color: black;
        }
    </style>
@endpush