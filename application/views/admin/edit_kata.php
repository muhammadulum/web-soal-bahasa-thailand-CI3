<section class="content">
<div class="box">
<div class="box-header">
    <div class="pull-right">
    <a href="<?= site_url('kata') ?>" class="btn btn-success btn-sm">
        <i class="fa fa-undo"></i> Kembali
    </a>
    </div>
</div>
<div class="box-body">
    <?php echo form_open('',array('method'=>"post",'enctype'=>"multipart/form-data")); ?>
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
        <?php if(!empty($error)){ echo "<div class='hidediv error'>$error</div>";   } ?> 
        <?php if(!empty($success)){ echo "<div class='alert alert-success'>$success</div>";   } ?>

        <div class="form-group <?= form_error('kata') ? 'has-error' : null ?>">
            <label for="gbr">Kata : </label>
            <input type="hidden" class="form-control" id="id" name="id" value="<?= $this->input->post('id') ? $this->input->post('id') : $row->id ?>">
            <input type="text" class="form-control" id="kata" name="kata" value="<?= $this->input->post('kata') ? $this->input->post('kata') : $row->kata ?>">
            <?= form_error('kata') ?>
        </div>

        <!-- <div class="form-group">
            <label for="gbr">Gambar : </label>
            <input type="file" class="form-control" id="gbr" name="gambar">
        </div> -->

          <div class="form-group">
            <label for="sng">Aksara Thai :</label>
            <input type="text" class="form-control" id="kata_thai" name="kata_thai" value="<?= $this->input->post('kata_thai') ? $this->input->post('kata_thai') : $row->kata_thai ?>">
        </div>

        <div class="form-group">
            <label for="sng">Mp3 Song :</label>
            <input type="file" class="form-control" id="sng" name="uploadSong">
        </div>

        <div class="form-group">
            <label for="sng">Keterangan :</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $this->input->post('keterangan') ? $this->input->post('keterangan') : $row->keterangan ?>">
        </div>

        <button type="submit" name='save' class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
</div>
</section>