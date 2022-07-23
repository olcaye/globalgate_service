@extends('admin.layouts.app')

@section('guest-content')
<div class="app-error">
    <div class="app-error-info">
        <h5 class="text-capitalize">Your application has been completed.</h5>
        <span> You will be notified via email. <br><br>

Thank you.<br>
Global Gate

              </span>
        <a href="{{ route('home') }}" class="btn btn-dark">Go Back</a>
      {{--  <a href="index.html" class="btn btn-dark">Go to dashboard</a>--}}
    </div>
    <div class="app-error-background"></div>
</div>
@endsection

@section('footer-scripts')
@endsection
