<!doctype html>
<html lang="en">
  <head>
  	<title>Transaction</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('login/css/style.css')}}">
	@toastr_css
	</head>
	<body class="img js-fullheight" style="background-image: url({{url('login/images/bg.jpg')}})">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Don't Have Account?</h3>
		      	<form action="{{route('front.register')}}" method="post" class="signin-form">
                @csrf
		      		<div class="form-group">
		      			<input type="text" name="name" class="form-control" placeholder="Username" required>
		      		</div>

                    <div class="form-group">
		      			<input type="email" name="email" class="form-control" placeholder="E-mail" required>
		      		</div>

                    <div class="form-group">
                        <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <div class="form-group">
                        <input id="password-field" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" checked>
                                <span class="checkmark"></span>
                            </label>
                        </div>
	                </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Already Have Account ? &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="{{route('loginUser')}}" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Sign In</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('login/js/jquery.min.js')}}"></script>
	<script src="{{asset('login/js/popper.js')}}"></script>
	<script src="{{asset('login/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('login/js/main.js')}}"></script>
    @jquery
    @toastr_js
    @toastr_render
	</body>
</html>

