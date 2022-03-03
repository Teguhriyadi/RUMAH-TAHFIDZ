@extends("app.administrator.layouts.template")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Pesan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Pesan</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-book"></i> Data Pesan
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama</th>
                                    <th>Judul</th>
                                    <th>Pesan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 0 @endphp
                                @foreach($data_pesan as $pesan)
                                <tr>
                                    <td class="text-center">{{ ++$no }}.</td>
                                    <td>{{ $pesan->nama }}</td>
                                    <td>{{ $pesan->judul }}</td>
                                    <td>{{ $pesan->pesan }}</td>
                                    <td class="text-center">
                                    </td>
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
