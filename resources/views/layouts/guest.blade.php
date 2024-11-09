<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bytedash - Admin Template') }}</title>

    <!-- favicon -->
    <link rel=icon href="{{ asset('html/favicons.png')}}" sizes="16x16" type="icon/png">
    <!-- animate -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/animate.css')}}">
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/bootstrap.min.css') }}">
    <!-- All Icon -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/icon.css')}}">
    <!-- slick carousel  -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/slick.css')}}">
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/select2.min.css')}}">
    <!-- Sweet alert Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/sweetalert.css')}}">
    <!-- Flatpickr Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/flatpickr.min.css')}}">
    <!-- Country Select Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/niceCountryInput.css')}}">
    <link rel="stylesheet" href="{{ asset('html/assets/css/jsuites.css')}}">
    <!-- Fancy box Css -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/fancybox.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('html/assets/css/dashboard.css')}}">
    <!-- dark css -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

</head>

<body>

<!--login Area start-->
<section class="loginForm">
    <div class="loginForm__flex">
        {{ $slot }}
    </div>
</section>
<!-- login Area end -->


<!-- jquery -->
<script src="{{ asset('html/assets/js/jquery-3.6.4.min.js') }}"></script>
<!-- jquery Migrate -->
<script src="{{ asset('html/assets/js/jquery-migrate-3.4.1.min.js') }}"></script>
<!-- bootstrap -->
<script src="{{ asset('html/assets/js/bootstrap.bundle.min.js') }}"></script>
<!-- Slick Slider -->
<script src=" {{ asset('html/assets/js/slick.js') }} "></script>
<!-- Plugins Js -->
<script src="{{ asset('html/assets/js/plugin.js') }}"></script>
<!-- Country Select Js -->
<script src="{{ asset('html/assets/js/niceCountryInput.js') }}"></script>
<!-- Multiple Country Select Js -->
<script src="{{ asset('html/assets/js/jsuites.js') }}"></script>
<!-- Fancy Box Js -->
<script src="{{ asset('html/assets/js/fancybox.umd.js') }}"></script>
<!-- main js -->
<script src="{{ asset('html/assets/js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    @if(session('status'))
    toastr.success("{{ session('status') }}");
    @endif

    @if(session('failed'))
    toastr.error("{{ session('failed') }}");
    @endif
</script>
</body>
</html>
