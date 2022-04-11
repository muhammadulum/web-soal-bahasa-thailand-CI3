<div class="box">
         <div class="box-header">
             <h3 class="box-title">Data Videos</h3>
             <div class="pull-right">
                 <a href="<?= site_url('video/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-fw fa-user-plus"></i>Tambah Video
                 </a>
             </div>
         </div>
         <div class="box-body table-responsive">
             <table class="table table-bordered table striped table-hover">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Judul Video</th>
                         <th>File Video</th>
                         <th>Keterangan</th>
                         <th class="text-center">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $data->judul_video ?></td>
                             <td>
                                <video width="220" height="140" controls>
                                    <source src="<?= site_url('assets/uploads/video/'.$data->file);?>" type='video/mp4'>
                                    Your browser does not support the video tag.
                                </video>
                             </td>
                             <td><?= $data->keterangan ?></td>
                             <td class="text-center" width="160px">
                                 <form action="<?= site_url('video/del') ?>" method="post">
                                     <a href="<?= site_url('video/edit/' . $data->id) ?>" class="btn btn-primary btn-xs">
                                         <i class="fa fa-fw fa-pencil"></i>Ubah
                                     </a>
                                     <input type="hidden" name="id" value="<?= $data->id ?>">
                                     <button onclick="return confirm('Apakah Anda yakin ?')" class="btn btn-danger btn-xs">
                                         <i class="fa fa-fw fa-trash"></i>Hapus
                                     </button>
                                 </form>
                             </td>
                         </tr>
                     <?php
                        } ?>
                 </tbody>
             </table>
         </div>
     </div>