<?php


class Laporan_pengembalian_model extends MY_Model
{
	function get_records()
	{
		$this->db->select("pengembalian.*");
		$this->db->select("trans_pinjaman.TGL_PINJAM");
		$this->db->select("trans_pinjaman.NO_ANGGOTA");
		$this->db->select("trans_pinjaman.BATAS_PENGEMBALIAN");
		$this->db->from("trans_pengembalian pengembalian");
		$this->db->join("trans_pinjaman", "pengembalian.PINJAMAN_ID = trans_pinjaman.ID", "left");
		
		$query = $this->db->get();
		return $query->result();
	}
	
	function detail_pengembalian($id)
	{
		$this->db->select('mst_anggota.NAMA_ANGGOTA');
		$this->db->select('trans_pinjaman.NO_ANGGOTA');
		$this->db->select('trans_pinjaman.TGL_PINJAM');
		$this->db->select('trans_pinjaman.BATAS_PENGEMBALIAN');
		$this->db->select('trans_pengembalian.TGL_KEMBALI');
		$this->db->select('trans_pengembalian.*');
		
		$this->db->from('trans_pengembalian');
		$this->db->join('trans_pinjaman', 'trans_pengembalian.PINJAMAN_ID = trans_pinjaman.ID', 'left');
		$this->db->join('mst_anggota', 'trans_pinjaman.NO_ANGGOTA = mst_anggota.NO_ANGGOTA', 'left');
		$this->db->where('trans_pengembalian.ID', $id);
		$query = $this->db->get();
		
		return $query->row();
	}
	
	function get_detail_buku($id)
	{
		$this->db->select("detail_trans_pengembalian.*");
		$this->db->select("mst_buku.JUDUL_PUSTAKA");
		$this->db->from("detail_trans_pengembalian");
		$this->db->join("mst_buku", "detail_trans_pengembalian.NO_INDUK = mst_buku.NO_INDUK", "left");
		$query = $this->db->get();
		
		return $query->result();
	}
	
	function count_detail_buku($pengembalian_id, $type = 'kembali')
	{
		$this->db->select('count(*) as JUMLAH');
		$this->db->from('detail_trans_pengembalian');
		$this->db->where('STATUS_BUKU', $type);
		$this->db->where('PENGEMBALIAN_ID', $pengembalian_id);
		$query = $this->db->get();
		
		return $query->row()->JUMLAH;
	}
}