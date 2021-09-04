<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Data Siswa</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <?php foreach ($siswa as $sw) : ?>
                <form method="POST" action="<?php echo base_url('data_siswa/update_siswa_aksi')?>"enctype="multipart/form-data">
                <div class="class row">
                    <div class="col-md-6">
                        <input type="text" name="id_siswa" value="<?= $sw->id_siswa?>" hidden>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $sw->nama?>">
                            <?php echo form_error('nama','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control" type="text" value="<?php echo $sw->jk?>">
                                <option value="L">Laki - laki</option>
								<option value="P">Perempuan</option>
                            </select>
                            <?php echo form_error('jk','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $sw->no_telp?>">
                            <?php echo form_error('no_telp','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Asal Sekolah</label>
                            <input type="sekolah" name="sekolah" class="form-control" value="<?php echo $sw->sekolah?>">
                            <?php echo form_error('sekolah','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Jurusan</label>
                            <select name="jurusan" class="form-control" type="text" value="<?php echo $sw->jurusan?>">
                                    <option value="TKJ">TKJ</option>
                                    <option value="Multimedia">Multimedia</option>
                                    <option value="Keramik">Keramik</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Pemasaran">Pemasaran</option>
                            </select>
                            <?php echo form_error('jurusan','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="alamat" name="alamat" class="form-control"value="<?php echo $sw->alamat?>">
                            <?php echo form_error('alamat','<div class="text-small text-danger">','</div>')?>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-3">Reset</button>
                    </div>
                </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>