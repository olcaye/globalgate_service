@extends('admin.layouts.app')

@section('title', 'Reset Your Password')
@section('guest-content')
    <div class="app-auth-sign-in app-auth-background">

    </div>
    @include('admin.errors.toast')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif
    <div class="app-auth-container">
        <div class="logo">
            <a href="{{ route('login') }}">Global Gate</a>
        </div>
        <p class="auth-description">Enter your email address. Then, you will get an email which contains password reset link.</p>

        <form role="form" class="text-start" method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="auth-credentials m-b-xxl">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control m-b-md @error('password') is-invalid @enderror" >
                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
                @enderror
            </div>

            <div class="auth-credentials m-b-xxl">


                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control m-b-md @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong> </span>
                @enderror
                <input type="hidden" name="token" value="{{ $token }}">
                <input type="hidden" name="email" value="{{ $email }}">
            </div>

            <div class="auth-submit">
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
        </form>
    </div>

@endsection
