<?php
 
class Data_mahasiswa extends CI_Controller {

	
	public function index()
	{        
        $data['mahasiswa']= $this->beasiswa_model->get_data('mahasiswa')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('mahasiswa/data_mahasiswa',$data);
		$this->load->view('templates/footer');
	}

    public function tambah_mahasiswa()
    {
    $data['mahasiswa']= $this->beasiswa_model->get_data('mahasiswa')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('mahasiswa/form_tambah_mahasiswa',$data);
    $this->load->view('templates/footer');
    }

    public function tambah_mahasiswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambah_mahasiswa();
        }else{
            $id_mahasiswa      = $this->input->post('id_mahasiswa');
            $nama_mahasiswa    = $this->input->post('nama_mahasiswa');
            $nik               = $this->input->post('nik');
            $alamat            = $this->input->post('alamat');
           
        $data = array(
            
            'id_mahasiswa'       =>$id_mahasiswa,
            'nama_mahasiswa'     =>$nama_mahasiswa,
            'nik'                =>$nik,
            'alamat'             =>$alamat,
            
        );
    
        $this->beasiswa_model->insert_data($data,'mahasiswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-success
        alert-dismissible fade show" role="alert">
        Data Mahasiswa Berhasil Ditambahkan!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_mahasiswa');
        }
    }

    public function update_mahasiswa($id)
    {
        $where = array('id_mahasiswa' => $id);
        $data['mahasiswa'] = $this->db->query("SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa/form_update_mahasiswa',$data);
        $this->load->view('templates/footer');
    }

    public function update_mahasiswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update_mahasiswa();
        }else{
                $id                 = $this->input->post('id_mahasiswa');
                // $kode_mahasiswa     = $this->input->post('kode_mahasiswa');
                $nama_mahasiswa    = $this->input->post('nama_mahasiswa');
                $nik               = $this->input->post('nik');
                $alamat            = $this->input->post('alamat');
    
            $data = array(
                
                // 'kode_mahasiswa'     =>$kode_mahasiswa,
                'nama_mahasiswa'     =>$nama_mahasiswa,
                'nik'                =>$nik,
                'alamat'             =>$alamat,
                
          );
          $where = array (
              'id_mahasiswa' =>$id
          );
          $this->beasiswa_model->update_data('mahasiswa',$data,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success
          alert-dismissible fade show" role="alert">
          Data Krietria Berhasil DiUpdate!.
          <button type="button" class="close" date-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('data_mahasiswa');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('id_mahasiswa','id_mahasiswa','required');
        $this->form_validation->set_rules('nama_mahasiswa','nama_mahasiswa','required');
        $this->form_validation->set_rules('nik','nik','required');
        $this->form_validation->set_rules('alamat','alamat','required');
       
    }
       
    public function tambah_nilai($id)
    {
        
    $data['mahasiswa'] = $this->beasiswa_model->ambil_id_mahasiswa($id);
    // $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
    $nilai['nilai']= $this->beasiswa_model->get_data('nilai')->result();

    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('mahasiswa/form_tambah_nilai',$data);
    $this->load->view('templates/footer');
    }

    public function tambah_nilai_aksi()
    {
        // $this->_rules();

		// if($this->form_validation->run() == FALSE)
        // {
		// 	$this->tambah_nilai();
		// }else{
        $id_mahasiswa     =$this->session->userdata('id_mahasiswa');
        $nama_mahasiswa     =$this->session->userdata('nama_mahasiswa');
        // $nama_kriteria      =$this->input->post('nama_kriteria');
        $nilai              =$this->input->post('nilai');
                
        $data = array(
            
            'id_mahasiswa'      =>$id_mahasiswa,
            'nama_mahasiswa'      =>$nama_mahasiswa,
            // 'nama_kriteria'       =>$nama_kriteria,
            'nilai'               =>$nilai,
           
        );

        $this->beasiswa_model->insert_data($data,'nilai');

        $this->session->set_flashdata('pesan','<div class="alert alert-success
			alert-dismissible fade show" role="alert">
			Berhasil menilai
			<button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			 redirect('data_mahasiswa');
         }


  
    public function delete_mahasiswa($id)
    {
        $where = array('id_mahasiswa' => $id);
        $this ->beasiswa_model->delete_data($where,'mahasiswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Data Krietria Berhasil DiHapus!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_mahasiswa');
    }
}
?>