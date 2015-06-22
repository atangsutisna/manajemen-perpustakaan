<?php

class Ignet_generator extends CI_Controller{

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$tables = $this->db->list_tables();
		
		foreach ($tables as $table)
		{
			echo $table;
		}
	}
}
?>