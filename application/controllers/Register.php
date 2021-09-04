<?php
    
class Register extends CI_Controller{
    
    public function index()
    {
        $this->_rules();

        if($this->form_validation->run()==FALSE){
        $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
        }else{
            $username       =$this->input->post('username');
            $alamat         =$this->input->post('alamat');
            $notlp          =$this->input->post('notlp');
            $password       =md5($this->input->post('password'));
            $role_id        ='2';

            $data = array(
                'username'      => $username,
                'alamat'        => $alamat,
                'notlp'         => $notlp,
                'password'      => $password,
                'role_id'       =>$role_id
            );

            $this->beasiswa_model->insert_data($data,'admin');
            $this->session->set_flashdata('pesan','<div class="alert alert-success
			alert-dismissible fade show" role="alert">
			Berhasil Register Silahkan Login!
			<button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			 redirect('Auth/login');

        }
    }
        public function _rules()
        { 
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('notlp','notlp','required');
        $this->form_validation->set_rules('password','password','required');
        }
}
?>