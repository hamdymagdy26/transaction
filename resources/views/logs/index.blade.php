@extends('app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        @if ($logs->count() > 0)
        @foreach($logs as $log)
            <div class="alrt alert-success log">
                {{$log->sentFrom->name}} Transfered {{$log->amount}} To {{$log->receivedTo->name}} Account
            </div>
        @endforeach
        @else
        <h3 class="text-center">No Logs Found!</h3>
        @endif
    </div>
</div>
@endsection