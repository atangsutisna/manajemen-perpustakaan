<?php


class Menu extends MY_Controller{

	function __construct()
	{
		parent::__construct('menu');
	}
	
	function add()
	{
		$menus = $this->menu_group_model->get_records();
		
		foreach ($menus as $row)
		{
			$this->data['menu_group_options'][$row->ID] = $row->NAMA_GROUP;
		}
		parent::add();
	}
	
	function edit($id)
	{
		$menus = $this->menu_group_model->get_records();
		
		foreach ($menus as $row)
		{
			$this->data['menu_group_options'][$row->ID] = $row->NAMA_GROUP;
		}
		parent::edit($id);
	}
	function save()
	{
		$this->form_validation->set_rules('menu_group_id', 'Menu Group','required');
		$this->form_validation->set_rules('nama_menu', 'Nama Menu','required');
		$this->form_validation->set_rules('url', 'URL','required');
		
		$id = $this->input->post('id');
		
		$data = array(
						'MENU_GROUP_ID' => $this->input->post('menu_group_id'),
						'NAMA_MENU' => $this->input->post('nama_menu'),
						'URL' => $this->input->post('url'),
						'URUTAN' => $this->input->post('urutan')
					);
		parent::save($id, $data);
	}
}