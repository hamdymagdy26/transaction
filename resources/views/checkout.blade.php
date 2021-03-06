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
					<h2 class="heading-section">Checkout Page</h2> 
                    <form method="POST" action="{{ route('logoutFront') }}">
                        @csrf

                        <x-jet-dropdown-link href="{{ route('logoutFront') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="event.preventDefault(); this.closest('form').submit();">
                            Sign Out
                        </x-jet-dropdown-link>
                    </form>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-6">
					<div class="login-wrap p-0">
		      	        <h3 class="mb-4 text-center">Kindly Provide Information!</h3>
                        @if ($errors->any())
							<div class="alert alert-danger" style="font-size:13px !important">
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
                        <form action="{{route('storeTransaction')}}" method="post" class="signin-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control" name="to">
                                        <option disabled selected>-- Select User --</option>
                                        @foreach($users as $user)
                                        <option style="color:black" value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="number" name="card_number" class="form-control" placeholder="Card Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="number" name="amount" class="form-control" placeholder="Amount" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="password-field" type="string" name="holder_name" class="form-control" placeholder="Card Holder Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input id="password-field" type="date" name="expiry_date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control" required>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Pay Now</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <a href="{{route('myTransaction')}}" style="padding-top: 11px; background: #9bd3a0 !important; border: 1px solid #9bd3a0 !important;"
                                 class="form-control btn btn-primary submit px-3">My Transaction</a>
                            </div>
                        </div>

                        </div>
                        </form>
		            </div>
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

