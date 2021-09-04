<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url('data_siswa/add_siswa_aksi')?>"enctype="multipart/form-data">
                <div class="class row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" class="form-control">
                            <?php echo form_error('nama','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <!-- <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control">
                            <?php echo form_error('jk','<div class="text-small text-danger">','</div>')?>
                        </div> -->
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="text" name="sekolah" class="form-control">
                            <?php echo form_error('sekolah','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <!-- <div class="col-md-6">
                        <div class="form-grup">
                        <select class="form-select" size="3" aria-label="size 3 select example">
                            <option selected>Pilih Jurusan</option>
                            <option value="1">TKJ</option>
                            <option value="2">Multimedia</option>
                            <option value="3">Keramik</option>
                            <option value="4">Akuntansi</option>
                            <option value="5">Pemasaran</option>
                        </select>
                        </div>
                        </div> -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-3">Reset</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</div>