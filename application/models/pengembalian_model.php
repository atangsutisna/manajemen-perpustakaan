<?php


class Pengembalian_model extends MY_Model{

	function __construct()
	{
		$this->table_name = "trans_pengembalian";
		parent::__construct();
	}
	
	function insert($data)
	{
		return $this->db->insert($this->table_name, $data);
	}
	
	function update($pengembalian_id, $data)
	{
		$this->db->where("ID", $pengembalian_id);
		return $this->db->update($this->table_name, $data);
	}
	
	function insert_detail_pengembalian($data)
	{
		return $this->db->insert("detail_trans_pengembalian", $data);
	}
	
	function get_detail_pengembalian($pengembalian_id)
	{
		$this->db->where("PENGEMBALIAN_ID", $pengembalian_id);
		$query = $this->db->get("detail_trans_pengembalian");
		
		if ($query->num_rows() > 0)
			return $query->result();
		else
			return $query->result_array();
	}
	
	function get_current_id()
	{
		return $this->db->insert_id();
	}
	
}