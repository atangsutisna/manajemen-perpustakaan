<?php


class Anggota_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'mst_anggota';
		parent::__construct();
	}
	
	function get_byid($anggota_id)
	{
		$this->db->where("NO_ANGGOTA", $anggota_id);
		$query = $this->db->get($this->table_name);
		
		return $query;
	}
	
	function get_user($key, $value)
	{
		$this->db->select("mst_anggota.*");
		$this->db->select("mst_type_anggota.NAMA_TYPE_KEANGGOTAAN");
		$this->db->from("mst_anggota");
		$this->db->join("mst_type_anggota", "mst_anggota.TYPE_ID = mst_type_anggota.ID", "left");
		$this->db->where($key, $value);
		$query = $this->db->get();
		
		return $query->row();
	}
}