<?php
class Data_hasil extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->library("pdf");
    }
    public function index()
    {
        $this->db->truncate('tmp_pembagi');
        $this->db->truncate('tmp_ternormalisasi');
        $this->db->truncate('tmp_ternormalisasi_terbobot');
        $this->db->truncate('tmp_ideal_negatif');
        $this->db->truncate('tmp_ideal_positif');
        $this->db->truncate('tmp_max');
        $this->db->truncate('tmp_min');
        $this->db->truncate('tmp_preferensi');
        // $this->db->truncate('tmp_pangkat');
       
        @$tahun = $_GET['tahun'];
        if($tahun == ""){
            $tahun = date("Y");
        }
       
        
        // start
        //  $hasil = $this->beasiswa_model->jml_mahasiswa();
        //  for ($i=0; $i < count($hasil); $i++)
            
    //     $pangkat=$this->beasiswa_model->Pangkat();

    //     for ($i=0; $i < count($pangkat); $i++) { 
    //         $this->beasiswa_model->insert_data($pangkat[$i],'tmp_max');
    //    }

        //end
       $hasil=$this->beasiswa_model->pembagi($tahun);
       //insert data ke db temp
       for ($i=0; $i < count($hasil); $i++) { 
           $this->beasiswa_model->insert_data($hasil[$i],'tmp_pembagi');
       }

       $ternormalisasi=$this->beasiswa_model->Matrik_ternormalisasi($tahun);

          for ($i=0; $i < count($ternormalisasi); $i++) { 
              $this->beasiswa_model->insert_data($ternormalisasi[$i],'tmp_ternormalisasi');
          }

       $terbobot=$this->beasiswa_model->Ternormalisasi_terbobot();

          for ($i=0; $i < count($terbobot); $i++) { 
              $this->beasiswa_model->insert_data($terbobot[$i],'tmp_ternormalisasi_terbobot');
       }

       $nilai_max_b=$this->beasiswa_model->Nilai_Max_b();

       for ($i=0; $i < count($nilai_max_b); $i++) { 
           $this->beasiswa_model->insert_data($nilai_max_b[$i],'tmp_max');
      }


      $nilai_max_c=$this->beasiswa_model->Nilai_Max_c();

      for ($i=0; $i < count($nilai_max_c); $i++) { 
          $this->beasiswa_model->insert_data($nilai_max_c[$i],'tmp_max');
     }


     $nilai_min_b=$this->beasiswa_model->Nilai_Min_b();

     for ($i=0; $i < count($nilai_min_b); $i++) { 
         $this->beasiswa_model->insert_data($nilai_min_b[$i],'tmp_min');
    }


    $nilai_min_c=$this->beasiswa_model->Nilai_Min_c();

    for ($i=0; $i < count($nilai_min_c); $i++) { 
        $this->beasiswa_model->insert_data($nilai_min_c[$i],'tmp_min');
   }

   $nilai_dplus=$this->beasiswa_model->Nilai_Dplus();

   for ($i=0; $i < count($nilai_dplus); $i++) { 
       $this->beasiswa_model->insert_data($nilai_dplus[$i],'tmp_ideal_positif');
  }

  $nilai_dmin=$this->beasiswa_model->Nilai_Dmin();

  for ($i=0; $i < count($nilai_dmin); $i++) { 
      $this->beasiswa_model->insert_data($nilai_dmin[$i],'tmp_ideal_negatif');
 }  
 
 $nilai_preferensi=$this->beasiswa_model->Nilai_Preferensi();

 for ($i=0; $i < count($nilai_preferensi); $i++) { 
     $this->beasiswa_model->insert_data($nilai_preferensi[$i],'tmp_preferensi');
}

		$data['pembagi'] = $hasil;
		$data['nilai'] = $ternormalisasi;
		$data['terbobot'] = $terbobot;
		$data['nilai_max_b'] = $nilai_max_b;
		$data['nilai_max_c'] = $nilai_max_c;		
        $data['nilai_min_b'] = $nilai_min_b;
		$data['nilai_min_c'] = $nilai_min_c;
		$data['nilai_dplus'] = $nilai_dplus;	
        $data['nilai_dmin'] = $nilai_dmin;
        $data['nilai_preferensi'] = $nilai_preferensi;


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/data_hasil',$data);
        $this->load->view('templates/footer');
 //json_endcode($pembagi);
    }

    function preferensi_pdf(){
        $this->load->view("hitung/preferensi_pdf");
    }
}
