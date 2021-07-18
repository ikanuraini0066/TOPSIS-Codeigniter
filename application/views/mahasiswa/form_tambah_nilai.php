
<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
            <div class="row">
               
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Nilai</h1>
                        </div>
                                              
                         <form method="POST" action="<?php echo base_url('data_mahasiswa/tambah_nilai_aksi') ?>">
                            <div class="form-group">
                            <?php foreach($mahasiswa as $mhs) :?>
                                <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs->id_mahasiswa ?>">
                                <input type="text" name=" nama_mahasiswa" class="form-control" value="<?php echo $mhs-> nama_mahasiswa ?>" readonly>
                            <?php endforeach?>     
                            </div>

                            <!-- <div class="form-group">
                                <select name="kriteria" class="form-control form-control-user">--kriteria--
                                    <option value="">--Kriteria--</option>
                                    <?php foreach($kriteria as $kr): ?>
                                        <option value="<?php echo $kr->nama_kriteria?>">
                                        <?php echo $kr->nama_kriteria?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('nama_kriteria','<div class="text-small text-danger">','</div>') ?>      
                            </div> -->
                            <div class="form-group">
                                <input type="number" name="nilai" class="form-control form-control-user"
                                    placeholder="Nilai">
                                    <?php echo form_error('nilai','<div class="text-small text-danger">','</div>') ?>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </form>
                    </div>
                </div>
            </div>
           
            </form>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>
