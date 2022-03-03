@extends("app/administrator/layouts/template")

@section("app_title", "Home")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Users</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" id="btnTambah" data-target="#modalTambah" data-toggle="modal">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-bordered table-hover" id="tampilData">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-plus"></i> Tambah Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nama"> Nama </label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="email"> E-Mail </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                </div>
                <div class="form-group">
                    <label for="password"> Password </label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                </div>
                <div class="form-group">
                    <label for="id_role"> Role </label>
                    <select name="id_role" id="id_role" class="form-control">
                        <option value="">- Pilih -</option>
                        @foreach ($data_role as $data)
                        <option value="{{ $data->id }}">
                            {{ $data->keterangan }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar"> Gambar </label>
                    <input type="file" id="gambar" class="form-control">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-tambah">
                    <i class="fa fa-plus"></i> Tambah
                </button>
            </div>
        </div>
    </div>
</div>
<!-- END -->

@endsection

@section("app_scripts")

<script type="text/javascript">

    function tampilData() {
        let empTable = document.getElementById("tampilData").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        $.ajax({
            url: "{{ url('') }}/api/users",
            type: "GET",
            success: function (response) {
                let no = 1;
                for (let key in response.data) {
                    if (response.data.hasOwnProperty(key)) {
                        let val = response.data[key];
                        let newRow = empTable.insertRow(-1);
                        let nomer = newRow.insertCell(0);
                        let namaCell = newRow.insertCell(1);
                        let emailCell = newRow.insertCell(2);
                        let idRoleCell = newRow.insertCell(3);
                        let aksiCell = newRow.insertCell(4);

                        nomer.innerHTML = no++;
                        namaCell.innerHTML = val['nama'];
                        emailCell.innerHTML = val['email'];
                        idRoleCell.innerHTML = val['id_role'];
                        aksiCell.innerHTML = '<button class="btn btn-warning" id="btnEdit" data-target="#modalEdit" data-toggle="modal" data-id="'+val['id']+'" data-keterangan="'+val['keterangan']+'"><i class="fa fa-edit"></i> Edit </button> &nbsp;'
                        aksiCell.innerHTML += '<button class="btn btn-danger" onclick="hapusData('+val['id']+')"><i class="fa fa-trash"></i> Hapus</button>'
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        $("body").on('click', '#btnEdit', function() {
            let id = $(this).data('id');
            let ket = $(this).data('keterangan');

            $("#id").val(id)
            $("#ket").val(ket)
        });

        $("#btn-tambah").on('click', function() {
            let nama = $("#nama").val().trim();
            let email = $("#email").val().trim();
            let password = $("#password").val().trim();
            let id_role = $("#id_role").val().trim();

            if (nama == "" || email == "" || password == "" || id_role == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data Tidak Boleh Kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/users') }}",
                    type : "POST",
                    data : { nama : nama, email : email, password : password, id_role : id_role, _token: "{{ csrf_token() }}" },
                    success : function(response) {
                        if (response.status == true) {
                            $("#nama").val('')
                            $("#email").val('')
                            $("#password").val('')
                            $("#id_role").val('')
                            tampilData()
                            $("#modalTambah").modal('hide')
                            Swal.fire({
                                title : "Berhasil",
                                text : "Berhasil di Tambahkan",
                                icon : "success"
                            })
                        } else {
                            Swal.fire({
                                title : "Oops",
                                text : "Data Gagal di Inputkan",
                                icon : "error"
                            })
                        }
                    }
                })
            }
        })

        $("#btn-edit").on('click', function() {
            let id = $("#id").val().trim();
            let keterangan = $("#ket").val().trim();

            if (keterangan == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data tidak boleh kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/role/') }}/" + id,
                    type : "POST",
                    data : { id : id, keterangan : keterangan, _token: "{{ csrf_token() }}", _method : "PUT" },
                    success : function(response) {
                        console.log(response)
                        if (response.status == true) {
                            $("#id").val('')
                            $("#ket").val('')
                            tampilData()
                            $("#modalEdit").modal('hide')
                            Swal.fire({
                                title : "Berhasil",
                                text : "Berhasil di Simpan",
                                icon : "success"
                            })
                        } else {
                            Swal.fire({
                                title : "Oops",
                                text : "Data Gagal di Simpan",
                                icon : "error"
                            })
                        }
                    }
                })
            }
        })
    })

    function hapusData(id)
    {
        Swal.fire({
            title : "Apakah Yakin ?",
            text : "Untuk Menghapus Data Ini",
            icon : "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ url('/api/role/') }}/" + id,
                    type : "POST",
                    data : { _token: "{{ csrf_token() }}", _method : "DELETE" },
                    success : function(response) {
                        console.log(response)
                        if (response.status == true) {
                            tampilData()
                            Swal.fire(
                            'Berhasil!',
                            'Data Berhasil di Hapus',
                            'success'
                            )
                        } else {
                            Swal.fire(
                            'Gagal!',
                            'Data Gagal di Hapus',
                            'error'
                            )
                        }
                    }
                })
            } else {

            }
        })
    }


    tampilData();
</script>

@endsection
