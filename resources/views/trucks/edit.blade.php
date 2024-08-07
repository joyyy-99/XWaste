@extends('admin.home')

@section('content')

    <div class="container">

        <h3 align="center" class="mt-5">Truck Management</h3>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">

            <div class="form-area">
                <form method="POST" action="{{ route('trucks.update', $truck->id) }}">
                {!! csrf_field() !!}
                  @method("PATCH")
                    <div class="row">
                         <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Name:</label>
                            <input type="text" name="name" value="{{ $truck->name }}" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Model:</label>
                            <input type="text" name="model" value="{{ $truck->model }}" required>
                        </div>
                        <div class="col-md-6" style="padding: 15px;">
                            <label style="display: block;">Reg. Number:</label>
                            <input type="text" name="registration_number" value="{{ $truck->registration_number }}" required>
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