                 <!-- Begin Page Content -->
                 <div class="container-fluid">

                     <!-- Page Heading -->
                     <h1 class="h3 mb-2 text-gray-800">Aturan Penilaian</h1>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                         <div class="card-header py-3">
                             <a href="<?php echo base_url('data_aturan/tambah_aturan') ?>" class="btn btn-primary btn-icon-split">
                                 <span class="text">Tambah Aturan</span>
                             </a>
                         </div>

                         <?php echo $this->session->flashdata('pesan') ?>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <!-- <th>Id Aturan</th> -->
                                             <th>Id Kriteria</th>
                                             <th>Nama Kriteria</th>
                                             <th>Aturan Pengisian</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 1;
                                            foreach ($aturan as $atr) : ?>
                                             <tr>
                                                 <td><?php echo $no++ ?></td>
                                                 <!-- <td><?php echo $atr->id_aturan ?></td> -->
                                                 <td><?php echo $atr->id_kriteria ?></td>
                                                 <td><?php echo $atr->nama_kriteria ?></td>
                                                 <td><?php echo $atr->ket ?></td>

                                                 <td>
                                                     <a href="<?php echo base_url('data_aturan/update_aturan/') . $atr->id_aturan ?>" class="btn btn-primary btn-icon-split">
                                                         <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                     </a>
                                                     <a href="<?php echo base_url('data_aturan/delete_aturan/') . $atr->id_aturan ?>" class="btn btn-danger btn-icon-split">
                                                         <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                                     </a>
                                                     <!-- <a href="<?php echo base_url('data_mahasiswa/tambah_nilai/') . $n->id_nilai ?>" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                </a> -->
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>

                 </div>
                 <!-- /.container-fluid -->

                 </div>
                 <!-- End of Main Content -->