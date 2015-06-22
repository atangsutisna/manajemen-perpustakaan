<h2>Menu Group</h2>
<?=add_path('menu group')?>

<?=$this->session->flashdata('notice')?>
<?php
	echo table_open_tag('cellpadding=\"5\" cellspacing=\"0\"');
	
	$title = array('No','Nama Menu Group','Aksi');
	echo table_title($title);
	
	$no = 1;
	foreach ($results as $row)
	{
		$data = array(
						$no,
						$row->NAMA_GROUP,
						//delete_path('menu_group', $row->ID, $row->NAMA_GROUP). ' | '.
						edit_path('menu_group', $row->ID)
					 );
		echo table_contents($data);
		$no++;
	}
	echo table_close_tag();
?>