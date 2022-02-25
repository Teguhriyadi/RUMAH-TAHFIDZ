<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Rumah Tahfidz | @yield("app_title")</title>

    @include("app.administrator.layouts.partials.css.style")
    @include("app.administrator.layouts.partials.js.style")
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                            class="fas fa-bars"></i></a></li>
                        </ul>
                    </form>
                    <ul class="navbar-nav navbar-right">
                        <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ url('/template') }}/assets/img/avatar/avatar-1.png"
                            class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->nama }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Online</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" onclick="logout()" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            @include("app/administrator/layouts/partials/sidebar/main-sidebar")

            <!-- Main Content -->
            <div class="main-content">
                @yield("app_content")
            </div>
            <!-- END Main Content -->
            @include("app/administrator/layouts/partials/footer/main-footer")

        </div>
    </div>


    @yield("app_scripts")
    <script>
        function logout() {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan mengakhiri sesi login ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ url("app/logout") }}',
                        type: 'get',
                        success: function (response) {
                            if (response.status == true) {
                                location.href = '{{ url("/") }}'
                            }
                        }
                    })
                }
            })
        }
    </script>
</body>

</html>
