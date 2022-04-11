<div class="box">
    <div class="box-header">
        <center>
            <h1 class="box-title">Materi Kata</h1>
        </center>
    </div>
    <div class="box-body">
        <div class="row">
            <?php
            $alfabet = $this->db->query("SELECT * from tbl_kata order by id desc")->result();
            foreach ($alfabet as $row) {

            ?>
                <div class="col-sm-3" style="margin-top: 15px;">
                    <div class="card" style="width: 22rem; background-color: whitesmoke; border-radius: 5px;">
                        <!-- <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/kata/' . $row->gambar); ?>" style="width:125px; height:125px"> -->
                        <div class="card-body">
                            <center>
                                <strong>
                                    <h4 class="card-title"><?= $row->kata ?></h4>
                                </strong>
                            </center>


                               <center>
                                <strong>
                                    <h4 class="card-title"><?= $row->kata_thai ?></h4>
                                </strong>
                            </center>


                            <center>
                                <p class="card-text"><?= $row->keterangan ?></p>
                            </center>
                            <center>
                                <audio controls style="width: 150px; height:40px;">
                                    <source src="<?= site_url('assets/uploads/music/kata/' . $row->suara); ?>" type="audio/mpeg">
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