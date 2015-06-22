<h2>Pengaturan Hak Akses</h2>

<?php
	echo table_open_tag('cellspacing="0" cellpadding="5" width="100%"');
		$title = array('Nama Group', '-');
		echo table_title($title);
		
		foreach ($results as $row)
		{
			$data = array(
							$row->NAMA_GROUP,
							anchor('user_roles/group/'.$row->ID, 'Edit Permission')
						 );
			echo table_contents($data);
		}
		
	echo table_close_tag();
?>