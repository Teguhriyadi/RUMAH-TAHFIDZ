@extends("app/administrator/layouts/template")

@section("app_title", "Data Status Absen")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>Status Absen</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/admin/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">Data Status Absen</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-book"></i> Data Status Absen
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tampilData">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Keterangan</th>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-edit"></i> Edit Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="form-group">
                    <label for="keterangan"> Keterangan </label>
                    <input type="text" class="form-control" id="ket" name="keterangan" placeholder="Masukkan Keterangan">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-times"></i> Batal
                </button>
                <button type="submit" class="btn btn-primary" id="btn-edit">
                    <i class="fa fa-save"></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@section("app_scripts")

<script type="text/javascript">

    function tampilData() {
        let empTable = document.getElementById("tampilData").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        $.ajax({
            url: "{{ url('') }}/api/status_absen",
            type: "GET",
            success: function (response) {
                let no = 1;
                for (let key in response.data) {
                    if (response.data.hasOwnProperty(key)) {
                        let val = response.data[key];
                        let newRow = empTable.insertRow(-1);
                        let nomer = newRow.insertCell(0);
                        let namaCell = newRow.insertCell(1);
                        let aksiCell = newRow.insertCell(2);

                        nomer.innerHTML = no++;
                        namaCell.innerHTML = val['keterangan'];
                        aksiCell.innerHTML = '<button class="btn btn-warning text-center" id="btnEdit" data-target="#modalEdit" data-toggle="modal" data-id="'+val['id']+'" data-keterangan="'+val['keterangan']+'"><i class="fa fa-edit"></i> Edit </button>'

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
                    url : "{{ url('/api/status_absen/') }}/" + id,
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

    tampilData();
</script>

@endsection
