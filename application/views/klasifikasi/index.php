<h2>Klasifikasi</h2>
<?=add_path('klasifikasi')?>
<?=$this->session->flashdata('notice')?>
<?php
	echo table_open_tag('cellpadding=\"5\" cellspacing=\"0\"');
	
	$title = array('No','ID', 'Nama Klasifikasi','Aksi');
	echo table_title($title);
	
	$no = 1;
	foreach ($results as $row)
	{
		$data = array(
						$no,
						$row->KLASIFIKASI_ID,
						$row->NAMA_KLASIFIKASI,
						delete_path('klasifikasi', $row->ID, $row->NAMA_KLASIFIKASI). ' | '.
						edit_path('klasifikasi', $row->ID)
					 );
		echo table_contents($data);
		$no++;
	}
	echo table_close_tag();
	
	if (empty($results))
	{
		echo "Data tidak ditemukan..";
	}
?>