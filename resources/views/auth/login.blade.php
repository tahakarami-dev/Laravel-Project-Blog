<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>ورود</title>
	<link rel="shortcut icon" href="{{url('panel/assets/media/image/favicon.png')}}">
	<meta name="theme-color" content="#5867dd">
	<link rel="stylesheet" href="{{url('panel/vendors/bundle.css')}}" type="text/css">
	<link rel="stylesheet" href="{{url('panel/assets/css/app.css')}}" type="text/css">
</head>
<body class="form-membership">
	<div class="page-loader">
		<div class="spinner-border"></div>
	</div>
	<div class="form-wrapper">
		<div class="logo">
			<img src="{{url('panel/assets/media/image/logo-sm.png')}}" alt="image">
		</div>
        @include('admin.layouts.partials.errors')
		<h5>ورود</h5>
		<form action="{{route('login')}}" method="post">
            @csrf
			<div class="form-group">
				<input name="email" type="text" class="form-control text-left" placeholder="ایمیل" dir="ltr" autofocus>
			</div>
			<div class="form-group">
				<input name="password" type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr">
			</div>
			<div class="form-group d-sm-flex justify-content-between text-left mb-4">
				<div class="custom-control custom-checkbox">
					<input name="remember" type="checkbox" class="custom-control-input" checked id="customCheck1">
					<label class="custom-control-label" for="customCheck1">به خاطر سپاری</label>
				</div>
				<a class="d-block mt-2 mt-sm-0" href="{{route('password.request')}}">بازنشانی رمز عبور</a>
			</div>
			<button type="submit" class="btn btn-primary btn-block">ورود</button>
			<hr>
			<p class="text-muted">حسابی ندارید؟</p>
			<a href="{{route('register')}}" class="btn btn-outline-light btn-sm">هم اکنون ثبت نام کنید!</a>
		</form>
	</div>
	<script src="{{url('panel/vendors/bundle.js')}}"></script>
	<script src="{{url('panel/assets/js/app.js')}}"></script>
</body>

</html>
