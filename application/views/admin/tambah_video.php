<section class="content">
<div class="box">
<div class="box-body">
    <?php echo form_open('',array('method'=>"post",'enctype'=>"multipart/form-data")); ?>
        <div class="col-md-offset-4 col-md-4 col-md-offset-4">
        <?php if(!empty($error)){ echo "<div class='hidediv error'>$error</div>";   } ?> 
        <?php if(!empty($success)){ echo "<div class='alert alert-success'>$success</div>";   } ?>

        <div class="form-group <?= form_error('judul') ? 'has-error' : null ?>">
            <label for="judul">Judul Video : </label>
            <input type="text" class="form-control" id="judul" name="judul">
            <?= form_error('judul') ?>
        </div>

        <div class="form-group">
            <label for="video">Video : </label>
            <input type="file" class="form-control" id="video" name="video">
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