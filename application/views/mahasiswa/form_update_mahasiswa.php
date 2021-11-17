
<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
            <div class="row">
               
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Update Data Mahasiswa</h1>
                        </div>
                        <?php foreach($mahasiswa as $mhs) : ?>
                        <form method="POST" action="<?php echo base_url('data_mahasiswa/update_mahasiswa_aksi') ?>">
                         <div class="form-group">
                                <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs->id_mahasiswa ?>">
                                <input type="text" name="nama_mahasiswa" class="form-control form-control-user" 
                                    placeholder="Nama mahasiswa" value="<?php echo $mhs->nama_mahasiswa?>">
                                    <?php echo form_error('nama_mahasiswa','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <!-- <div class="form-group">
                                <input type="number" name="nik" class="form-control form-control-user"
                                    placeholder="NIK" value="<?php echo $mhs->nik ?>">
                                    <?php echo form_error('nik','<div class="text-small text-danger">','</div>') ?>
                            </div> -->

                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control form-control-user"
                                    placeholder="alamat" value="<?php echo $mhs->alamat ?>">
                                    <?php echo form_error('alamat','<div class="text-small text-danger">','</div>') ?>
                            </div>
                           <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Keterangan">
                            </div> -->
                            <!-- <div class="form-group">
                                <select name="keterangan" class="form-control form-control-user">--Keterangan--
                                    <option value="">--Keterangan--</option>
                                    <?php foreach($mahasiswa as $mhs): ?>
                                        <option value="<?php echo $mhs->mahasiswa?> ">
                                        <?php echo $mhs->mahasiswa ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('mahasiswa','<div class="text-small text-danger">','</div>') ?>      
                            </div> -->
                            <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </form>
                        <?php endforeach; ?>  
                    </div>
                </div>
            </div>         
            <div class="col-md-3">
            
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