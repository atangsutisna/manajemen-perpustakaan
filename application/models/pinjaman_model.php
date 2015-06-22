<?php


class Pinjaman_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'trans_pinjaman';
		parent::__construct();
	}
	
	function insert($data)
	{
		return $this->db->insert($this->table_name, $data);
	}
	
	function get_pinjaman($member_id)
	{
		$this->db->select("detail_trans_pinjaman.*");
		$this->db->select("mst_kolesi_buku.KODE");
		$this->db->select("mst_buku.JUDUL_PUSTAKA");
		$this->db->select("trans_pinjaman.ID as PINJAMAN_ID, trans_pinjaman.TGL_PINJAMAN, trans_pinjaman.TGL_HARUS_KEMBALI");
		$this->db->from("detail_trans_pinjaman");
		$this->db->join("mst_kolesi_buku", "detail_trans_pinjaman.KODE = mst_kolesi_buku.KODE", "left");
		$this->db->join("mst_buku", "mst_kolesi_buku.BUKU_ID = mst_buku.ID", "left");
		$this->db->join("trans_pinjaman", "detail_trans_pinjaman.PINJAMAN_ID = trans_pinjaman.ID", "left");
		$this->db->where("trans_pinjaman.NO_ANGGOTA", $member_id);
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function get_detail_pinjaman($pinjaman_id)
	{
		$this->db->select("detail_pinjaman.*, mst_buku.JUDUL_PUSTAKA");
		$this->db->from("detail_trans_pinjaman detail_pinjaman");
		$this->db->join("mst_buku", "detail_pinjaman.NO_INDUK = mst_buku.NO_INDUK", "LEFT");
		$this->db->where("detail_pinjaman.PINJAMAN_ID", $pinjaman_id);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0 )
		{
			return $query->result();
		}
		else
			return $query->result_array();
	}
	
	function update($pinjaman_id, $data)
	{
		$this->db->where("ID", $pinjaman_id);
		return $this->db->update($this->table_name, $data);
	}
	
	function get_tmp_pinjaman()
	{
		$this->db->select("tmp_pinjaman.*");
		$this->db->select("mst_kolesi_buku.KODE");
		$this->db->select("mst_buku.JUDUL_PUSTAKA");
		$this->db->from("tmp_trans_pinjaman tmp_pinjaman");
		$this->db->join("mst_kolesi_buku", "tmp_pinjaman.KODE = mst_kolesi_buku.KODE", "LEFT");
		$this->db->join("mst_buku", "mst_kolesi_buku.BUKU_ID = mst_buku.ID", "LEFT");
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function get_current_id()
	{
		return $this->db->insert_id();
	}
	function count_tmp_pinjaman()
	{
		return $this->db->count_all("tmp_trans_pinjaman");
	}
	
	function get_by($criteria)
	{
		$this->db->select('p.ID, a.NAMA_ANGGOTA, b.JUDUL_PUSTAKA, p.TGL_PINJAM');
		$this->db->from('trans_pinjaman p, mst_anggota a, mst_buku b');
		$this->db->where("p.NO_ANGGOTA = a.NO_ANGGOTA");
		$this->db->where("p.NO_INDUK = b.NO_INDUK");
		$this->db->where($criteria);
		$query = $this->db->get();
		return $query;
	}
}