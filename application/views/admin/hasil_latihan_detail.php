<?php
foreach ($row->result() as $key => $data) {
    $listsoal = $data->list_soal;
    $listjawaban = $data->list_jawaban;
    $jumlah_benar = $data->jumlah_benar;
    $nilai_bobot = $data->nilai_bobot;
    $tgl_mulai = $data->tgl_mulai;
    $first_name = $data->first_name;
    $last_name = $data->last_name;
    $username = $data->username;
    $email = $data->email;
    $phone = $data->phone;
    $id_latihan = $data->id_latihan;
    $id_user = $data->id_user;
    $nama_latihan = $data->nama_latihan;
    $deskripsi = $data->deskripsi;
}
$soal = explode(',', $listsoal);
$jumlah_soal = count($soal);
$jumlah_salah = $jumlah_soal - $jumlah_benar;
?>
<style>
    table,
    th,
    td {
        border: 0px solid black;
    }
</style>
<div class="box">
    <div class="box-body table-responsive">
        <!-- <div style="float: right;">
            <form action="<?= site_url('Pdfview/indexadmin') ?>" method="POST">
                <input type="hidden" name="id_latihan" value="<?= $id_latihan ?>">
                <input type="hidden" name="id_user" value="<?= $id_user ?>">
                <input type="submit" name="submit" value="Cetak" class="btn btn-success" target="_blank">
            </form>
        </div> -->
        <h3>Data Peserta</h3>
        <table>
            <tr>
                <td style="width: 120px;">
                    Username
                </td>
                <td>
                    : <?php echo $username ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Nama Lengkap
                </td>
                <td>
                    : <?php echo $first_name . ' ' . $last_name ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Email
                </td>
                <td>
                    : <?php echo $email ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    No HP
                </td>
                <td>
                    : <?php echo $phone ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<!-- 
<div class="box">
    <div class="box-body table-responsive">
        <h3>Data Latihan</h3>
        <table border="0px">
            <tr>
                <td style="width: 120px;">
                    Nama Latihan
                </td>
                <td>
                    : <?php echo $nama_latihan ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Deskripsi
                </td>
                <td>
                    : <?php echo $deskripsi ?>
                </td>
            </tr>
        </table>
    </div>
</div> -->

<div class="box">
    <div class="box-body table-responsive">
        <h3>Hasil Latihan</h3>
        <table border="0px">
            <tr>
                <td style="width: 120px;">
                    Jumlah Soal
                </td>
                <td>
                    : <?php echo $jumlah_soal ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Jumlah Benar
                </td>
                <td>
                    : <?php echo $jumlah_benar ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Jumlah Salah
                </td>
                <td>
                    : <?php echo $jumlah_salah ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Nilai
                </td>
                <td>
                    : <?php echo $nilai_bobot ?>
                </td>
            </tr>
            <tr>
                <td style="width: 120px;">
                    Tanggal Latihan
                </td>
                <td>
                    : <?php echo $tgl_mulai ?>
                </td>
            </tr>
        </table>
    </div>
</div>