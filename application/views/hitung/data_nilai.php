                 <!-- Begin Page Content -->
                 <div class="container-fluid">

                     <!-- Page Heading -->
                     <h1 class="h3 mb-2 text-gray-800">Data nilai</h1>

                     <!-- DataTales Example -->
                     <div class="card shadow mb-4">
                         <div class="card-header py-3">
                             <a href="<?php echo base_url('data_nilai/tambah_nilai') ?>" class="btn btn-primary btn-icon-split">
                                 <span class="text">Tambah Nilai</span>
                             </a>
                             <a href="<?php echo base_url('data_aturan') ?>" class="btn btn-warning btn-icon-split">
                                 <span class="text">Aturan Penilaian</span>
                             </a>
                         </div>

                         <?php echo $this->session->flashdata('pesan') ?>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Id Mahasiswa</th>
                                             <th>Nama Mahasiswa</th>
                                             <th>Id Kriteria</th>
                                             <th>Nama Kkriteria</th>
                                             <th>Nilai</th>
                                             <th>Tahun</th>
                                             <th>Aksi</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $no = 1;
                                            foreach ($nilai as $n) : ?>
                                             <tr>
                                                 <td><?php echo $no++ ?></td>
                                                 <td><?php echo $n->id_mahasiswa ?></td>
                                                 <td><?php echo $n->nama_mahasiswa ?></td>
                                                 <td><?php echo $n->id_kriteria ?></td>
                                                 <td><?php echo $n->nama_kriteria ?></td>
                                                 <td><?php echo $n->nilai ?></td>
                                                 <td><?php echo $n->tahun ?></td>

                                                 <td>
                                                     <a href="<?php echo base_url('data_nilai/update_nilai/') . $n->id_nilai ?>" class="btn btn-primary btn-icon-split">
                                                         <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                     </a>
                                                     <a href="<?php echo base_url('data_nilai/delete_nilai/') . $n->id_nilai ?>" class="btn btn-danger btn-icon-split">
                                                         <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                                     </a>
                                                     
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