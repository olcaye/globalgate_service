<div class="app-sidebar">
    <div class="logo">
        <div class="sidebar-user-switcher user-activity-online">
            <a href="#">
                <span class="user-info-text text-capitalize">Have a good day, {{ Auth::user()->name }} </span>
            </a>
        </div>
    </div>
    <div class="app-menu">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Customers
            </li>
            <li class="@if (Request::routeIs('agency.application.index') || Request::routeIs('agency.application.form')) {{'active-page'}} @endif">
                <a href=""><i class="material-icons-two-tone">groups</i>Applications<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('agency.application.index') }}" class="@if(Request::routeIs('agency.application.index')) {{'active'}} @endif">Applications</a>
                    </li>
                    <li>
                        <a href="{{ route('agency.application.form') }}" class="@if(Request::routeIs('agency.application.form')) {{'active'}} @endif">
                            New Application</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-title">
                Other
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    Logout</a>
                <form id="logout-form" action="{{ url('/agency/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>

        {{--<ul class="accordion-menu">
            <li class="sidebar-title">
                Personal
            </li>
            --}}
        {{--<li class="@if (Request::is('dashboard')) {{'active-page'}} @endif">
                <a href="{{ route('dashboard') }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
            </li>
            --}}
            {{--
            <li class="@if (Request::is('profile')) {{'active-page'}} @endif">
                <a href="{{ route('profile') }}"><i class="material-icons-two-tone">manage_accounts</i>Profile</a>
            </li>
            @if(Auth::user()->role == 'sla')
            <li class="sidebar-title">
                Staff
            </li>
            <li class="@if (Request::is('staff') || Request::routeIs('staff.detail') || (Request::routeIs('staff.not_active'))) {{'active-page'}} @endif">
                <a href="#"><i class="material-icons-two-tone">groups</i>Staff</a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('staff') }}" class="@if (Request::is('staff') || Request::routeIs('staff.detail')) {{'active'}} @endif">Staff</a>
                    </li>
                    <li>
                        <a href="{{ route('staff.not_active') }}" class="@if(Request::routeIs('staff.not_active')) {{'active'}} @endif">Waiting for Approval</a>
                    </li>
                </ul>
            </li>
            @endif
            @unless(Auth::user()->role == 'admin')
            <li class="sidebar-title">
                Events
            </li>
            <li class="@if (Request::is('events') || Request::routeIs('event.detail')) {{'active-page'}} @endif">
                <a href="{{ route('events') }}"><i class="material-icons-two-tone">groups</i>Events</a>
            </li>
            @endunless


            @if(Auth::user()->role == 'admin')
            <li class="sidebar-title">
                Admin
            </li>
            <li class="@if (Request::routeIs('sla.list') || Request::routeIs('sla.create')) {{'active-page'}} @endif">
                <a href="#"><i class="material-icons-two-tone">groups</i>SLA Management</a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{ route('sla.create') }}" class="@if(Request::routeIs('sla.create')) {{'active'}} @endif">Create SLA</a>
                    </li>
                    <li>
                        <a href="{{ route('sla.list') }}" class="@if(Request::routeIs('sla.list')) {{'active'}} @endif">List SLAs</a>
                    </li>
                </ul>
            </li>
            @endif
            <li class="sidebar-title">
                Other
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="material-icons">logout</i>
                    Logout</a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>--}}
    </div>
</div>
