<?php


class Menu_group_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'sys_menu_group';
		parent::__construct();
	}
	
}