<div class="box">
         <div class="box-header">
             <h3 class="box-title">Data Users</h3>
             <div class="pull-right">
                 <!-- <a href="<?= site_url('user/add') ?>" class="btn btn-primary btn-flat">
                     <i class="fa fa-fw fa-user-plus"></i>Tambah User
                 </a> -->
             </div>
         </div>
         <div class="box-body table-responsive">
             <table class="table table-bordered table striped table-hover">
                 <thead>
                     <tr>
                         <th>No</th>
                         <th>Username</th>
                         <th>Nama Depan</th>
                         <th>Nama Belakang</th>
                         <th>Email</th>
                         <th>No HP</th>
                         <th>Terakhir Login</th>
                         <th>Level</th>
                         <th class="text-center">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                         <tr>
                             <td><?= $no++ ?></td>
                             <td><?= $data->username ?></td>
                             <td><?= $data->first_name ?></td>
                             <td><?= $data->last_name ?></td>
                             <td><?= $data->email ?></td>
                             <td><?= $data->phone ?></td>
                             <td><?= $data->last_login ?></td>
                             <td>
                                 <?php 
                                 if ($data->id_role == 1){
                                      echo "Admin";
                                 }
                                 else if($data->id_role == 2){
                                      echo "Member";
                                 }
                        
                                 ?>
                                 </td>
                             <td class="text-center" width="160px">
                                 <form action="<?= site_url('user/del') ?>" method="post">
                                     <!-- <a href="<?= site_url('user/edit/' . $data->id) ?>" class="btn btn-primary btn-xs">
                                         <i class="fa fa-fw fa-pencil"></i>Ubah
                                     </a> -->
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