@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Subscriptions</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Plan</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subscriptions as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->user_id }}</td>
                    <td scope="col">{{ $item->plan }}</td>
                    <td scope="col">{{ $item->start_date }}</td>
                    <td scope="col">{{ $item->end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
