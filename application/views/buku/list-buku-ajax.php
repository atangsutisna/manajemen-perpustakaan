<?php
			echo table_open_tag("cellpadding=\"5\" cellspacing=\"0\" width=\"100%\"");
			
			$title = array('Judul Pustaka', 'ISBN/ISNN', 'Copies', 'Last Update', '');
			echo table_title($title);
		
			foreach ($results as $row)
			{
				$data = array(
								$row->JUDUL_PUSTAKA,
								$row->ISBN_ISSN,
								! $row->JUMLAH ? "none" : $row->JUMLAH,
								date("d M Y", strtotime($row->TANGGAL_INPUT)),
								form_checkbox('check[]', $row->ID).  ' | '.
								edit_path('buku', $row->ID).' | '.
								anchor('buku/', 'Add Item')
							 );
				echo table_contents($data);
			}
			echo table_close_tag();
			//echo data_is_empty($results);
?>