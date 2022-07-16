@extends('admin.layouts.app')

@section('guest-content')
<div class="app-error">
    <div class="app-error-info">
        <h5 class="text-capitalize">The registration has been completed.</h5>
        <span>Your account is in the approval process. You will be notified by e-mail when your account is approved.<br><br>

You will not be able to log into your account during this period.

              </span>
      {{--  <a href="index.html" class="btn btn-dark">Go to dashboard</a>--}}
    </div>
    <div class="app-error-background"></div>
</div>
@endsection

@section('footer-scripts')
@endsection
