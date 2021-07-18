<?php
class Data_hasil extends CI_Controller {
	
    public function index()
    {
        $data['mahasiswa']= $this->beasiswa_model->get_data('mahasiswa')->result();
        $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
        $data['nilai']= $this->beasiswa_model->get_data('nilai')->result();

       

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/data_hasil',$data);
        $this->load->view('templates/footer');

    }

    public function hitung()
    {
        $data['mahasiswa'] = $this->beasiswa_model->get_data('mahasiswa')->result();
        $data['kriteria'] = $this->beasiswa_model->get_data('kriteria')->result(); 
        

        foreach($data['kriteria'] as $k){
            $id_kriteria =$k['id_kriteria'];
            //nilai pembagi
            $data ['nilai'] = $this->beasiswa_model->get_Nilai($id_kriteria);
            $pembagi = 0;
            foreach ($data['mahasiswa'] as $mhs){
                $id_mahasiswa = $mhs['id_mahasiswa'];
                $data['nilai2'] = $this->beasiswa_model->get_Nilai2($id_kriteria,$id_mahasiswa);
                $nilai = number_format(pow($data['nilai2']['nilai'],2),3);
                $pembagi = $pembagi + $nilai;
            }
            $pembagi = number_format(sqrt($pembagi),6);
        }

    }
    
    
}


?>

