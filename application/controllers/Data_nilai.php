<?php
class Data_nilai extends CI_Controller {
	
    public function index()
    {
        
        // $data['nilai']= $this->beasiswa_model->get_data('nilai')->result();
        // $data['mahasiswa']= $this->beasiswa_model->get_data('mahasiswa')->result();
        // $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
        $data['nilai']= $this->beasiswa_model->get_datanilai();

        

       

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/data_nilai',$data);
        $this->load->view('templates/footer');
    }


    public function tambah_nilai()
	{
        $data['mahasiswa']= $this->beasiswa_model->get_data('mahasiswa')->result();
        $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
		$this->load->view('hitung/form_input_nilai',$data);
        $this->load->view('templates/footer');
	}
    public function tambah_nilai_aksi()
    {
        $this->_rules();

        $tahun       = $this->input->post('tahun');
            $id_mahasiswa       = $this->input->post('id_mahasiswa');
            $id_kriteria        = $this->input->post('id_kriteria');
            $nilai              = $this->input->post('nilai');
        $cek = $this->db->query("select * from nilai where id_mahasiswa='$id_mahasiswa' and id_kriteria='$id_kriteria' and tahun='$tahun'")->num_rows();

        if($this->form_validation->run()== FALSE){
            $this->tambah_nilai();
        }elseif($cek > 0){
            $this->tambah_nilai();
            $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Gagal.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        }else{
            
        $data = array(
            'id_mahasiswa'      =>$id_mahasiswa,
            'id_kriteria'       =>$id_kriteria,
            'nilai'             =>$nilai,
            'tahun'             =>$tahun,
        );
    
        $this->beasiswa_model->insert_data($data,'nilai');
        $this->session->set_flashdata('pesan','<div class="alert alert-success
        alert-dismissible fade show" role="alert">
         Peilaian Berhasil!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_nilai');
        }
    }

    public function update_nilai($id)
    {
        $where = array('id_nilai' => $id);
        $data['nilai'] = $this->db->query("SELECT * FROM nilai WHERE id_nilai = '$id'")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('hitung/form_update_nilai',$data);
        $this->load->view('templates/footer');
    }

    public function update_nilai_aksi()
    {
       
                 $id                 = $this->input->post('id_nilai');
                // $id_mahasiswa       = $this->input->post('id_mahasiswa');
                // $nama_mahasiswa     = $this->input->post('nama_mahasiswa');
                // $id_kriteria        = $this->input->post('id_kriteria');
                // $nama_kriteria      = $this->input->post('nama_kriteria');
                $nilai              = $this->input->post('nilai');       
          
          $data = array(
            //   'id_mahasiswa'        =>$id_mahasiswa,
            //   'nama_mahasiswa'    =>$nama_mahasiswa,
            //   'id_kriteria'         =>$id_kriteria,
            //   'nama_kriteria'     =>$nama_kriteria,
              'nilai'               =>$nilai,
          );
          $where = array (
              'id_nilai' =>$id
          );

        //   print_r($data);
          $this->beasiswa_model->update_data('nilai',$data,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success
          alert-dismissible fade show" role="alert">
          Data Berhasil DiUpdate!.
          <button type="button" class="close" date-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('data_nilai');
        // }
    }
    
    public function _rules()
    {
        $this->form_validation->set_rules('id_mahasiswa','id_mahasiswa','required');
        $this->form_validation->set_rules('id_kriteria','id_kriteria','required');
        $this->form_validation->set_rules('nilai','nilai','required');

    }

    public function delete_nilai($id)
    {
        $where = array('id_nilai' => $id);
        $this ->beasiswa_model->delete_data($where,'nilai');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Data Nilai Berhasil DiHapus!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_nilai');
    }

}
