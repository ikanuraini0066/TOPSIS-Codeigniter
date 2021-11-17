<link href="../assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

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
                                <h1 class="h4 text-gray-900 mb-4">Tambah Nilai</h1>
                            </div>
                            <?php echo $this->session->flashdata('pesan') ?>

                            <form method="POST" action="<?php echo base_url('data_nilai/tambah_nilai_aksi') ?>">
                                <!--<div class="form-group">
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs->id_mahasiswa ?>">
                                <input type="text" name=" nama_mahasiswa" class="form-control" value="<?php echo $mhs->nama_mahasiswa ?>" readonly>
                            <?php endforeach ?>     
                            </div> -->

                                <div class="form-group">
                                    <label for="">Tahun</label>
                                    <input type="text" name="tahun" class='form-control datepicker' id='tahun'>
                                    <?php echo form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Mahasiswa</label>
                                    <select name="id_mahasiswa" class="form-control">
                                        <option value="">--mahasiswa--</option>
                                        <?php foreach ($mahasiswa as $mhs) : ?>
                                            <option value="<?php echo $mhs->id_mahasiswa ?>">
                                                <?php echo $mhs->nama_mahasiswa ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs->id_mahasiswa ?>"> -->
                                    <?php echo form_error('nama_mahasiswa', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Kriteria</label>
                                    <select name="id_kriteria" class="form-control form-control">
                                        <option value="">--Kriteria--</option>
                                        <?php foreach ($kriteria as $kr) : ?>
                                            <option value="<?php echo $kr->id_kriteria ?>">
                                                <?php echo $kr->nama_kriteria ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <input type="hidden" name="id_kriteria" value="<?php echo $kr->id_kriteria ?>"> -->
                                    <?php echo form_error('nama_kriteria', '<div class="text-small text-danger">', '</div>') ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="nilai" class="form-control form-control-user" placeholder="Nilai">
                                    <?php echo form_error('nilai', '<div class="text-small text-danger">', '</div>') ?>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                                <button type="reset" class="btn btn-danger mt-4">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
                </form>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script>
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    </script>