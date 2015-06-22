<?php


class Menu_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'sys_menu';
		parent::__construct();
	}
	
	function get_records()
	{
		$this->db->select('m.*, mg.NAMA_GROUP');
		$this->db->from('sys_menu m, sys_menu_group mg');
		$this->db->where('m.MENU_GROUP_ID = mg.ID');
		$menus = $this->db->get();
		return $menus->result();
	}
}