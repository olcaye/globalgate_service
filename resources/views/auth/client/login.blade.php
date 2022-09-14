@extends('admin.layouts.app')

@section('title', 'Client Login')

@section('guest-content')
    <div class="app-auth-sign-in app-auth-background">

    </div>
    <div class="app-auth-container">
        <div class="logo">
            <a href="{{ route('client.login.form') }}">Global Gate - Client</a>
        </div>
        <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="{{ route('client.register') }}">Sign Up</a></p>
        @if($errors->any())
            <div class="alert alert-custom alert-indicator-bottom indicator-danger" role="alert" style="margin-bottom: 30px;">
                <div class="alert-content">
                    <span class="alert-title">Wait!</span>
                    @foreach ($errors->all() as $error)
                    <span class="alert-text"> {{ $error }} </span>
                    @endforeach
                </div>
            </div>
        @endif
        <form role="form" class="text-start" method="POST" action="{{ route('client.login.post') }}">
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
              {{--  <a href="{{ route('agency.password.request') }}" class="auth-forgot-password float-end">Forgot password?</a>--}}
            </div>
        </form>

    </div>

@endsection
