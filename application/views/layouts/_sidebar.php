<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); ?>" class="img-circle">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('username') ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->

    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <!-- Optionally, you can add icons to the links -->
      <?php
      if ($userdata->id_role == "1") {
      ?>
        <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?= site_url('user') ?>"><i class="fa fa-user"></i> <span>User</span></a></li>
        <!-- <li><a href="<?= site_url('video') ?>"><i class="fa fa-video-camera"></i> <span>Video</span></a></li> -->
        <li><a href="<?= site_url('latihan') ?>"><i class="fa fa-chrome"></i> <span>Data Latihan</span></a></li>
        <li><a href="<?= site_url('soal') ?>"><i class="fa fa-book"></i> <span>Data Soal</span></a></li>
        <!-- <li><a href="<?= site_url('hasillatihan') ?>"><i class="fa fa-book"></i> <span>Hasil Latihan</span></a></li> -->

      <?php } else { ?>
        <li><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url() ?>auth/profile/<?php echo $this->session->userdata('id_user'); ?>"><i class="fa fa-user"></i> <span>Profil</span></a></li>
        <li><a href="<?= site_url('soal/user') ?>"><i class="fa fa-chrome"></i> <span>Latihan</span></a></li>

      <?php } ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>