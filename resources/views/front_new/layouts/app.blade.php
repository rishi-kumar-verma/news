<!DOCTYPE html>
<html lang="en">
@php
    $settings = getSettingValue();
@endphp
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(!empty(getSEOTools()->keyword))
        <meta name="keywords" content="{{getSEOTools()->keyword}}">
    @endif
    @if(!empty(getSEOTools()->site_description))
        <meta name="description" content="{{getSEOTools()->site_description}}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')
        | {{(!empty(getSEOTools()->site_title)) ? getSEOTools()->site_title : $settings['application_name']}} </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings['favicon'] }}">
    <link rel="stylesheet" href="{{ asset('front_web/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/scss/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front_web/css/toastr.css')}}">
    <link href="{{asset('front_web/css/slick.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front_web/css/slick-theme.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front_web/build/scss/layout.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front_web/css/lightbox.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('front_web/build/scss/dark-mode.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('front_web/build/scss/custom.css')}}" rel="stylesheet" type="text/css">
    @yield('pageCss')
    @livewireStyles
</head>
<body>
@include('front_new.layouts.header')
<div>
    @yield('content')
</div>

<!-- start footer section -->
@include('front_new.layouts.footer')
<!-- end footer section -->

<!-- start dark-mode-section -->
<div class="theme-switch-box-wrap">
    <div class="theme-switch-box">
        <span class="theme-status"><i class="fa-solid fa-sun"></i></span>
        <label class="switch-label" for="themeSwitchCheckbox">
            <input class="input" type="checkbox" name="themeSwitchCheckbox" id="themeSwitchCheckbox">
            <span class="switch" onclick="myFunction()"></span>
        </label>
        <span class="theme-status"><i class="fas fa-moon"></i></span>
    </div>
</div>
<!-- end dark-mode-section -->

<script src="{{ asset('assets/js/third-party.js') }}"></script>
<script src="{{asset('front_web/js/swiper.min.js')}}"></script>
<script src="{{ asset('front_web/js/slick.min.js') }}"></script>
<script src="{{ asset('front_web/js/toastr.min.js') }}"></script>
<script src="{{asset('front_web/js/lightbox.js')}}"></script>
<script src="{{ asset('assets/js/lazyload/lazyload.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('assets/js/web/custom.js') }}"></script>
@livewireScripts
@yield('script')
@routes
</body>

</html>
