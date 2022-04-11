<div style="float: left;">

    <div class="alert alert-warning">
        <table class="table table-bordered" style="margin-bottom: 0px">
            <tr>
                <td width="30%">Nama Peserta</td>
                <td width="70%"><?php echo $this->session->userdata('username') ?></td>
            </tr>
            <tr>
                <td width="30%">Nama Ujian</td>
                <td width="70%"><?php echo $detiltes->nama_latihan; ?></td>
            </tr>
            <tr>
                <td>Jumlah Soal</td>
                <td>10</td>
            </tr>
        </table>
    </div>

</div>


<div class="row col-md-12">
    <form role="form" action="<?php echo base_url('Soal/save_jawaban') ?>" name="_form" method="post" id="_form">
        <?php
        $no = 1;
        $jawaban = array("A", "B", "C", "D");
        if (!empty($row)) {
            foreach ($row->result() as $key => $data) {
                echo '<input type="hidden" name="id_soal_' . $no . '" value="' . $data->id_soal . '">';
                echo '<div class="step well">';

                if ($data->gambar_soal == "") {
                    echo '<table class="table table-form" style="font-size: 16px">
                <tr><td style="v-align: top">' . $no . '</td><td colspan="2">' . $data->soal . '</td></tr>';
                    for ($j = 0; $j < sizeof($jawaban); $j++) {
                        $kecil_jawaban = strtolower($jawaban[$j]);
                        $opsyen = "opsi_" . $kecil_jawaban;
                        $opsyens = $data->$opsyen;

                        if ($jawaban[$j] == $data->jawaban) {
                            echo '<tr><td width="3%">' . $jawaban[$j] . '</td><td width="3%"><input type="radio" id="opsi_' . $jawaban[$j] . '_' . $data->id_soal . '" name="opsi_' . $no . '" value="' . $jawaban[$j] . '"></td><td><label for="opsi_' . $jawaban[$j] . '_' . $data->id_soal . '">' . $opsyens . '</label></td></label></tr>';
                        } else {
                            echo '<tr><td width="3%">' . $jawaban[$j] . '</td><td width="3%"><input type="radio" id="opsi_' . $jawaban[$j] . '_' . $data->id_soal . '" name="opsi_' . $no . '" value="' . $jawaban[$j] . '"></td><td><label for="opsi_' . $jawaban[$j] . '_' . $data->id_soal . '">' . $opsyens . '</label></td></label></tr>';
                        }
                    }
                    echo '</table></div>';
                } else {
                    echo '<table class="table table-form" style="font-size: 16px">
                <tr><td rowspan="6" width="25%"><img src="' . base_url() . 'upload/gambar_soal/' . $d->gambar . '" class="polaroid" style="width: 300px; height: 250px"></td>
                <td style="v-align: top">' . $no . '</td><td colspan="2">' . $d->soal . '</td></tr>';
                    for ($j = 0; $j < sizeof($jawaban); $j++) {
                        $kecil_jawaban = strtolower($jawaban[$j]);
                        $opsyen = "opsi_" . $kecil_jawaban;
                        $opsyens = $d->$opsyen;

                        if ($jawaban[$j] == $d->jawaban) {
                            echo '<tr><td width="3%">' . $jawaban[$j] . '</td><td width="3%"><input checked type="radio" id="opsi_' . $jawaban[$j] . '_' . $d->id . '" name="opsi_' . $no . '" value="' . $jawaban[$j] . '"></td><td><label for="opsi_' . $jawaban[$j] . '_' . $d->id . '">' . $opsyens . '</label></td></label></tr>';
                        } else {
                            echo '<tr><td width="3%">' . $jawaban[$j] . '</td><td width="3%"><input type="radio" id="opsi_' . $jawaban[$j] . '_' . $d->id . '" name="opsi_' . $no . '" value="' . $jawaban[$j] . '"></td><td><label for="opsi_' . $jawaban[$j] . '_' . $d->id . '">' . $opsyens . '</label></td></label></tr>';
                        }
                    }
                    echo '</table></div>';
                }


                $no++;
            }
        }

        ?>
        <input type="hidden" name="jml_soal" value="<?php echo $no; ?>">
        <input type="hidden" name="id_latihan" value="<?php echo $detiltes->id_latihan; ?>">
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id'); ?>">
        <input type="submit" class="btn btn-success" value="Selesai Ujian">

        <!-- <a class="action submit btn btn-success btn-lg">Selesai Ujian</a> -->
    </form>
</div>

<script>
    function getFormData($form) {
        var unindexed_array = $form.serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function(n, i) {
            indexed_array[n['name']] = n['value'];
        });

        return indexed_array;
    }
    // btnsubmit = $(".submit");
    // btnsubmit.click(function() {
    //     simpan_akhir();
    // });

    simpan_akhir = function() {
        if (confirm('Anda yakin akan mengakhiri tes ini..?')) {
            var f_asal = $("#_form");
            var form = getFormData(f_asal);

            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Soal/save_jawaban') ?>",
                data: JSON.stringify(form),
                dataType: 'json',
                contentType: 'application/json; charset=utf-8'
            }).done(function(response) {

                window.location.href("<?php echo base_url(); ?>soal");

            });

            return false;
        }
    }
</script>