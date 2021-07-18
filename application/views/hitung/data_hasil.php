                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Perhitungan </h1>
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
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
                                            <th>Nilai</th>
                                            <th>Rangking</th>
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
                                                <td>
                                                    <a href="<?php echo base_url('data_hasil/hitung/').$mhs->id_mahasiswa ?>" class="btn btn-primary btn-icon-split">
                                                            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
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