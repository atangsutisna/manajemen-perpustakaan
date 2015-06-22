<?php


class User_group extends MY_Controller{

	function __construct()
	{
		parent::__construct('user_group');
	}
	
	function save()
	{
		$this->form_validation->set_rules('nama_group','Nama Group','required|min_length[3]');
		$id = $this->input->post('id');
		
		$data = array(
						'NAMA_GROUP' => $this->input->post('nama_group')
					);
		parent::save($id, $data);
	}
}