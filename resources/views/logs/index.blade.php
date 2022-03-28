@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @foreach($logs as $log)
            <div class="alrt alert-success log">
                {{$log->sentFrom->name}} Transfered {{$log->amount}} To {{$log->receivedTo->name}} Account
            </div>
        @endforeach
    </div>
</div>
@endsection