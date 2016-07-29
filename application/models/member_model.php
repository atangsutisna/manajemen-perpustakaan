<?php


class Member_model extends MY_Model {

	function __construct()
	{
		$this->table_name = 'mst_users';
		parent::__construct();
	}
	
	function find_one($member_id)
	{
		$this->db->select("business_entity.*");
		$this->db->select("mst_users.ID, mst_users.KODE_USER, mst_users.STATUS, mst_users.TANGGAL_PEMBUATAN, mst_users.TANGGAL_PERUBAHAN");
		$this->db->from("mst_users");
		$this->db->join("business_entity", "mst_users.BUSINESS_ENTITY_ID = business_entity.BUSINESS_ENTITY_ID", "left");
		$this->db->where("mst_users.ID", $member_id);
		$query = $this->db->get();
		
		return $query->row();
	}
	
	function get_records($limit=10) 
	{
		//TODO: batasi misalnya 10;
		$this->db->select("business_entity.*");
		$this->db->select("mst_users.ID, mst_users.KODE_USER, mst_users.STATUS, mst_users.TANGGAL_PEMBUATAN, mst_users.TANGGAL_PERUBAHAN");
		$this->db->from("mst_users");
		$this->db->join("business_entity", "mst_users.BUSINESS_ENTITY_ID = business_entity.BUSINESS_ENTITY_ID", "left");
		
		return $this->db->get()->result();
	}
}