<section class="content">
<div class="box">
<div class="box-body">
    <?php echo form_open('',array('method'=>"post",'enctype'=>"multipart/form-data")); ?>
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
        <?php if(!empty($error)){ echo "<div class='hidediv error'>$error</div>";   } ?> 
        <?php if(!empty($success)){ echo "<div class='alert alert-success'>$success</div>";   } ?>

        <div class="form-group <?= form_error('kata') ? 'has-error' : null ?>">
            <label for="gbr">Kata : </label>
            <input type="text" class="form-control" id="kata" name="kata">
            <?= form_error('kata') ?>
        </div>

        <!-- <div class="form-group">
            <label for="gbr">Gambar : </label>
            <input type="file" class="form-control" id="gbr" name="gambar">
        </div> -->

          <div class="form-group">
            <label for="sng">Aksara Thai :</label>
            <input type="text" class="form-control" id="kata_thai" name="kata_thai">
        </div>


        <div class="form-group">
            <label for="sng">Mp3 Song :</label>
            <input type="file" class="form-control" id="sng" name="uploadSong">
        </div>

        <div class="form-group">
            <label for="sng">Keterangan :</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan">
        </div>

        <button type="submit" name='save' class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>
</div>
</section>