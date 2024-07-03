@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Garbage Bin Requests</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User ID</th>
                <th scope="col">Delivery Address</th>
                <th scope="col">Organic Waste</th>
                <th scope="col">Recyclable Waste</th>
                <th scope="col">Non-Recyclable Waste</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($garbageBinRequests as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->user_id }}</td>
                    <td scope="col">{{ $item->delivery_address }}</td>
                    <td scope="col">{{ $item->organic_waste }}</td>
                    <td scope="col">{{ $item->recyclable_waste }}</td>
                    <td scope="col">{{ $item->non_recyclable_waste }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
