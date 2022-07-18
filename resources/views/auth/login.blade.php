@extends('admin.layouts.app')

@section('title', 'Login')
@section('guest-content')
    <div class="app-auth-sign-in app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="{{ route('login') }}">Global Gate</a>
        </div>
        <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
        <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control m-b-md @error('email') is-invalid @enderror" id="signInEmail" aria-describedby="signInEmail" placeholder="example@hotmail.com" value="{{ Request::old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
                @enderror

                <label for="signInPassword" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">
                @error('password')
                <span class="invalid-feedback" role="alert"> <strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Sign In</button>
                <a href="{{ route('password.request') }}" class="auth-forgot-password float-end">Forgot password?</a>
            </div>
        </form>
        <div class="mt-5">
            <a href="{{ route('agency.login') }}" class="auth-forgot-password float-start">Login as Agency <i class="ps-2 fa fa-long-arrow-right"></i></a>
        </div>
    </div>

@endsection
