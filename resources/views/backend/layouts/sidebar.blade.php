<div id="left-sidebar" class="sidebar">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="{{ asset('backend/assets/images/user.png') }}" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{auth()->user()->full_name}}</strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="professors-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li>
                            <a class="icon-menu" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="icon-power"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
            <nav class="sidebar-nav">
                <ul class="main-menu metismenu">
                <li class="{{ Route::is('admin') ? 'active' : '' }}"><a href="/admin"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li class="{{ Route::is('banners.index') || Route::is('banners.create') ? 'active' : '' }}"><a href="javascript:void(0);" class="has-arrow"><i class="icon-control-pause"></i><span>Banners</span> </a>
                        <ul>
                            <li class="{{ Route::is('banners.index') ? 'active' : '' }}"><a href="{{ route('banners.index') }}">All Banners</a></li>
                            <li  class="{{ Route::is('banners.create') ? 'active' : '' }}"><a href="{{ route('banners.create') }}">Add Banner</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>