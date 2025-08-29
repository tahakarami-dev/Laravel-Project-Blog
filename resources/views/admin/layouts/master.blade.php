<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>پنل مدیریت وبلاگ</title>
    <link rel="shortcut icon" href="{{url('panel/assets/media/image/favicon.png')}}">
    <meta name="theme-color" content="#5867dd">
    <link rel="stylesheet" href="{{url('panel/vendors/bundle.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{url('panel/vendors/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{url('panel/vendors/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{url('panel/assets/css/app.css')}}" type="text/css">
    <link rel="stylesheet" href="{{url('panel/plugins/sweet_alert/sweetalert2.min.css')}}" type="text/css">
</head>
<body class="small-navigation">
@include('admin.layouts.partials.navigation')
@include('admin.layouts.partials.header')
@yield('content')
<script src="{{url('panel/vendors/bundle.js')}}"></script>
<script src="{{url('panel/vendors/slick/slick.min.js')}}"></script>
<script src="{{url('panel/vendors/select2/js/select2.min.js')}}"></script>
<script src="{{url('panel/assets/js/app.js')}}"></script>
<script src="{{url('panel/plugins/sweet_alert/sweetalert2.all.min.js')}}"></script>
<script src="{{url('panel/plugins/ckeditor/ckeditor.js')}}"></script>
@stack('scripts')
</body>
</html>
