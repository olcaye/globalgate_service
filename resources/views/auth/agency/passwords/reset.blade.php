@extends('admin.layouts.app')
@include('alerts.status')
@section('title',  __('Reset Password') )
@section('guest-content')
    <div class="app-auth-sign-in app-auth-background">
    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="{{ route('login') }}">Global Gate</a>
        </div>
        <p class="auth-description">Enter your email address. Then, you will get an email which contains password reset link.</p>

        <form method="POST" action="{{ route('agency.password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="auth-credentials m-b-xxl">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="auth-credentials m-b-xxl">
                <label for="password_confirmation" class="form-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="auth-credentials m-b-xxl">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">  {{ __('Reset Password') }}</button>
            </div>
        </form>
    </div>

@endsection
