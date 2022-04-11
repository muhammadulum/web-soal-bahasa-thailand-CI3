<div class="row col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">Data Soal
            <div style="margin-top: -5px; float: right;">
                <a href='<?php echo base_url('soal'); ?>' class='btn btn-warning btn-sm'><i class='glyphicon glyphicon-arrow-left'></i> Kembali</a>
            </div>
        </div>
        <div class="panel-body">

            <!-- accordion -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <?php
                if (!empty($row)) {
                    $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $no; ?>" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo $no . " : " . substr($data->soal, 0, 100); ?>
                                </a>

                                <div class="btn-group" style="float: right;">
                                    <a class="btn btn-info btn-xs" onclick="return m_soal_e('<?php echo $data->id_soal; ?>');"><i class="glyphicon glyphicon-pencil" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Edit</a>
                                    <a class="btn btn-warning btn-xs" onclick="return m_soal_h('<?php echo $data->id_soal; ?>');"><i class="glyphicon glyphicon-remove" style="margin-left: 0px; color: #fff"></i> &nbsp;&nbsp;Hapus</a>
                                </div>
                            </div>
                            <div id="collapse<?php echo $no; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">

                                    <?php
                                    if ($data->gambar_soal != "") {
                                    ?>
                                        <img src="<?php echo base_url(); ?>upload/gambar_soal/<?php echo $data->gambar; ?>" class="thumbnail" style="width: 300px; height: 280px; display: inline; float: left">
                                        <a href="<?php echo base_url(); ?>adm/m_soal/hapus_gambar/<?php echo $this->uri->segment(4); ?>/<?php echo $data->id; ?>" style="display: inline; margin-left: 20px" onclick="return confirm('Anda yakin..?');">Hapus Gambar</a>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                $arra = array("a", "b", "c", "d");
                                                for ($i = 0; $i < sizeof($arra); $i++) {
                                                    $opsi = "opsi_" . $arra[$i];

                                                    if ($data->jawaban == strtoupper($arra[$i])) {
                                                        echo "<tr style='background: #dff0d8'><td width='2%'>" . $arra[$i] . "</td><td width='98%'>" . $data->$opsi . "</td></tr>";
                                                    } else {
                                                        echo "<tr><td width='2%'>" . $arra[$i] . "</td><td width='98%'>" . $data->$opsi . "</td></tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php
                                                $arra = array("a", "b", "c", "d");
                                                for ($i = 0; $i < sizeof($arra); $i++) {
                                                    $opsi = "opsi_" . $arra[$i];
                                                    if ($data->jawaban == strtoupper($arra[$i])) {
                                                        echo "<tr style='background: #dff0d8'><td width='2%'>" . $arra[$i] . "</td><td width='98%'>" . $data->$opsi . "</td></tr>";
                                                    } else {
                                                        echo "<tr><td width='2%'>" . $arra[$i] . "</td><td width='98%'>" . $data->$opsi . "</td></tr>";
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                <?php
                        $no++;
                    }
                } else {
                    echo '<div class="alert alert-danger">Belum ada soal untuk latihan tersebut. Silakan input soal</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_soal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Soal</h3>
            </div>
            <div class="form-horizontal">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="0">
                    <div id="konfirmasi"></div>
                    <table class="table table-form">
                        <tr>
                            <td class="" colspan="2" style="width: 20%"></td>
                            <td style="width: 80%">
                                <input type="hidden" name="id_soal" id="id_soal" class="form-control">
                                <input type="hidden" name="id_latihan" id="id_latihan" class="form-control">
                                <!-- <input type="file" name="gambar_soal" id="gambar_soal" class="form-control"> -->
                            </td>
                        </tr>
                        <tr>
                            <td class="" colspan="2" style="width: 20%"></td>
                            <td style="width: 80%">
                                <input type="hidden" name="bobot_soal" id="bobot_soal" value="1" class="form-control" required>
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
                    <button class="btn btn-info" id="btn_save_edit_soal" onclick="return save_edit();">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function m_soal_e(id) {
        $("#modal_edit_soal").modal('show');
        $.ajax({
            type: "GET",
            url: "<?= site_url('soal/detail_per_soal/') ?>" + id,
            success: function(data) {
                $("#id_soal").val(data.id_soal);
                $("#id_latihan").val(data.id_latihan);
                $("#bobot_soal").val(data.bobot);
                $("#soal").val(data.soal);
                $("#opsi_a").val(data.opsi_a);
                $("#opsi_b").val(data.opsi_b);
                $("#opsi_c").val(data.opsi_c);
                $("#opsi_d").val(data.opsi_d);
                $("#jawaban").val(data.jawaban);
            }
        });

        return false;
    }

    function m_soal_h(id) {
        Swal.fire({
            title: 'Apakah anda yakin ?',
            text: "Soal tersebut akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url(); ?>Soal/delete",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "id_soal": id,
                    },
                    complete: function(data) {
                        Swal.fire({
                            title: 'Sukses !',
                            text: "Soal tersebut berhasil dihapus",
                            icon: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            allowOutsideClick: false,
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    }
                });
            }
        });

        return false;
    }

    function save_edit() {
        $.ajax({
            url: "<?php echo base_url(); ?>Soal/edit",
            type: "POST",
            dataType: "json",
            data: {
                "id_soal": $('#id_soal').val(),
                "id_latihan": $('#id_latihan').val(),
                "bobot": $('#bobot_soal').val(),
                "soal": $('#soal').val(),
                "opsi_a": $('#opsi_a').val(),
                "opsi_b": $('#opsi_b').val(),
                "opsi_c": $('#opsi_c').val(),
                "opsi_d": $('#opsi_d').val(),
                "jawaban": $('#jawaban').val(),
            },
            complete: function(data) {
                $('#modal_edit_soal').modal('hide');
                Swal.fire({
                    title: 'Sukses !',
                    text: "Soal tersebut berhasil diupdate",
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    allowOutsideClick: false,
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload();
                    }
                })
            }
        });
        return false;
    }
</script>