
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
                            <h1 class="h4 text-gray-900 mb-4">Tambah aturan</h1>
                        </div>
                        <form method="POST" action="<?php echo base_url('data_aturan/tambah_aturan_aksi') ?>">
                         <!-- <div class="form-group">
                                <input type="text" name="id_aturan" class="form-control form-control-user" 
                                    placeholder="Id aturan">
                                    <?php echo form_error('id_aturan','<div class="text-small text-danger">','</div>') ?>
                            </div> -->
                            <div class="form-group">
                            <label for="">Kriteria</label>
                                <select name="id_kriteria" class="form-control form-control">
                                    <option value="">--Kriteria--</option>
                                    <?php foreach($kriteria as $kr): ?>
                                        <option value="<?php echo $kr->id_kriteria?>">
                                        <?php echo $kr->nama_kriteria?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <input type="hidden" name="id_kriteria" value="<?php echo $kr->id_kriteria?>"> -->
                                <?php echo form_error('nama_kriteria','<div class="text-small text-danger">','</div>') ?>      
                            </div>
                        
                            <div class="form-group">
                                <input type="text" name="ket" class="form-control form-control-user" 
                                    placeholder="ket">
                                    <?php echo form_error('ket','<div class="text-small text-danger">','</div>') ?>
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
