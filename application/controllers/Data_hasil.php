<?php
class Data_hasil extends CI_Controller {
	
    public function index()
    {
        
    //    $hasil=$this->beasiswa_model->pembagi();
    //    //insert data ke db temp
    //    for ($i=0; $i < count($hasil); $i++) { 
    //        $this->beasiswa_model->insert_data($hasil[$i],'tmp_pembagi');
    //    }
    //    die();

  
    //    $ternormalisasi=$this->beasiswa_model->Matrik_ternormalisasi();
    //     echo "<pre>"; print_r($ternormalisasi); die();

    //       for ($i=0; $i < count($ternormalisasi); $i++) { 
    //           $this->beasiswa_model->insert_data($ternormalisasi[$i],'tmp_ternormalisasi');
    //       }
    //       die();


    //mulai mencoba 1
    $sql = 'SELECT * FROM kriteria';
    $result=$this->db->query($sql)->result_array();
    //-- menyiapkan variable penampung berupa array
    $kriteria=array();
    $bobot=array();
    //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
    foreach ($result as $row) {
        $kriteria[$row['id_kriteria']]=array($row['nama_kriteria'],$row['keterangan']);
        $bobot[$row['id_kriteria']]=$row['keterangan'];
    }

    //langkah ke 2
    $sql = 'SELECT * FROM mahasiswa';
    $result=$this->db->query($sql)->result_array();
    //-- menyiapkan variable penampung berupa array
    $mahasiswa=array();
    //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
    foreach ($result as $row) {
        $mahasiswa[$row['id_mahasiswa']]=$row['nama_mahasiswa'];
    }

    //langkah ke 3 
    //-- query untuk mendapatkan semua data sample penilaian di tabel top_sample
    $sql = 'SELECT * FROM nilai ORDER BY id_mahasiswa,id_kriteria';
    $result=$this->db->query($sql)->result_array();
    // $result = $this->db->query($sql);
    //-- menyiapkan variable penampung berupa array
    $sample=array();
    //-- melakukan iterasi pengisian array untuk tiap record data yang didapat
    foreach ($result as $row) {
        //-- jika array $sample[$row['id_alternatif']] belum ada maka buat baru
        //-- $row['id_alternatif'] adalah id kandidat/alternatif
        if (!isset($sample[$row['id_mahasiswa']])) {
            $sample[$row['id_mahasiswa']] = array();
        }
        $sample[$row['id_mahasiswa']][$row['id_kriteria']] = $row['nilai'];
    }
    //-- menjadikan data $sample sebagai matrik keputusan $X
    //langkah ke 4
    $X=$sample;
    //-- melakukan iterasi utk setiap alternatif
    foreach ($X as $id_mahasiswa=>$a_kriteria) {
        echo "<tr>";
        //-- melakukan iterasi utk setiap kriteria
        foreach($a_kriteria as $id_kriteria=>$nilai){
            echo "<td>{$nilai}</td><br>";
        }
        echo "</tr>";
    }

    //langkah ke 5
    
    //-- inisialisasi array pembagi
    $pembagi=array();
    //-- melakukan iterasi utk setiap kriteria
    foreach($kriteria as $id_kriteria=>$value){
        $pembagi[$id_kriteria]=0;
        //-- melakukan iterasi utk setiap alternatif
        foreach($mahasiswa as $id_mahasiswa=>$a_value){
            $pembagi[$id_kriteria]=pow($X[$id_mahasiswa][$id_kriteria],2);
        }
    }
    //-- inisialisasi matrik Normalisasi R
    $R=array();
    //-- melakukan iterasi utk setiap masiswa
    foreach($X as $id_mahasiswa=>$a_kriteria) {
        $R[$id_mahasiswa]=array();
        //-- melakukan iterasi utk setiap kriteria
        foreach($a_kriteria as $id_kriteria=>$nilai){
            $R[$id_mahasiswa][$id_kriteria]=$nilai/sqrt($pembagi[$id_kriteria]);
        }
    }        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/data_hasil');
        $this->load->view('templates/footer');
 //json_endcode($pembagi);
    // }


    // public function ternormalisasi()
    // {
    // $ternormalisasi=$this->beasiswa_model->Matrik_ternormalisasi();
    // // insert data ke db temp
       
    //    for ($i=0; $i < count($ternormalisasi); $i++) { 
    //        $this->beasiswa_model->insert_data($ternormalisasi[$i],'tmp_ternormalisasi');
    //    }
    //    die();
    // }
    
    
}
}

?>

