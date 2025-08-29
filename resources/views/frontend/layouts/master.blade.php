<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}" type="text/css">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <title>مقالات کدیاد</title>
</head>
<body>
@include('frontend.layouts.partials.header')
@yield('content')
<footer class="bg-white py-4 text-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="d-flex justify-content-center social-bx">
                    <li class="p-2 m-1"><a href="#"><i class="bi bi-instagram"></i></a></li>
                    <li class="p-2 m-1"><a href="#"><i class="bi bi-twitter"></i></a></li>
                    <li class="p-2 m-1"><a href="#"><i class="bi bi-facebook"></i></a></li>
                </ul>
            </div>
            <div class="col-12">
                <p>مقالات کدیاد</p>
                <p class="mb-0">&copy; حقوق انتشار برای مجموعه محفوظ است</p>
            </div>
        </div>
    </div>
</footer>
<div class="scroll_top">
         <span class="btn btn-info text-center text-light">
         <i class="bi bi-arrow-up"></i>
         </span>
</div>
<script src="{{url('frontend/js/jQuery.js')}}"></script>
<script src="{{url('frontend/js/popper.js')}}"></script>
<script src="{{url('frontend/js/bootstrap.js')}}"></script>
<script src="{{url('frontend/js/owl.carousel.js')}}"></script>
<script src="{{url('frontend/js/index.js')}}"></script>
<script src="{{url('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
@stack('scripts')
</body>
</html>
