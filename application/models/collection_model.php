<?php


class Collection_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'mst_collection';
		parent::__construct();
	}
	
	
	function count_books()
	{
		$query = $this->db->count_all($this->table_name);
		
		return $query;
	}
	
}