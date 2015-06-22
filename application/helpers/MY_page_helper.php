<?php
	
	function add_path($ctrl_name)
	{
		return anchor("{$ctrl_name}/add","Add ".ucfirst($ctrl_name));
	}
	
	function delete_path($ctrl_name, $id, $name = '')
	{
		return anchor("{$ctrl_name}/{$id}/delete", 'Delete', array('onclick' => "return confirm('Apakah Anda Akan Menghapus Data {$name}')"));
	}
	
	function edit_path($ctrl_name, $id)
	{
		return anchor("{$ctrl_name}/{$id}/edit", 'Edit');
	}
	
?>