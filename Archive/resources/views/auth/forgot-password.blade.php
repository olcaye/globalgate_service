@extends('admin.layouts.app')

@section('title', 'Reset Your Password')
@section('guest-content')
    <div class="app-auth-sign-in app-auth-background">

    </div>
    @include('admin.errors.toast')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="app-auth-container">
        <div class="logo">
            <a href="{{ route('login') }}">Global Gate</a>
        </div>
        <p class="auth-description">Enter your email address. Then, you will get an email which contains password reset link.</p>

        <form role="form" class="text-start" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="signInEmail" class="form-label">Email address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary"> {{ __('Send Password Reset Link') }}</button>
            </div>
        </form>
    </div>

@endsection
