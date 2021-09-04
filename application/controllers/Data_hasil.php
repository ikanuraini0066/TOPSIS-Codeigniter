<?php
class Data_hasil extends CI_Controller {
	
    public function index()
    {
        
       $hasil=$this->beasiswa_model->pembagi();
       //insert data ke db temp
       for ($i=0; $i < count($hasil); $i++) { 
           $this->beasiswa_model->insert_data($hasil[$i],'tmp_pembagi');
       }
       die();

  
       $ternormalisasi=$this->beasiswa_model->Matrik_ternormalisasi();
        echo "<pre>"; print_r($ternormalisasi); die();

          for ($i=0; $i < count($ternormalisasi); $i++) { 
              $this->beasiswa_model->insert_data($ternormalisasi[$i],'tmp_ternormalisasi');
          }
          die();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/data_hasil',$data);
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

