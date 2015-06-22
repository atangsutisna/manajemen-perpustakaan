<?php


class User_roles_model extends MY_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function get_records()
	{
		$this->db->select("ur.*, ug.NAMA_GROUP");
		$this->db->from('mst_user_right ur');
		$this->db->join('mst_user_group ug', 'ur.USER_GROUP_ID = ug.ID', 'LEFT');
		
		return $this->db->get()->result();
	}
}