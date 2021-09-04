<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Siswa</h1>
        </div>

        <a href="<?php echo base_url ('data_siswa/add_siswa')?>" class="btn btn-primary mb-3">Tambah Data</a>
        
        <?php echo $this->session->flashdata('pesan')?>
        
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>JK</th>
                    <th>no hp</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                foreach($siswa as $sw) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $sw->nama ?></td>
                    <td><?php echo $sw->jk ?></td>
                    <td><?php echo $sw->no_telp ?></td>
                    <td><?php echo $sw->sekolah ?></td>
                    <td><?php echo $sw->alamat ?></td>
                    <td>
                        <a href="<?php echo base_url('data_siswa/delete_siswa/').$sw->id_siswa?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="<?php echo base_url('data_siswa/update_siswa/').$sw->id_siswa?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                    </td>
                </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>

    </section>
</div>