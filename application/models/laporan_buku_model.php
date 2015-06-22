<?php


class Laporan_buku_model extends MY_Model
{
	function get_records()
	{
		$this->db->select('b.NO_INDUK, b.JUDUL_PUSTAKA, count(JUDUL_PUSTAKA) as JUMLAH');
		$this->db->from('mst_buku b');
		$this->db->group_by('JUDUL_PUSTAKA');
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return $query->result_array();
		}
	}
	
}