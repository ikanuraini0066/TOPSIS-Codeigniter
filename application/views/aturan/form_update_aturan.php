
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
                            <h1 class="h4 text-gray-900 mb-4">Form Update Data Aturan</h1>
                        </div>
                        <?php foreach($aturan as $atr) : ?>
                        <form method="POST" action="<?php echo base_url('data_aturan/update_aturan_aksi') ?>">
                         <div class="form-group">
                                <input type="hidden" name="id_aturan" value="<?php echo $atr->id_aturan ?>">
                                <input type="text" name="nama_kriteria" class="form-control form-control-user" 
                                    placeholder="nama_kriteria" value="<?php echo $atr->id_kriteria?>"readonly>
                                    <?php echo form_error('nama_kriteria','<div class="text-small text-danger">','</div>') ?>
                            </div>


                            
                            <div class="form-group">
                                <input type="rext" name="ket" class="form-control form-control-user"
                                    placeholder="ket" value="<?php echo $atr->ket ?>">
                                    <?php echo form_error('ket','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                            <button type="reset" class="btn btn-danger mt-3">Reset</button>
                            </form>
                        <?php endforeach; ?>  
                    </div>
                </div>
            </div>         
            
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