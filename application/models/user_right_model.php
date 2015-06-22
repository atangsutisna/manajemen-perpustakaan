<?php


class User_right_model extends MY_Model
{
	function __construct()
	{
		$this->table_name = 'sys_user_right';
		parent::__construct();
	}
	
	/*
	function get_by($criteria)
	{
		$this->db->select("ur.*, m.NAMA_MENU");
		$this->db->from($this->table_name. " ur" );
		$this->db->join("sys_menu m", "ur.MENU_ID = m.ID", "LEFT");
		$this->db->where($criteria);
		return $this->db->get($this->table_name);
	}
	*/
}