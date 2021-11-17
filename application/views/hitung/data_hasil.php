<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Perangkingan </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <?php echo $this->session->flashdata('pesan') ?>
        <div class="card-body">
            <div class="table-responsive">
                <div class='row'>
                    <div class='col-md-8'>
                <form>
                    <div class='btn-group'>
                        <input type='text' class='form-control' placeholder="Tahun" id='tahun' name='tahun'>
                        <button type='submit' class='btn btn-danger'>Filter</button>
                    </div>
                </form>
                    </div>
                    <div class='col-md-4' style='text-align:right;'>
                <a class='btn btn-success' href="<?= base_url('data_hasil/preferensi_pdf');?>"><i class='fa fa-print'></i> Cetak</a>
                    </div>
                </div>
                <br>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <h5> Hasil perangkingan<h5>
                                <tr>
                                    <th>Rangking</th>
                                    <th>Id Mahasiswa</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>nilai</th>

                                </tr>
                    </thead>

                    <tbody>
                        <?php

                        $no = 1;
                        foreach ($nilai_preferensi as $np) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $np['id_mahasiswa'] ?></td>
                                <td><?= $np['nama_mahasiswa'] ?></td>
                                <td><?= number_format($np['nilaipreferensi'], 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->