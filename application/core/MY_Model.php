<?php


class MY_Model extends CI_Model{

	var $table_name;
	
	function __construct()
	{
		parent::__construct();
	}
	
	function get_records($limit = 0 , $offset = 0)
	{
		
		if ($limit !== 0)
		{
			$this->db->limit($limit, $offset);
		}
		$query = $this->db->get($this->table_name);
		return $query->result();
	}
	
	function get_record($id)
	{
		$this->db->where('ID', $id);
		$query = $this->db->get($this->table_name);
		return $query->row();
	}
	
	function get_by($criteria)
	{
		if (is_array($criteria))
		{
			$this->db->where($criteria);
		}
		else
		{
			$this->db->where($criteria);
		}
		$query = $this->db->get($this->table_name);
		return $query;
	}
	
	function delete($id)
	{
		return $this->db->delete($this->table_name, array('ID' => $id));
	}
	
	function save($id = 0, $data)
	{
		if (empty($id) || $id == 0)
		{
			return $this->db->insert($this->table_name, $data);
		}
		else
		{
			// lakukan update jika id tidak sama dengan kosong
			$this->db->where('ID', $id);
			return $this->db->update($this->table_name, $data);
		}
	}
	
	function update($criteria, $data)
	{
		$this->db->where($criteria);
		return $this->db->update($this->table_name, $data);
	}
	
	function count_records()
	{
		return $this->db->count_all($this->table_name);
	}
}
?>