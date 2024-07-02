@extends('admin.home')

@section('content')

<div class="container">
<h3 align="center" class="mt-5">User Feedback</h3>
<div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $item)
                <tr>
                    <td scope="col">{{ $loop->iteration }}</td>
                    <td scope="col">{{ $item->email }}</td>
                    <td scope="col">{{ $item->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
