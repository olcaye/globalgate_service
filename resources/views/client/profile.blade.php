{{ Auth()->guard('client')->user()->name }}

<a href="{{ route('client.logout') }}">Logout</a>
