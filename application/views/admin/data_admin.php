                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Admin</h1>
        
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="<?php echo base_url ('data_admin/tambah_admin') ?>" class="btn btn-primary btn-icon-split">
                                <span class="text">Tambah Admin</span>
                            </a>
                        </div>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Admin</th>
                                            <th>Username</th>
                                            <!-- <th>Password</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no=1;
                                            foreach($admin as $ad) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $ad->id_admin ?></td>
                                                <td><?php echo $ad->username ?></td>
                                                <!-- <td><?php echo $ad->password?></td> -->
                                                <td>
                                                    <a href="<?php echo base_url('data_admin/update_admin/').$ad->id_admin ?>" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
                                                    </a>
                                                    <a href="<?php echo base_url('data_admin/delete_admin/').$ad->id_admin ?>" class="btn btn-danger btn-icon-split">
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