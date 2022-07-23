<div class="search">
    <form>
        <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
    </form>
    <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
</div>
<div class="app-header">
    <nav class="navbar navbar-light navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-nav" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                    </li>
                </ul>

            </div>
            <div class="d-flex">
                <ul class="navbar-nav">
                  {{--  <li class="nav-item hidden-on-mobile">
                        <a class="nav-link @if (Request::is('dashboard')) {{'active'}} @endif" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link @if (Request::is('staff') || Request::routeIs('staff.detail') ) {{'active'}} @endif" href="{{ route('staff') }}">Staff</a>
                    </li>
                    <li class="nav-item hidden-on-mobile">
                        <a class="nav-link @if (Request::is('events') || Request::routeIs('event.detail')) {{'active'}} @endif"  href="{{ route('events') }}">Events</a>
                    </li>--}}
                </ul>
            </div>
        </div>
    </nav>
</div>
