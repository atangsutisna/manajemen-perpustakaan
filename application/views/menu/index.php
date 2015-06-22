<h2>Menu</h2>
<?=add_path('menu')?>
<?=$this->session->flashdata('notice')?>
<?php
	echo table_open_tag('cellpadding=\"5\" cellspacing=\"0\"');
	
	$title = array('No','Menu Group','Nama Menu', 'URL', 'Urutan', 'Aksi');
	echo table_title($title);
	
	$no = 1;
	$nama_group = "";
	$nama_group_prev = "";
	foreach ($results as $row)
	{
		if ($nama_group_prev != $row->NAMA_GROUP)
		{
			$nama_group = $row->NAMA_GROUP;
			$nama_group_prev = $nama_group;
		}
		else
			$nama_group = "-";
		
		$data = array(
						$no,
						$nama_group,
						$row->NAMA_MENU,
						$row->URL,
						$row->URUTAN,
						//delete_path('menu', $row->ID, $row->NAMA_MENU),
						edit_path('menu', $row->ID)
					 );
		echo table_contents($data);
		$no++;
	}
	echo table_close_tag();
?>