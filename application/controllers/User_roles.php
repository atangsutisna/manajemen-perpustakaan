<?php

class User_roles extends MY_Controller
{

	private $user_permissions;
	
	function __construct()
	{
		parent::__construct('user_roles');
		$this->load->model(array('user_group_model', 'menu_model', 'user_right_model'));
		$this->user_permissions = array();
	}
	
	function index()
	{
		$this->data['results'] = $this->user_group_model->get_records();
		$this->data['main'] = 'user_roles/index';
		$this->load->view(parent::get_template(), $this->data);
	}
	
	function group($group_id)
	{
		$modules = $this->menu_model->get_records();
		
		
		foreach ($modules as $module)
		{
			$user_right = $this->user_right_model->get_by(array('USER_GROUP_ID' => $group_id, 'MENU_ID' => $module->ID));
			//echo $module->SLUG;
			
			if ($user_right->num_rows() > 0)
			{
				$user_permission = $user_right->row();
				
				$user_roles = array(
									'module_id' => $module->ID,
									'module_name' => $module->NAMA_MENU,
									//'module_alias' => $module->SLUG,
									'module_permission' => TRUE,
									'create' => $user_permission->CREATE,
									'delete' => $user_permission->DELETE,
									'update' => $user_permission->UPDATE
				                   );
				array_push($this->user_permissions, $user_roles);
			}
			else
			{
				$user_roles = array(
									'module_id' => $module->ID,
									'module_name' => $module->NAMA_MENU,
									'module_permission' => FALSE,
									'create' => 0,
									'delete' => 0,
									'update' => 0
				                   );
				array_push($this->user_permissions, $user_roles);
			}
		}
		
		$this->data['user_permissions'] = $this->user_permissions;
		$this->data['main'] = 'user_roles/form';
		$this->load->view(parent::get_template(), $this->data);
		//print_r($this->user_permissions);
	}
	
	function save()
	{
		$modules = $this->input->post('modules');
		
		print_r($modules);
		foreach ($modules as $module)
		{
			/*
			echo $module['menu_id'];
			if (is_array($module['permission']))
			{
				echo $module['permission']['create'];
				echo $module['permission']['update'];
				echo $module['permission']['delete'];
			}
			*/
		}
		/*
		if (count($modules) > 0)
		{
			for ($i=0; $i < count($modules); $i++)
			{
				$module = $this->menu_model->get_record($modules[$i]);
				
				$data = array(
					'MENU_ID' => $module->ID,
					'CREATE' => isset($creates[$i]),
					'DELETE' => isset($deletes[$i]),
					'UPDATE' => isset($updates[$i])
				);
				
				!empty($module) ? $this->user_right_model->save($module->ID, $data)
				: $this->user_right_model->save(0, $data);
				//echo print_r($data);
			}
			//redirect('user_roles');
		}
		
		$this->session->set_flashdata('error', 'Tidak ada modul yang dipilih');
		//$this->group();
		*/
	}
	
}