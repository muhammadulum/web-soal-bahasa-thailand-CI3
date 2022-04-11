<div class="box">
<div class="box-header">
    <center><h3 class="box-title">Vokal</h3></center>
</div>
<div class="box-body">
<div class="row">
<?php
$alfabet = $this->db->query("SELECT * from tbl_alfabet where kategori='Vokal' order by id desc")->result();
    foreach ($alfabet as $row) {

    ?>
    <div class="col-sm-2">
        <div class="card" style="width: 18rem;">
        <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/alfabet/'.$row->gambar); ?>" style="width:125px; height:125px">
            <div class="card-body">
            <center><h5 class="card-title"><?= $row->judul ?></h5></center>
                <!-- <p class="card-text"><?= $row->keterangan ?></p> -->
                <center>
                <audio controls style="width: 150px; height:40px;"> 
                    <source src="<?= site_url('assets/uploads/images/alfabet/'.$row->suara); ?>" type="audio/mpeg">
                </audio>
                </center>
            </div>
        </div>
    </div>
        <?php
        }
?>
</div>
</div>
</div>


<div class="box">
<div class="box-header">
    <center><h3 class="box-title">Konsonan</h3></center>
</div>
<div class="box-body">
<div class="row">
<?php
$alfabet = $this->db->query("SELECT * from tbl_alfabet where kategori='Konsonan' order by id desc")->result();
    foreach ($alfabet as $row) {

    ?>
    <div class="col-sm-2">
        <div class="card" style="width: 18rem;">
        <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/alfabet/'.$row->gambar); ?>" style="width:125px; height:125px">
            <div class="card-body">
            <center><h5 class="card-title"><?= $row->judul ?></h5></center>
                <!-- <p class="card-text"><?= $row->keterangan ?></p> -->
                <center>
                <audio controls style="width: 150px; height:40px;"> 
                    <source src="<?= site_url('assets/uploads/images/alfabet/'.$row->suara); ?>" type="audio/mpeg">
                </audio>
                </center>
            </div>
        </div>
    </div>
        <?php
        }
?>
</div>
</div>
</div>