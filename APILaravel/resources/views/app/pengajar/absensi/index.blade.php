@extends("app/administrator/layouts/template")

@section("app_title", "Data Absensi")
    
@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Data Absensi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Role</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-plus"></i>
                        <span>Tambah Data</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox">
                                    </th>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No. HP</th>
                                    <th>Status Absen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td>Mohammad Ilham</td>
                                    <td>123456</td>
                                    <td>
                                        <select name="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">Hadir</option>
                                            <option value="">Sakit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td>Mohammad Ilham</td>
                                    <td>123456</td>
                                    <td>
                                        <select name="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">Hadir</option>
                                            <option value="">Sakit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td>Mohammad Ilham</td>
                                    <td>123456</td>
                                    <td>
                                        <select name="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">Hadir</option>
                                            <option value="">Sakit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td>Mohammad Ilham</td>
                                    <td>123456</td>
                                    <td>
                                        <select name="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">Hadir</option>
                                            <option value="">Sakit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td>Mohammad Ilham</td>
                                    <td>123456</td>
                                    <td>
                                        <select name="" class="form-control">
                                            <option value="">- Pilih -</option>
                                            <option value="">Hadir</option>
                                            <option value="">Sakit</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Masukkan Keterangan">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <button type="reset" class="btn btn-danger">
                                <i class="fa fa-times"></i>
                                <span>Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                <span>Tambah</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection