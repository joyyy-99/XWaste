@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Households</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Household Name</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($household as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->user_id }}</td>
                    <td scope="col">{{ $item->household_name }}</td>
                    <td scope="col">{{ $item->location }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
