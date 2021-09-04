<?php
 
class Data_admin extends CI_Controller {

	
	public function index()
	{
        $data['admin']= $this->beasiswa_model->get_data('admin')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/data_admin',$data);
		$this->load->view('templates/footer');
	}


    public function tambah_admin()
        {
    $data['admin']= $this->beasiswa_model->get_data('admin')->result();
    $this->load->view('templates/header');
    // $this->load->view('templates/sidebar');
    $this->load->view('admin/form_tambah_admin',$data);
    // $this->load->view('templates/footer');
    }

    public function tambah_admin_aksi()
    {
        $this->_rules();

        if($this->form_validation->run()== FALSE){
            $this->tambah_admin();
        }else{
            // $id_admin    = $this->input->post('id_admin');
            $username    = $this->input->post('username');
            $password    = md5($this->input->post('password'));
        

        $data = array(
            // 'id_admin'       =>$id_admin,
            'username'     =>$username,
            'password'    =>$password,
        );
    
        $this->beasiswa_model->insert_data($data,'admin');
        $this->session->set_flashdata('pesan','<div class="alert alert-success
        alert-dismissible fade show" role="alert">
        Data Admin Berhasil Ditambahkan!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_admin');
        }
    }

    public function update_admin($id)
    {
        $where = array('id_admin' => $id);
        $data['admin'] = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id'")->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/form_update_admin',$data);
        $this->load->view('templates/footer');
    }

    public function update_admin_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->update_admin();
        }else{
                $id           = $this->input->post('id_admin');
                $username     = $this->input->post('username');
                $password     = md5($this->input->post('password'));
          
          $data = array(
              // 'id_admin'       =>$id_admin,
              'username'     =>$username,
              'password'    =>$password,
          );
          $where = array (
              'id_admin' =>$id
          );
          $this->beasiswa_model->update_data('admin',$data,$where);
          $this->session->set_flashdata('pesan','<div class="alert alert-success
          alert-dismissible fade show" role="alert">
          Data Admin Berhasil DiUpdate!.
          <button type="button" class="close" date-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
          redirect('data_admin');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
    }

    public function delete_admin($id)
    {
        $where = array('id_admin' => $id);
        $this ->beasiswa_model->delete_data($where,'admin');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Data Admin Berhasil DiHapus!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_admin');
    }
}
?>