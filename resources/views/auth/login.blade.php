<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/auth/style.css') }}">
    @routes
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post" action="{{ route('login') }}">
                    @csrf
					<div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Enter Phone" id="phone_no" name="phone_no" value="{{ old('phone_no') ?? '9123456789' }}">
                        <div class="input-group-append">
							<span class="input-group-text btn btn-sm btn-primary text-dark generateOtp">Generate OTP</span>
						</div>
					</div>
                    <div class="phone_no_message mb-4">
                        @error('phone_no')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

					<div class="input-group form-group">
						<input type="text" class="form-control" placeholder="Enter OTP" name="otp" value="{{ old('otp') }}">
					</div>
                    <div class="otp_message mb-4">
                        @error('otp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links pb-2">
					Don't have an account?<a href="{{ route('register') }}">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
@include('auth.script')
</body>
</html>
