<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login</title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{$error}}</div>
    @endforeach
@endif

<body class="text-center">
<form action="{{ route('agency.register.post') }}" class="form-signin" method="post">
    @csrf
    <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>

    <div class="mb-3">
        <label for="name" class="sr-only">Name</label>
        <input name="name" type="text" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Agency Name" required autofocus>
        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>



    <div class="mb-3">
        <label for="phone" class="sr-only">Email address</label>
        <input name="phone" type="text" id="phone" class="form-control @error('name_phone') is-invalid @enderror" placeholder="Phone" required autofocus>
        @if ($errors->has('phone'))
            <div class="invalid-feedback">
                {{ $errors->first('phone') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="address" class="sr-only">Email address</label>
        <input name="address" type="text" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required autofocus>
        @if ($errors->has('address'))
            <div class="invalid-feedback">
                {{ $errors->first('address') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="email" class="sr-only">Email address</label>
        <input name="email" type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" required autofocus>
        @if ($errors->has('email'))
            <div class="invalid-feedback">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="password" class="sr-only">Password</label>
        <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
        @if ($errors->has('password'))
            <div class="invalid-feedback">
                {{ $errors->first('password') }}
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="sr-only">Confirm Password</label>
        <input name="password_confirmation" type="password" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback">
                {{ $errors->first('password_confirmation') }}
            </div>
        @endif
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
</body>
</html>
