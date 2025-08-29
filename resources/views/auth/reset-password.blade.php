<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>تغییر رمز عبور</title>
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
		<h5>تغییر رمز عبور</h5>
		<form action="{{route('password.update')}}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{$request->token}}">
            <div class="form-group">
                <input type="text" class="form-control text-left" placeholder="ایمیل" dir="ltr" name="email" value="{{$request->email}}" autofocus>
            </div>
			<div class="form-group">
				<input name="password" type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr">
			</div>
            <div class="form-group">
                <input name="password_confirmation" type="password" class="form-control text-left" placeholder="رمز عبور" dir="ltr">
            </div>
			<button type="submit" class="btn btn-primary btn-block">تغییر رمز عبور</button>
			<hr>
			<p class="text-muted">حساب کاربری دارید؟</p>
			<a href="{{route('login')}}" class="btn btn-outline-light btn-sm">وارد شوید!</a>
		</form>
	</div>
	<script src="{{url('panel/vendors/bundle.js')}}"></script>
	<script src="{{url('panel/assets/js/app.js')}}"></script>
</body>
</html>
