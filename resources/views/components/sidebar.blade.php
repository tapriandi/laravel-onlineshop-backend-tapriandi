<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('home') }}">Screenboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('home') }}">SB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                {{-- <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}"> --}}
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('home') }}">General Dashboard</a>
                    </li>
                    {{-- <li class="{{ Request::is('dashboard-ecommerce-dashboard') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('dashboard-ecommerce-dashboard') }}">Ecommerce Dashboard</a>
                    </li> --}}
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('user') }}">All Users</a>
                    </li>
                </ul>
            </li>

            {{-- Dashboard --}}
            <li class="menu-header">Screenboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hashtag"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('category') }}">All Category</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i><span>Brands</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('brand') }}">All Brand</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-image"></i><span>Images</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('image') }}">All Images</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ url('image-category') }}">All Images Category</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cube"></i><span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('module') }}">All Module</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i><span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('product') }}">All Product</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i><span>Category</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('product') }}">All Product</a>
                    </li>
                </ul>
            </li> --}}
        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
