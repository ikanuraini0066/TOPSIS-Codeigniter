<?php 

class Data_siswa extends CI_Controller
{

    public function index()
    {
        $data['siswa'] = $this->beasiswa_model->get_data('siswa')->result();      
        
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/data_siswa',$data);
        $this->load->view('templates/footer');
    }
    public function add_siswa()
    {
        $data['siswa'] = $this->beasiswa_model->get_data('siswa')->result();      
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/add_siswa',$data);
        $this->load->view('templates/footer');
    }
    public function add_siswa_aksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE)
        {
            $this->add_siswa();
        }else{
            $nama               = $this->input->post('nama');
            $jk                 = $this->input->post('jk');
            $no_telp            = $this->input->post('no_telp');
            $sekolah            = $this->input->post('sekolah');
            $jurusan            = $this->input->post('jurusan');
            $alamat             = $this->input->post('alamat');

        $data = array(
            'nama'              => $nama,
            'jk'                => $jk,
            'no_telp'           => $no_telp,
            'sekolah'           => $sekolah,
            'jurusan'           => $jurusan,
            'alamat'            => $alamat,
        );
    
        $this->beasiswa_model->insert_data($data,'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('data_siswa');
        }
    }

    public function update_siswa($id)
    {
        $where = array('id_siswa' => $id);
        $data['siswa'] = $this->db->query("SELECT * FROM siswa WHERE id_siswa = '$id'")->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('siswa/update_siswa',$data);
        $this->load->view('templates/footer');
    }

    public function update_siswa_aksi()
    {
        $this->_rules();
        // $id             = $this->input->post('id_siswa');
        
        if($this->form_validation->run() == FALSE)
        {
            // redirect(site_url('update_siswa'.$id));
            $this->update_siswa();
        }else{
            $id                 = $this->input->post('id_siswa');
            $nama               = $this->input->post('nama');
            $jk                 = $this->input->post('jk');
            $no_telp            = $this->input->post('no_telp');
            $sekolah            = $this->input->post('sekolah');
            $jurusan            = $this->input->post('jurusan');
            $alamat             = $this->input->post('alamat');
        
        $data = array(
            'nama'              => $nama,
            'jk'                => $jk,
            'no_telp'           => $no_telp,
            'sekolah'           => $sekolah,
            'jurusan'           => $jurusan,
            'alamat'            => $alamat,
        );

        $where = array(
            'id_siswa' => $id
        );

        $this->beasiswa_model->update_data('siswa', $data, $where);
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data siswa berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('data_nilai');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('jk','Jk','required');
        $this->form_validation->set_rules('no_telp','No_telp','required');
        $this->form_validation->set_rules('sekolah','Sekolah','required');
        $this->form_validation->set_rules('jurusan','Jurusan','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
    }

    public function delete_siswa($id){
        $where = array('id_siswa' => $id);
        $this->beasiswa_model->delete_data($where, 'siswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data siswa berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('admin/data_siswa');
    }
}
?>