<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('home') }}">Screenboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('home') }}">SB</a>
        </div>
        <ul class="sidebar-menu">
            {{-- Dashboard --}}
            <li class="menu-header"></li>
            <li class="menu-header">Screenboard</li>
            <li class="nav-item">
                <a href="{{ url('brand') }}" class="nav-link">
                    <i class="fas fa-cubes"></i><span>Brand</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('category') }}" class="nav-link">
                    <i class="fas fa-hashtag"></i><span>Category</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('image') }}" class="nav-link">
                    <i class="fas fa-image"></i><span>Images</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('image-category') }}" class="nav-link">
                    <i class="fas fa-image"></i><span>Images Category</span></a>
            </li>
            <li class="nav-item">
                <a href="{{ url('module') }}" class="nav-link">
                    <i class="fas fa-cube"></i><span>Modules</span></a>
            </li>

            <li class="menu-header">Settings</li>
            <li class="nav-item">
                <a href="{{ url('user') }}" class="nav-link">
                    <i class="fas fa-user"></i><span>Users</span></a>
            </li>


            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cubes"></i><span>Modules</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ url('product') }}">All Product</a>
                    </li>
                </ul>
            </li>
            --}}
        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
