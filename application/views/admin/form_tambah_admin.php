
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
                            <h1 class="h4 text-gray-900 mb-4">Tambah admin</h1>
                        </div>
                        <form method="POST" action="<?php echo base_url('data_admin/tambah_admin_aksi') ?>">
                         <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-user" 
                                    placeholder="Username">
                                    <?php echo form_error('username','<div class="text-small text-danger">','</div>') ?>
                            </div>

                            <div class="form-group">
                                <input type="text" name="password" class="form-control form-control-user"
                                    placeholder="Password">
                                    <?php echo form_error('password','<div class="text-small text-danger">','</div>') ?>
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
