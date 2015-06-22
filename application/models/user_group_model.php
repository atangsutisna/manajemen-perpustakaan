<?php


class User_group_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'mst_user_group';
		parent::__construct();
	}
	
}