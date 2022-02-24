@extends("app/administrator/layouts/template")

@section("app_title", "Data Informasi Login")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Informasi Login</h1>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-book"></i> Data Informasi Login
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tampilData">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Login Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0
                                @endphp
                                @foreach ($user_login as $data)
                                    <tr>
                                        <td class="">{{ ++$no }}.</td>
                                        <td>{{ $data->nama }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section("app_scripts")

<script type="text/javascript">

    function tampilData() {
        let empTable = document.getElementById("tampilData").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        $.ajax({
            url: "{{ url('') }}/api/"
        });
    }

    tampilData();

</script>

@endsection
