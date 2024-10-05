<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('backend/images/logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('backend/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{asset('backend/images/logo-dark.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('backend/images/logo-dark-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{route('admin.profile')}}">
                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : asset('backend/images/users/avatar-2.jpg')}}"
                    alt="user-image" height="42" class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">Dominic Keller</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Home</li>
            {{-- dashboard --}}
            <li class="side-nav-item {{ request()->routeIs('admin.dashboard') ? 'menuitem-active' : '' }} ">
                <a href="{{ route('admin.dashboard')}} " class="side-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} ">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard</span>
                </a>
            </li>
            {{-- Profile --}}
            <li class="side-nav-item {{ request()->routeIs('admin.profile') ? 'menuitem-active' : '' }} ">
                <a href="{{ route('admin.profile')}} " class="side-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }} ">
                    <i class="uil-user"></i>
                    <span> Profile </span>
                </a>
            </li>

            <li class="side-nav-title">APPS MANAGEMENT</li>
            {{-- email --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Email </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-email-inbox.html">Inbox</a>
                        </li>
                        <li>
                            <a href="apps-email-read.html">Read Email</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-title">ACCOUNT MANAGEMENT</li>
            {{-- General Setting --}}
            <li class="side-nav-item {{ request()->routeIs('admin.setting') ? 'menuitem-active' : '' }} ">
                <a href="{{ route('admin.setting')}} " class="side-nav-link {{ request()->routeIs('admin.setting') ? 'active' : '' }} ">
                    <i class=" uil-bright"></i>
                    <span> General Setting </span>
                </a>
            </li>
            <li class="side-nav-item ">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="side-nav-link" style="background: transparent; border: 0;">
                        <i class="uil-sign-out-alt"></i>
                        <span> Sign Out </span>
                    </button>
                </form>
            </li>


        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
