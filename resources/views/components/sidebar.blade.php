<div class="logo">
    <!-- <a href="index.html" class="logo-icon"><span class="logo-text">Neptune</span></a> -->
    <a href="/" class="logo-icon"><span class="logo-text">{{ config('app.name') }}</span></a>
    <div class="sidebar-user-switcher user-activity-online">
        <a href="{{ route('settings.index') }}">
            <img src="https://i.postimg.cc/TwwQgYKS/avatar.png">
            <span class="activity-indicator"></span>
            <span class="user-info-text">{{ Auth::user()->name }}<br><span class="user-state-info">{{ Auth::user()->is_admin ? "Admin" : "User" }}</span></span>
        </a>
    </div>
</div>
<div class="app-menu">
    <ul class="accordion-menu">
        <li class="sidebar-title">
            Apps
        </li>
        <li class="{{ request()->is('dashboard*') ? 'active-page' : '' }}">
            <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'active' : '' }}"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
        </li>
        <li class="{{ request()->is('potholes/create') ? 'active-page' : '' }}">
            <a href="{{ route('potholes.create') }}"><i class="material-icons-two-tone">add_circle</i>Lapor Pothole</a>
        </li>
        <li class="{{ request()->is('potholes') ? 'active-page' : '' }}">
            <a href="{{ route('potholes.store') }}"><i class="material-icons-two-tone">history</i>Riwayat Lapor</a>
        </li>
        {{-- <li>
            <a href="#"><i class="material-icons-two-tone">cloud_queue</i>File Manager</a>
        </li>
        <li>
            <a href="#"><i class="material-icons-two-tone">calendar_today</i>Calendar<span class="badge rounded-pill badge-success float-end">14</span></a>
        </li>
        <li>
            <a href="#"><i class="material-icons-two-tone">done</i>Todo</a>
        </li>
        <li>
            <a href=""><i class="material-icons-two-tone">star</i>Pages<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
            <ul class="sub-menu">
                <li>
                    <a href="#">Pricing</a>
                </li>
                <li>
                    <a href="#">Invoice</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Authentication<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">Sign In</a>
                        </li>
                        <li>
                            <a href="#">Sign Up</a>
                        </li>
                        <li>
                            <a href="#">Lock Screen</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Error</a>
                </li>
            </ul>
        </li> --}}
        <li class="{{ request()->is('settings*') ? 'active-page' : '' }}">
            <a href="{{ route('settings.index') }}"><i class="material-icons-two-tone">settings</i>Settings</a>
        </li>

        <li class="divider"></li>
        <li>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-dropdown-link href="{{ route('logout') }}"
                         @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </li>
    </ul>
</div>
