<?php


class Book_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'mst_buku';
		parent::__construct();
	}
	
	function get_records()
	{
		$this->db->select("mst_buku.*");
		$this->db->select("count(mst_kolesi_buku.BUKU_ID) as JUMLAH");
		$this->db->from("mst_buku");
		$this->db->join("mst_kolesi_buku", "mst_buku.ID = mst_kolesi_buku.BUKU_ID", "left");
		$this->db->group_by("mst_kolesi_buku.BUKU_ID");
		$this->db->group_by("mst_buku.ID");
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function count_books()
	{
		$query = $this->db->count_all($this->table_name);
		
		return $query;
	}
	
}