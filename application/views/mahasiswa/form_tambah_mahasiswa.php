
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
                            <h1 class="h4 text-gray-900 mb-4">Tambah Mahasiswa</h1>
                        </div>
                        <form method="POST" action="<?php echo base_url('data_mahasiswa/tambah_mahasiswa_aksi') ?>">

                            <div class="form-group">
                                <input type="text" name="id_mahasiswa" class="form-control form-control-user"
                                    placeholder="Id Mahasiswa">
                                    <?php echo form_error('id_mahasiswa','<div class="text-small text-danger">','</div>') ?>
                            </div>

                         <div class="form-group">
                                <input type="text" name="nama_mahasiswa" class="form-control form-control-user" 
                                    placeholder="Nama Mahasiswa">
                                    <?php echo form_error('nama_mahasiswa','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <input type="number" name="nik" class="form-control form-control-user"
                                    placeholder="NIK">
                                    <?php echo form_error('nik','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control form-control-user"
                                    placeholder="Alamat">
                                    <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <!-- <div class="form-group">
                                <select name="keterangan" class="form-control form-control-user">--Keterangan--
                                    <option value="">--Keterangan--</option>
                                    <option value="cost">Cost</option>
                                    <option value="benefit">Benefit</option>
                                </select>  
                                <?php echo form_error('keterangan','<div class="text-small text-danger">','</div>') ?>    
                            </div> -->

                           <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Keterangan">
                            </div> -->
                            <!-- <div class="form-group">
                                <select name="keterangan" class="form-control form-control-user">--Keterangan--
                                    <option value="">--Keterangan--</option>
                                    <?php foreach($kriteria as $kr): ?>
                                        <option value="<?php echo $kr->keterangan?> ">
                                        <?php echo $kr->keterangan ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('keterangan','<div class="text-small text-danger">','</div>') ?>      
                            </div> -->
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
