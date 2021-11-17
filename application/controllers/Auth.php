<?php
// class Auth extends CI_Controller {
    
//     public function login()
//     {
//         $this->_rules();
//         if($this->form_validation->run()== FALSE)
//         {
//             $this->load->view('templates/header');
//             $this->load->view('login');
//             // $this->load->view('dashboard');
//         }else{
//             $username = $this->input->post('username');
//             $password = md5($this->input->post('password'));

//             $cek = $this->beasiswa_model->cek_login('$username,$password');
//             if($cek == FALSE)
//             {
//                 $this->session->set_flashdata('pesan','<div class="alert alert-success
//                 alert-dismissible fade show" role="alert">
//                 Username atau Password Salah!.
//                 <button type="button" class="close" date-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//                 </div>');
//                 redirect('Auth/login');
//             }
//             else{
//                 $this->session->set_userdata('username',$cek->username);
//                 $this->session->set_userdata('role_id',$cek->role_id);
//                 $this->session->set_userdata('nama',$cek->nama);
//                 //$this->session->set_userdata('password',$cek->password);

//                 switch($cek->role_id){
//                     case 1 :redirect('dashboard');
//                         break;
//                     case 2 : redirect('home');
//                         break;
//                     default: break;
//                 }
//             }
//         }
//     }

//     public function _rules()
//     {
//         $this->form_validation->set_rules('username','Username','required');
//         $this->form_validation->set_rules('password','password','required');

//     }
//     public function logout()

//     {
//         redirect('auth/login');
//     }
// }

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('login');
            // $this->load->view('template_admin/footer');
        }else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $cek = $this->db->query("select * from admin where username='$username' and password='$password'")->row_array();
            $jml= count($cek);
            if($jml <= 0)
            {
              
                $this->session->set_flashdata('pesan','<div class="alert alert-danger
			alert-dismissible fade show" role="alert">
		    Username atau Password Salah
			<button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			 redirect('auth/login');
            }
            else {
                $this->session->set_userdata('username',$cek['username']);
                $this->session->set_userdata('role_id',$cek['role_id']);
                //$this->session->set_userdata('nama',$cek->nama);

                switch($cek['role_id']){
                    case 1 : redirect('dashboard');
                            break;
                    case 2 : redirect('dashboard');
                            break;
                    default: break;
                }
            }

        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','password','required');
    }

    public function logout()

    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        redirect('auth/');
    }
}
?>
