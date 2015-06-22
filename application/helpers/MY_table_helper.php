<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function table_open_tag($attr)
	{
		$table_open = "<table cellpadding='5' $attr>";
		return $table_open;
	}
	
	function table_title($data)
	{
		$title = "<tr>";
		foreach ($data as $value)
		{
			$title .= "<th>{$value}</th>";
		}
		$title .= "</tr>";
		return $title;
	}
	
	function table_contents($data)
	{
		$field = "<tr>";
		foreach ($data as $value)
		{
			$field .= "<td>{$value}</td>";
		}
		$field .= "</tr>";
		
		if (count($data) == 0)
		{
			return "Data masih kosong";
		}
		else
		return $field;
	}
	
	function table_close_tag()
	{
		return "</table>";
	}
?>