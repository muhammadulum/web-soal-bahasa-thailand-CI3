<div class="box">
    <div style="padding: 10px;">
        <button class="btn btn-info" id="btn_add_latihan"><i class='fa fa-fw fa-plus'></i> Tambah Latihan</button>
    </div>
    <div class="box-body table-responsive">
        <table id="table_latihan" class="cell-border" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Latihan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Latihan</h3>
            </div>
            <div class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Latihan</label>
                        <div class="col-xs-8">
                            <input name="id_latihan" id="id_latihan" class="form-control" type="hidden">
                            <input name="nama_latihan" id="nama_latihan" class="form-control" type="text">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Deskripsi</label>
                        <div class="col-xs-8">
                            <input name="deskripsi" id="deskripsi" class="form-control" type="text" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_save_edit">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Latihan</h3>
            </div>
            <div class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Nama Latihan</label>
                        <div class="col-xs-8">
                            <input name="nama_latihan_add" id="nama_latihan_add" class="form-control" type="text" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3">Deskripsi</label>
                        <div class="col-xs-8">
                            <input name="deskripsi_add" id="deskripsi_add" class="form-control" type="text" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_add_save">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var table;
    $(document).ready(function() {

        table = $('#table_latihan').DataTable({
            dom: 'lBfrtip',
            buttons: ['excel', 'pdf', 'print'],
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ordering": true,

            "aLengthMenu": [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            "iDisplayLength": 10,

            "ajax": {
                "url": "<?php echo base_url('latihan/get') ?>",
                "type": "POST",
                "data": function(data) {

                }
            },
            "columnDefs": [{
                    "targets": [3],
                    "data": null,
                    "defaultContent": "<button id='btn-edit' class='btn btn-success btn-xs'><i class='fa fa-fw fa-pencil'></i> Edit</button> | <button id='btn-hapus' class='btn btn-danger btn-xs'><i class='fa fa-fw fa-trash'></i> Hapus</button>"
                },
                {
                    className: 'text-center',
                    targets: [0, 3]
                },
            ],


        });

        $('#table_latihan tbody').on('click', '#btn-hapus', function() {
            var data = table.row($(this).parents('tr')).data();
            Swal.fire({
                title: 'Apakah anda yakin ?',
                text: "Latihan : " + data[1] + " akan dihapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>Latihan/delete",
                        type: "POST",
                        dataType: "json",
                        data: {
                            "id_latihan": data[0],
                        },
                        complete: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Latihan berhasil dihapus',
                                'success'
                            );
                            table.ajax.reload();
                        }
                    });
                }
            })
        });

        $('#table_latihan tbody').on('click', '#btn-edit', function() {
            var data = table.row($(this).parents('tr')).data();
            $('#id_latihan').val(data[0]);
            $('#nama_latihan').val(data[1]);
            $('#deskripsi').val(data[2]);
            $('#modal_edit').modal('show');
        });


        $("#btn_save_edit").click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>Latihan/edit_latihan",
                type: "POST",
                dataType: "json",
                data: {
                    "id_latihan": $('#id_latihan').val(),
                    "nama_latihan": $('#nama_latihan').val(),
                    "deskripsi": $('#deskripsi').val(),
                },
                complete: function(data) {
                    $('#modal_edit').modal('hide');
                    Swal.fire(
                        'Updated!',
                        'Latihan berhasil diupdate',
                        'success'
                    );
                    table.ajax.reload();
                }
            });
        });

        $("#btn_add_latihan").click(function() {
            $('#modal_add').modal('show');
        });

        $("#btn_add_save").click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>Latihan/add",
                type: "POST",
                dataType: "json",
                data: {
                    "nama_latihan": $('#nama_latihan_add').val(),
                    "deskripsi": $('#deskripsi_add').val(),
                },
                complete: function(data) {
                    $('#modal_add').modal('hide');
                    Swal.fire(
                        'Saved!',
                        'Latihan berhasil ditambahkan',
                        'success'
                    );
                    table.ajax.reload();
                }
            });
        });

    });
</script>