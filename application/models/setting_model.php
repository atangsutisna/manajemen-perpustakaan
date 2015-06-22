<?php


class Setting_model extends MY_Model{

	function __construct()
	{
		$this->table_name = 'sys_setting';
		parent::__construct();
	}
	
}