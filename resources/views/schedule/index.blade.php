@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Scheduled Pickups</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Household ID</th>
                <th scope="col">Pickup Date</th>
                <th scope="col">Schedule Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->household_ID }}</td>
                    <td scope="col">{{ $item->pickup_date }}</td>
                    <td scope="col">{{ $item->schedule_status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
