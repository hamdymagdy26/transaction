<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col">Amount</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    @if($transactions->count()>0)
        @foreach ($transactions as $k => $transaction)
            <tr>
                <td>{{ $k+1 }}</td>
                <td>{{ $transaction->sentFrom->name }}</td>
                <td>{{ $transaction->receivedTo->name }}</td>
                <td>{{ floatval($transaction->amount) }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format("Y-m-d h:i A") }}</td>
                <td>
                    @if ($transaction->status == 1)
                    <label class="label label-success">Successful</label>
                    @else
                    <label class="label label-danger">Failed</label>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td class="center" colspan="9">
                {{trans('app.no-result-found')}}
            </td>
        </tr>
    @endif
    </tbody>
</table>
