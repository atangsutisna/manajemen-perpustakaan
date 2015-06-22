<?php


class LPinjaman_model extends MY_Model
{
	
	function get_records($limit = 0, $offset = 0)
	{
		$this->db->select("p.*");
		$this->db->select("mst_anggota.NAMA_ANGGOTA");
		$this->db->select("sys_user.NAMA_LENGKAP");
		$this->db->from("trans_pinjaman p");
		$this->db->join("mst_anggota", "p.NO_ANGGOTA = mst_anggota.NO_ANGGOTA", "left");
		$this->db->join("sys_user", "p.USER_ID = sys_user.ID", "left");
		
		if ($limit != 0)
		$this->db->limit($limit, $offset);
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		
		return $query->result_array();
	}
	
	function check_status_pinjaman($pinjaman_id)
	{
		$this->db->where("ID", $pinjaman_id);
		$query = $this->db->get("trans_pinjaman");
		
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		
		return $query->row_array();
	}
}