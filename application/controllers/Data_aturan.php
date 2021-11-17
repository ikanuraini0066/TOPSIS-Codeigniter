<?php
class Data_aturan extends CI_Controller
{

	public function index()
	{
		// $data['aturan'] = $this->beasiswa_model->get_data('aturan')->result();
		$data['aturan']= $this->beasiswa_model->get_dataaturan();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('aturan/data_aturan', $data);
		$this->load->view('templates/footer');
	}


	public function tambah_aturan()
	{
		$data['aturan'] = $this->beasiswa_model->get_data('aturan')->result();
		$data['kriteria'] = $this->beasiswa_model->get_data('kriteria')->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('aturan/tambah_aturan', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_aturan_aksi()
	{
	 $this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah_aturan();
		} else {
			// $id_aturan    = $this->input->post('id_aturan');
			$id_kriteria        = $this->input->post('id_kriteria');
			// $nama_kriteria        = $this->input->post('nama_kriteria');
			$ket    = $this->input->post('ket');



			$data = array(
				// 'id_aturan'       =>$id_aturan,
				'id_kriteria'     => $id_kriteria,
				// 'nama_kriteria'     => $nama_kriteria,
				'ket'     => $ket,
			);

			$this->beasiswa_model->insert_data($data, 'aturan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success
			alert-dismissible fade show" role="alert">
			Data Krietria Berhasil Ditambahkan!.
			<button type="button" class="close" date-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			</div>');
			redirect('data_aturan');
		}
	}

	public function update_aturan($id)
	{
		$where = array('id_aturan' => $id);
		// $data['aturan'] = $this->db->query("SELECT * FROM aturan WHERE id_aturan = '$id'")->result();
		$data['aturan'] = $this->db->query("SELECT * FROM aturan atr, 
		kriteria kr WHERE atr.id_kriteria = kr.id_kriteria AND atr.id_aturan = '$id'")->result();
		$data['kriteria'] = $this->beasiswa_model->get_data('kriteria')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('aturan/form_update_aturan', $data);
		$this->load->view('templates/footer');
	}

	public function update_aturan_aksi()
	{
		// $this->_rules();

		// if ($this->form_validation->run() == FALSE) {
		// 	$this->update_aturan();
		// } else {
			$id                 = $this->input->post('id_aturan');
			// $id_kriteria      = $this->input->post('id_kriteria');
			$ket         = $this->input->post('ket');

			$data = array(
				//'id_kriteria'       =>$id_kriteria,
				// 'id_kriteria'     => $id_kriteria,
				'ket'        => $ket,
			);
			$where = array(
				'id_aturan' => $id
			);
			$this->beasiswa_model->update_data('aturan', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success
          alert-dismissible fade show" role="alert">
          Data Krietria Berhasil DiUpdate!.
          <button type="button" class="close" date-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div>');
			redirect('data_aturan');
		// }
	}
	public function delete_aturan($id)
    {
        $where = array('id_aturan' => $id);
        $this ->beasiswa_model->delete_data($where,'aturan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger
        alert-dismissible fade show" role="alert">
        Data Krietria Berhasil DiHapus!.
        <button type="button" class="close" date-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('data_aturan');
    }



	public function _rules()
	{
		// $this->form_validation->set_rules('id_aturan','id_aturan','required');
		$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'required');
		$this->form_validation->set_rules('ket', 'ket', 'required');
	}
}

