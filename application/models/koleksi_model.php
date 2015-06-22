<?php


class Koleksi_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'mst_kolesi_buku';
		parent::__construct();
	}
	
	function save($data)
	{
		return $this->db->insert($this->table_name, $data);
	}
	
	function get_records()
	{
		$this->db->select("koleksi.*");
		$this->db->select("mst_buku.JUDUL_PUSTAKA");
		$this->db->select("mst_klasifikasi.NAMA_KLASIFIKASI");
		$this->db->from("mst_kolesi_buku koleksi");
		$this->db->join("mst_buku", "mst_buku.ID = koleksi.BUKU_ID", "left");
		$this->db->join("mst_klasifikasi", "mst_klasifikasi.KLASIFIKASI_ID = mst_buku.KLASIFIKASI_ID", "left");
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function get_collection($book_id)
	{
		$this->db->select("collection.*");
		$this->db->select("mst_buku.JUDUL_PUSTAKA");
		$this->db->from("mst_kolesi_buku collection");
		$this->db->join("mst_buku", "collection.BUKU_ID = mst_buku.ID ");
		$this->db->where("collection.KODE", $book_id);
		$query = $this->db->get();
		
		return $query->row();
	}
}