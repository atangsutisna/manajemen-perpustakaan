<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>No. Anggota</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>No Telp</th>
		<th></th>
	</tr>
	<?php  foreach ($results as $row) : ?>
		<tr>
			<td><?php echo $row->NO_ANGGOTA; ?></td>
			<td><?php echo $row->NAMA_ANGGOTA; ?></td>
			<td><?php echo $row->ALAMAT_RUMAH; ?></td>
			<td><?php echo $row->NO_TLP; ?></td>
		<td>
		<?php
			echo delete_path('anggota', $row->ID, $row->NAMA_ANGGOTA). ' | '.
			edit_path('anggota', $row->ID)
		?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>