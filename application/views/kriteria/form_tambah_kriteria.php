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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Kriteria</h1>
                            </div>
                            <form method="POST" action="<?php echo base_url('data_kriteria/tambah_kriteria_aksi') ?>">
                                <div class="form-group">
                                    <input type="text" name="id_kriteria" class="form-control form-control-user" placeholder="Id Kriteria">
                                    <?php echo form_error('id_kriteria', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama_kriteria" class="form-control form-control-user" placeholder="Nama Kriteria">
                                    <?php echo form_error('nama_kriteria', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <input type="number" name="bobot_kriteria" class="form-control form-control-user" placeholder="Bobot Kriteria">
                                    <?php echo form_error('bobot_kriteria', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <select name="keterangan" class="form-control form-control-user">--Keterangan--
                                        <option value="">--Keterangan--</option>
                                        <option value="cost">Cost</option>
                                        <option value="benefit">Benefit</option>
                                    </select>
                                    <?php echo form_error('keterangan', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
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