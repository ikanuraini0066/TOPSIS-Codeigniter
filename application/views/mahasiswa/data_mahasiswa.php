                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo base_url ('data_mahasiswa/tambah_mahasiswa') ?>" class="btn btn-primary btn-icon-split">
                                <span class="text">Tambah  Mahasiswa</span>
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
                                            <th>NIK</th>
                                            <th>alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                            foreach($mahasiswa as $mhs) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $mhs->id_mahasiswa ?></td>
                                                <td><?php echo $mhs->nama_mahasiswa ?></td>
                                                <td><?php echo $mhs->nik?></td>
                                                <td><?php echo $mhs->alamat ?></td>
                                            
                                                <td>
                                                    <a href="<?php echo base_url('data_mahasiswa/update_mahasiswa/').$mhs->id_mahasiswa ?>" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <a href="<?php echo base_url('data_mahasiswa/delete_mahasiswa/').$mhs->id_mahasiswa ?>" class="btn btn-danger btn-icon-split">
                                                        <span class="icon text-white-50"><i class="fas fa-trash"></i></span>
                                                    </a>
                                                    <!-- <a href="<?php echo base_url('data_mahasiswa/tambah_nilai/').$mhs->id_mahasiswa ?>" class="btn btn-primary btn-icon-split">
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