<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>فراموشی رمز عبور</title>
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
		<h5>بازنشانی رمز عبور</h5>
		<form method="post" action="{{route('password.email')}}">
            @csrf
			<div class="form-group">
				<input type="text" class="form-control text-left" placeholder="ایمیل" dir="ltr" name="email" required autofocus>
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
			</div>
			<button type="submit" class="btn btn-primary btn-block">ثبت</button>
			<hr>
			<p class="text-muted">یک عمل دیگر انجام دهید.</p>
			<a href="{{route('register')}}" class="btn btn-sm btn-outline-light mr-1 my-1">هم اکنون ثبت نام کنید!</a>
			یا
			<a href="{{route('login')}}" class="btn btn-sm btn-outline-light ml-1 my-1">وارد شوید!</a>
		</form>
	</div>
	<script src="{{url('panel/vendors/bundle.js')}}"></script>
	<script src="{{url('panel/assets/js/app.js')}}"></script>
</body>

</html>
