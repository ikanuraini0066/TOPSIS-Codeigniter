                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Perhitungan </h1>
       
                    
                    <!-- DataTales Example -->
                    <!-- <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <h5> Nilai Pembagi<h5>
                                        <tr>
                                            <th>No</th>
                                            <th> Id Kriteria</th>
                                            <th>nilai pembagi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $no=1;
                                          foreach ($pembagi as $i): ?>
                                          <tr>
                                              <td><?php echo $no++?></td>
                                              <td><?php echo $i->id_kriteria?></td>
                                              <td><?php echo $i->pembagi?></td>
                                                
                                          </tr>                                          
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                        <h5> Nilai <h5>
                                        <tr>
                                            <th>No</th>
                                            <th>Id Kriteria</th>
                                            <th>Id Mahasiswa</th>
                                            <th>nilai</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php 
                                        $no=1;
                                          foreach ($nilai as $n): ?>
                                          <tr>
                                              <td><?php echo $no++?></td>
                                              <td><?php echo $n->id_kriteria?></td>
                                              <td><?php echo $n->id_mahasiswa?></td>
                                              <td><?php echo $n->nilai?></td>
                                          </tr>                                          
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->