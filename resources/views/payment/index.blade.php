@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">Payments</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Amount</th>
                <th scope="col">Payment Date</th>
                <th scope="col">Method</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->amount }}</td>
                    <td scope="col">{{ $item->paymentDate }}</td>
                    <td scope="col">{{ $item->method }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
