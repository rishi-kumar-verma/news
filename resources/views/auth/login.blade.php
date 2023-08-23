@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <!--begin::Main-->
<div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-0">
    <div class="col-12 text-center">
        <a href="/" class="image mb-7 mb-sm-10">
            <img alt="Logo" src="{{ getSettingValue()['logo'] }}" height="85px" width="85px" >
        </a>
    </div>
    <div class="width-540">
        @if(\Illuminate\Support\Facades\Session::has('status'))
            <p class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('status') }}</p>
        @endif
        @include('flash::message')
        @include('layouts.errors')
    </div>
    <div class="bg-theme-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
        <h1 class="text-center mb-7">{{ __('auth.sign_in') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-sm-7 mb-4">
                <label for="formInputEmail" class="form-label">
                    {{ __('messages.mails.email_address') }}:<span class="required"></span>
                </label>
                <input class="form-control" id="formInputEmail" aria-describedby="emailHelp" value="{{ old('email') }}"
                       type="email" placeholder="{{ __('messages.mails.email_address') }}" name="email" required autocomplete="off" autofocus>
            </div>
            <div class="mb-sm-7 mb-4 position-relative">
                <div class="d-flex justify-content-between">
                    <label for="formInputPassword" class="form-label">{{ __('auth.password') }}:<span class="required"></span></label>
                    <a href="{{ route('password.request') }}" class="link-info fs-6 text-decoration-none">
                        {{ __('Forgot your password?') }}
                    </a>    
                </div>
                <input type="password" class="form-control" id="formInputPassword"
                       placeholder="{{ __('auth.password') }}" name="password" required autocomplete="off">
                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 mt-7 me-4 input-icon input-password-hide  cursor-pointer change-type">
                       <i class="fas fa-eye-slash"></i>
                 </span>
            </div>
            <div class="mb-sm-7 mb-4 form-check">
                <input type="checkbox" class="form-check-input" id="formCheck">
                <label class="form-check-label" for="formCheck">{{ __('auth.remember_me') }}</label>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            </div>
        </form>
    </div>
</div>
    <!--end::Main-->
@endsection

