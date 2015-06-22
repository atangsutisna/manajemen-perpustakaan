<?php


class Anggota extends MY_Controller{

	function __construct()
	{
		parent::__construct('anggota');
	}
	
	function list_anggota_ajax()
	{
		$this->data['results'] = $this->anggota_model->get_records();
		$this->load->view('anggota/list-anggota', $this->data);
	}
	
	function save_ajax()
	{
		//$this->form_validation->set_rules('nama_anggota','Nama anggota','required');
		//$id = $this->input->post('id');
		
		$data = array(
						'NO_ANGGOTA' => $this->input->post('no_anggota'),
						'TYPE_ANGGOTA' => 1,
						'NAMA_ANGGOTA' => $this->input->post('nama_anggota'),
						'ALAMAT_RUMAH' => $this->input->post('alamat_rumah'),
						'NO_TLP' => $this->input->post('no_tlp'),
						'KELAS' => $this->input->post('kelas'),
						'JENIS_KELAMIN' => $this->input->post('jenis_kelamin'),
						'STATUS_PINJAMAN' => 0,
						'STATUS_ANGGOTA' => 1
					);
		//parent::save($id, $data);
		$this->db->insert("mst_anggota", $data);
	}
	
	function update_anggota()
	{
		$user_id = $this->input->post('no_anggota');
		$data = array(
			'NAMA_ANGGOTA' => $this->input->post('nama_anggota'),
			'ALAMAT_RUMAH' => $this->input->post('alamat'),
			'NO_TLP' => $this->input->post('no_tlp'),
			'KELAS' => $this->input->post('kelas'),
		);
		$this->db->where('NO_ANGGOTA', $user_id);
		$this->db->update("mst_anggota", $data);
	}
	
	function edit_ajax($anggota_id)
	{
		$anggota = $this->anggota_model->get_record($anggota_id);
		
		$data_anggota['no_anggota'] = $anggota->NO_ANGGOTA;
		$data_anggota['nama_anggota'] = $anggota->NAMA_ANGGOTA;
		$data_anggota['alamat'] = $anggota->ALAMAT_RUMAH;
		$data_anggota['no_tlp'] = $anggota->NO_TLP;
		$data_anggota['kelas'] = $anggota->KELAS;
		
		echo json_encode($data_anggota);
	}
	
	function find()
	{
		$this->form_validation->set_rules('keyword','Kata Pencarian','required');
		
		if ($this->form_validation->run())
		{
			$keyword = $this->input->post('keyword');
			$criteria = array('NO_ANGGOTA' => $keyword);
			parent::find($criteria);
		}
		else
			parent::index();
	}
	
	function delete($id)
	{
		$member = $this->anggota_model->get_by(array('ID' => $id))->row();
		
		if ($member->STATUS_PINJAMAN == TRUE)
		{
			$this->session->set_flashdata('notice', 'Data tidak dapat dihapus, anggota '.$member->NO_ANGGOTA.' masih mempunyai pinjaman');
			redirect('anggota');
		}
		else
		{
			parent::delete($id);
		}
	}
	
	function add()
	{
		$this->load->view('anggota/form');
	}
}