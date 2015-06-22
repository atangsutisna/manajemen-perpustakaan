<?php


class Menu_group extends MY_Controller{

	function __construct()
	{
		parent::__construct('menu_group');
	}
	
	function save()
	{
		$this->form_validation->set_rules('nama_menu_group','Nama Menu Group','required');
		$this->form_validation->set_rules('urutan','Urutan','required|numeric');
		$id = $this->input->post('id');
		
		$data = array(
						'NAMA_MENU_GROUP' => $this->input->post('nama_menu_group'),
						'URUTAN' => $this->input->post('urutan')
					);
		parent::save($id, $data);
	}
}