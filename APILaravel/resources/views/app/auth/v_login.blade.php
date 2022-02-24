<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Rumah Tahfidz </title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('/template') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('/template') }}/assets/css/components.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container" style="margin-top: 100px">
                <div class="row">
                    <div
                    class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">

                            <div class="alert alert-danger" id="error-login" style="display: none">
                                Login gagal, harap periksa kembali akun anda!
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback" id="error-email">
                                    Please fill in your email
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback" id="error-password">
                                    please fill in your password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" id="btn-login" class="btn btn-primary btn-lg btn-block"
                                tabindex="4">
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url('/template') }}/assets/js/stisla.js"></script>
<script src="{{ url('sweetalert/dist/sweetalert2.all.min.js') }}"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="{{ url('/template') }}/assets/js/scripts.js"></script>
<script src="{{ url('/template') }}/assets/js/custom.js"></script>

<!-- Page Specific JS File -->

<script type="text/javascript">
    function validasi() {
        let email = $('#email').val().trim();
        let password = $('#password').val().trim();

        if (email == '' && password == '') {
            $('#email, #password').addClass('is-invalid')
            $('.invalid-feedback').css('display', 'block')
        } else if (email == '') {
            $('#email').addClass('is-invalid')
            $('#error-email').css('display', 'block')
        } else if (password == '') {
            $('#password').addClass('is-invalid')
            $('#error-password').css('display', 'block')
        } else {
            proses(email, password)
        }

        $('#email').change(function () {
            $(this).removeClass('is-invalid')
            $('#error-email').css('display', 'none')
            $("#error-login").css('display', 'none')
        })

        $('#password').change(function () {
            $(this).removeClass('is-invalid')
            $('#error-password').css('display', 'none')
            $("#error-login").css('display', 'none')
        })
    }

    function proses(email, password) {
        $.ajax({
            url: '{{ url("app/login") }}',
            type: "POST",
            data: {
                email: email,
                password: password,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.status == 1) {
                    location.href = '{{ url("app/admin/home") }}';
                } else {
                    $("#error-login").css('display', 'block')
                }
            }
        })
    }

    $(document).ready(function () {
        $("#btn-login").on('click', function() {
            validasi();
        });

        $("input").on('keypress', function (e) {
            if(e.keyCode == 13)
            {
                validasi();
            }
        });
    })
</script>

</body>

</html>
