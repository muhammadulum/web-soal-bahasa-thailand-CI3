<div class="box">
    <input type="hidden" id="sukses_simpan" value="<?php echo $this->session->flashdata('sukses_simpan_jawaban'); ?>">
    <div class="box-body table-responsive">
        <table id="table_latihan" class="cell-border" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Latihan</th>
                    <th>Jumlah Soal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="modal_add_soal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Soal</h3>
            </div>
            <div class="form-horizontal">
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url(); ?>Soal/add" name="f_soal" id="f_soal">
                        <input type="hidden" name="id" id="id" value="0">
                        <div id="konfirmasi"></div>
                        <table class="table table-form">
                            <tr>
                                <td class="" colspan="2" style="width: 20%"></td>
                                <td style="width: 80%">
                                    <input type="hidden" name="id_latihan" id="id_latihan" class="form-control">
                                    <!-- <input type="file" name="gambar_soal" id="gambar_soal" class="form-control"> -->
                                </td>
                            </tr>
                            <tr>
                                <td class="" colspan="2" style="width: 20%"></td>
                                <td style="width: 80%">
                                    <input type="hidden" value="1" name="bobot_soal" id="bobot_soal" class="form-control" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="" colspan="2" style="width: 20%">Soal</td>
                                <td style="width: 80%"><textarea autofocus class="form-control" style="height: 70px" name="soal" id="soal" required></textarea></td>
                            </tr>
                            <tr>
                                <td style="width: 4%" class="ctr">A</td>
                                <td style="width: 96%" colspan="2"><input type="text" class="form-control" name="opsi_a" id="opsi_a" required></td>
                            </tr>
                            <tr>
                                <td class="ctr">B</td>
                                <td colspan="2"><input type="text" class="form-control" name="opsi_b" id="opsi_b" required></td>
                            </tr>
                            <tr>
                                <td class="ctr">C</td>
                                <td colspan="2"><input type="text" class="form-control" name="opsi_c" id="opsi_c" required></td>
                            </tr>
                            <tr>
                                <td class="ctr">D</td>
                                <td colspan="2"><input type="text" class="form-control" name="opsi_d" id="opsi_d" required></td>
                            </tr>

                            <tr>
                                <td class="" colspan="2" style="width: 20%">Jawaban</td>
                                <td style="width: 80%">
                                    <select class="form-control" name="jawaban" id="jawaban" required>
                                        <option value="">-Jawaban-</option>
                                        <option value="A"> A</option>
                                        <option value="B"> B</option>
                                        <option value="C"> C</option>
                                        <option value="D"> D</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_add_soal">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var table;
    $(document).ready(function() {
        const session = "<?php echo $this->session->userdata('id_role'); ?>";

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
                "url": "<?php echo base_url('latihan/get_latihan') ?>",
                "type": "POST",
                "data": function(data) {

                }
            },

            "columnDefs": [{
                    "targets": [3],
                    "data": null,
                    "defaultContent": "<button id='btn-detail-hasil' class='btn btn-success btn-xs'><i class='fa fa-fw fa-book'></i> Lihat Semua Hasil</button>"
                },
                {
                    className: 'text-center',
                    targets: [0, 2, 3]
                },
            ],


        });

        $('#table_latihan tbody').on('click', '#btn-detail-hasil', function() {
            var data = table.row($(this).parents('tr')).data();
            var url = "<?= site_url('hasillatihan/index_detail/') ?>" + data[0];
            window.location.href = url;
        });



    });
</script>