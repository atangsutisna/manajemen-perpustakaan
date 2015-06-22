<h2>User Group</h2>
<?=add_path('user_group')?>
<?=$this->session->flashdata('notice')?>
<?php
	echo table_open_tag('cellpadding=\"5\" cellspacing=\"0\"');
	
	$title = array('Nama Group','Aksi');
	echo table_title($title);
	
	foreach ($results as $row)
	{
		$data = array(
						$row->NAMA_GROUP,
						//delete_path('user_group', $row->ID, $row->NAMA_GROUP). ' | '.
						edit_path('user_group', $row->ID)
					 );
		echo table_contents($data);
	}
	echo table_close_tag();
	
	echo empty($results) ? 'Data tidak ditemukan' : ''
?>