<?php


class User_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'sys_user';
		parent::__construct();
	}
	
	
	function get_profile($username)
	{
		//$this->db->select('');
		$this->db->where('username', $username);
		$query = $this->db->get($this->table_name);
		
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return $query->row_array();
	}
	
}