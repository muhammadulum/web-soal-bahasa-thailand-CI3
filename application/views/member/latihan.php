<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Latihan</h3>
        <input type="hidden" id="sukses_simpan" value="<?php echo $this->session->flashdata('sukses_simpan_jawaban'); ?>">

    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Latihan</th>
                    <th>Jumlah Soal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++ ?></td>
                        <td><?= $data->nama_latihan ?></td>
                        <?php
                        $this->db->where('id_latihan', $data->id_latihan);
                        $count = $this->db->count_all_results('tbl_soal');
                        ?>
                        <td style="text-align: center;">10 soal</td>
                        <td class="text-center">
                            <?php
                            $this->db->where('id_user', $this->session->userdata('id'));
                            $this->db->where('id_latihan', $data->id_latihan);
                            $count = $this->db->count_all_results('tbl_hasil_latihan');
                            if ($count > 0) {
                            ?>
                                <a href="<?= site_url('soal/mengerjakan_ulang/' . $data->id_latihan) ?>" onclick="return confirm('Anda yakin akan mengerjakan ulang ? \nJawaban anda sebelumnya akan terhapus');" id="btn-mengerjakan" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-pencil"></i> Mengerjakan Ulang</a>

                                <a href="<?= site_url('HasilLatihan/hasil_latihan/' . $data->id_latihan) ?>" class="btn btn-primary btn-xs"><i class="fa fa-fw fa-book"></i> Lihat Hasil</a>
                            <?php
                            } else {
                            ?>
                                <a href="<?= site_url('soal/mengerjakan/' . $data->id_latihan) ?>" id="btn-mengerjakan" class="btn btn-warning btn-xs"><i class="fa fa-fw fa-pencil"></i> Mulai Mengerjakan</a>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {

        const sukses_simpan_jawaban = $('#sukses_simpan').val();

        if (sukses_simpan_jawaban) {
            Swal.fire({
                icon: 'success',
                title: 'Saved!',
                text: sukses_simpan_jawaban
            })
        }
    });
</script>