<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Rumah Tahfidz</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a class="nav-link" href="{{ url('/app/admin/siswa') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/app/admin/siswa') }}">
                    <i class="fa fa-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/app/admin/pengajar') }}">
                    <i class="fa fa-user"></i>
                    <span>Pengajar</span>
                </a>
            </li>
            <li class="menu-header">Settings</li>
            <li>
                <a class="nav-link" href="{{ url('/app/admin/users/') }}">
                    <i class="far fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ url('/app/admin/role') }}">
                    <i class="far fa-user"></i>
                    <span>Role</span>
                </a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
