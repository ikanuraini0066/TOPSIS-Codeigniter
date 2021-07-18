                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Kriteria</h1>
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo base_url ('data_kriteria/tambah_kriteria') ?>" class="btn btn-primary btn-icon-split">
                                <span class="text">Tambah Kriteria</span>
                            </a>
                        </div>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kriteria</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                            foreach($kriteria as $kr) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $kr->id_kriteria ?></td>
                                                <td><?php echo $kr->nama_kriteria ?></td>
                                                <td><?php echo $kr->bobot_kriteria?></td>
                                                <td><?php echo $kr->keterangan ?></td>
                                                <td>
                                                    <a href="<?php echo base_url('data_kriteria/update_kriteria/').$kr->id_kriteria ?>" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <a href="<?php echo base_url('data_kriteria/delete_kriteria/').$kr->id_kriteria ?>" class="btn btn-danger btn-icon-split">
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