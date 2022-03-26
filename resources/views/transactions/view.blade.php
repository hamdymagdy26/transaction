@extends('app')

@section('content')

<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transactions as $transaction)
        <tr>
        <th scope="row">{{$transaction->id}}</th>
        <td>{{$transaction->sentFrom->name}}</td>
        <td>{{$transaction->receivedTo->name}}</td>
        <td>{{$transaction->amount}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection