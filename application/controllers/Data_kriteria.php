<?php
 
class Data_kriteria extends CI_Controller {

	
	public function index()
	{
        $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kriteria/data_kriteria',$data);
		$this->load->view('templates/footer');
	}


    public function tambah_kriteria()
        {
    $data['kriteria']= $this->beasiswa_model->get_data('kriteria')->result();
    $this->load->view('templates/header');
    $this->load->view('templates/sidebar');
    $this->load->view('kriteria/form_tambah_kriteria',$data);
    $this->load->view('templates/footer');
    }

    public function tambah_kriteria_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambah_kriteria();
        }else{
            $id_kriteria    = $this->input->post('id_kriteria');
            $nama_kriteria    = $this->input->post('nama_kriteria');
            $bobot_kriteria    = $this->input->post('bobot_kriteria');
            $keterangan    = $this->input->post('keterangan');
        

        $data = array(
            'id_kriteria'       =>$id_kriteria,
            'nama_kriteria'     =>$nama_kriteria,
            'bobot_kriteria'    =>$bobot_kriteria,
            'keterangan'        =>$keterangan
        );
    
        $this->beasiswa_model->insert_data($data,'kriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-success
        alert-dismissible fade show" role="alert">
        Data Krietria Berhasil Ditambahkan!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_kriteria');
        }
    }

    public function update_kriteria($id)
    {
        $where = array('id_kriteria' => $id);
        $data['kriteria'] = $this->db->query("SELECT * FROM kriteria WHERE id_kriteria = '$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/form_update_kriteria',$data);
        $this->load->view('templates/footer');
    }

    public function update_kriteria_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update_kriteria();
        }else{
                $id                 = $this->input->post('id_kriteria');
                $nama_kriteria      = $this->input->post('nama_kriteria');
                $bobot_kriteria     = $this->input->post('bobot_kriteria');
                $keterangan         = $this->input->post('keterangan');
          
          $data = array(
               //'id_kriteria'       =>$id_kriteria,
              'nama_kriteria'     =>$nama_kriteria,
              'bobot_kriteria'    =>$bobot_kriteria,
              'keterangan'        =>$keterangan,
          );
          $where = array (
              'id_kriteria' =>$id
          );
          $this->beasiswa_model->update_data('kriteria',$data,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success
          alert-dismissible fade show" role="alert">
          Data Krietria Berhasil DiUpdate!.
          <button type="button" class="close" date-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('data_kriteria');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_kriteria','nama_kriteria','required');
        $this->form_validation->set_rules('bobot_kriteria','bobot_kriteria','required');
        $this->form_validation->set_rules('keterangan','keterangan','required');
    }

    public function delete_kriteria($id)
    {
        $where = array('id_kriteria' => $id);
        $this ->beasiswa_model->delete_data($where,'kriteria');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Data Krietria Berhasil DiHapus!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_kriteria');
    }
}
?>