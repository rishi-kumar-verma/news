<!DOCTYPE html>
@php
    $settings = App\Models\Setting::pluck('value','key')->toArray();
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | {{ $settings['application_name'] }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ $settings['favicon'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    @if(!Auth::user()->dark_mode)
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
        <link href="{{ mix('assets/css/full-screen.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('front_web/css/custom.css') }}">
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.dark.css') }}">
        <link rel="stylesheet" type="text/css" href="{{asset('front_web/css/flatpicker-dark.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('front_web/css/custom-dark.css') }}">
    @endif
    

    <!-- CSS Libraries -->
    @yield('page_css')
    @yield('css')
    @livewireStyles
</head>
@php $styleCss='style' @endphp
<body class="">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid">
        @include('layouts.sidebar')
        <div class="wrapper d-flex flex-column flex-row-fluid">
            <div class='container-fluid d-flex align-items-stretch justify-content-between px-0'>
                @include('layouts.header')
            </div>
            <div class="content d-flex flex-column flex-column-fluid pt-7">
                @yield('header_toolbar')
                <div class='d-flex flex-wrap flex-column-fluid'> 
                    @yield('content') 
                </div>
            </div>
            <div class='container-fluid'>
                @include('layouts.footer')
            </div>
        </div>
    </div>
</div>
@include('profile.changePassword')
<script src="{{ asset('assets/js/third-party.js') }}"></script>
<script src="{{ asset('messages.js') }}"></script>
<script src="{{ mix('assets/js/custom/helpers.js') }}"></script>
<script src="{{ asset('assets/js/users/user-profile.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
<script src="{{ mix('assets/js/side_bar_menu_search/side_bar_menu_search.js') }}"></script>
<script src="{{ mix('assets/js/fullscreen/fullscreen.js') }}"></script>
@routes
@livewireScripts
<script>
    $(document).ready(function () {
        $('.alert').delay(5000).slideUp(300);
    });
    let changePasswordUrl = "{{ route('user.changePassword') }}";
    let tinymce_textarea_coler = "{{ Auth::user()->dark_mode ?  "body { background: #13151F; color: white;}" : "" }}"
    let lang = "{{ Auth::user()->language }}";
</script>
@yield('page_js')
@yield('scripts')
</body>
</html>
