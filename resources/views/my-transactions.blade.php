<!doctype html>
<html lang="en">
  <head>
  	<title>Transaction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('userLogin/css/style.css')}}">
	@toastr_css
	</head>
	<body class="img js-fullheight" style="background-image: url({{url('userLogin/images/bg.jpg')}})">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5" style="margin-bottom: 1rem !important;">
					<h2 class="heading-section">Your Transaction!</h2>
                    <form method="POST" action="{{ route('logoutFront') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logoutFront') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="event.preventDefault(); this.closest('form').submit();">
                            Sign Out
                        </x-jet-dropdown-link>
                    </form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">To</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($transactions->count() > 0)
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->receivedTo->name}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>
                                        @if ($transaction->status == 1)
                                        Successful
                                        @else
                                        Failed
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="center" colspan="3">
                                    No Transactions!
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div style="text-align: center; margin-bottom:10px">
                    {{ $transactions->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                    <a href="{{route('checkout')}}" style="padding-top: 11px;" class="form-control btn btn-primary submit px-3">Checkout Page</a>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('userLogin/js/jquery.min.js')}}"></script>
	<script src="{{asset('userLogin/js/popper.js')}}"></script>
	<script src="{{asset('userLogin/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('userLogin/js/main.js')}}"></script>
    <script>
        $('.my-select').selectpicker();
    </script>
    @jquery
    @toastr_js
    @toastr_render
	</body>
</html>

