<div class="box">
         <div class="box-header">
             <h3 class="box-title">Data Alfabet</h3>
             <div class="pull-right">
                 <a href="<?= site_url('alfabet/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-fw fa-user-plus"></i>Tambah Huruf
                 </a>
             </div>
         </div>
         <div class="box-body table-responsive">
             <table class="table table-bordered table striped table-hover">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Gambar</th>
                         <th>File Suara</th>
                         <th>Huruf</th>
                         <th>Kategori</th>
                         <th>Keterangan</th>
                         <th class="text-center">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/uploads/images/alfabet/'.$data->gambar); ?>" style="width:60px; height:60px"></td>
                             <td>
                                <audio controls> 
                                    <source src="<?= site_url('assets/uploads/images/alfabet/'.$data->suara); ?>" type="audio/mpeg">
                                </audio></td>
                             <td><?= $data->judul ?></td>
                             <td><?= $data->kategori ?></td>
                             <td><?= $data->keterangan ?></td>
                             <td class="text-center" width="160px">
                                 <form action="<?= site_url('alfabet/del') ?>" method="post">
                                     <a href="<?= site_url('alfabet/edit/' . $data->id) ?>" class="btn btn-primary btn-xs">
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