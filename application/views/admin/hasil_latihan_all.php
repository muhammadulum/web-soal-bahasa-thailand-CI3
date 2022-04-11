<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Hasil Latihan</h3>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-bordered table striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Nama Latihan</th>
                    <th>Nilai</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++ ?></td>
                        <td><?= $data->first_name ?> <?= $data->last_name ?></td>
                        <td style="text-align: center;"><?= $data->nama_latihan ?></td>
                        <td style="text-align: center;"><?= $data->nilai_bobot ?></td>
                        <td class="text-center">
                            <form action="<?= site_url('hasillatihan/hasil_latihan_detail') ?>" method="POST">
                                <input type="hidden" name="id_latihan" value="<?= $data->id_latihan ?>">
                                <input type="hidden" name="id_user" value="<?= $data->id_user ?>">
                                <input type="submit" name="submit" value="Lihat Hasil" class="btn btn-success btn-xs">
                            </form>
                            <form action="<?= site_url('hasillatihan/delete') ?>" method="POST">
                                <input type="hidden" name="id_hasil" value="<?= $data->id_hasil ?>">
                                <input type="hidden" name="id_latihan" value="<?= $data->id_latihan ?>">
                                <input type="submit" name="submit" value="Hapus Hasil" onclick="return confirm('Anda yakin akan menghapus ? \nJawaban user tersebut akan terhapus');" class="btn btn-danger btn-xs">
                            </form>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>
    </div>
</div>