<?php


class Klasifikasi extends MY_Controller{

	function __construct()
	{
		parent::__construct('klasifikasi');
	}
	
	function save()
	{
		$this->form_validation->set_rules('nama_klasifikasi','Nama Klasifikasi','required');
		$this->form_validation->set_rules('klasifikasi_id','ID Klasifikasi','required');
		$id = $this->input->post('id');
		
		$data = array(
						'klasifikasi_id' => $this->input->post('klasifikasi_id'),
						'nama_klasifikasi' => $this->input->post('nama_klasifikasi')
					);
		parent::save($id, $data);
	}
}