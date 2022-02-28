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
            <li class="{{ Request::segment(3)=='home' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/home') }}">
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
            <li class="{{ Request::segment(3)=='siswa' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/siswa') }}">
                    <i class="fa fa-user"></i>
                    <span>Siswa</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='pengajar' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/pengajar') }}">
                    <i class="fa fa-user"></i>
                    <span>Pengajar</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='status_absen' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/status_absen') }}">
                    <i class="fa fa-book"></i>
                    <span>Status Absen</span>
                </a>
            </li>
            {{-- <li class="menu-header"> Web Admin </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-bars"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-bars"></i>
                    <span>Blog</span>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-bars"></i>
                    <span>Galeri</span>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-bars"></i>
                    <span>Profil</span>
                </a>
            </li> --}}
            <li class="menu-header">Settings</li>
            <li class="{{ Request::segment(3)=='users' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/users/') }}">
                    <i class="far fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='role' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/role') }}">
                    <i class="far fa-user"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="{{ Request::segment(3)=='informasi_login' ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/app/admin/informasi_login') }}">
                    <i class="fa fa-key"></i>
                    <span>Informasi Login</span>
                </a>
            </li>
        </ul>
    </aside>
</div>
