<?php echo form_open(); ?>
<table cellpadding="5" cellspacing="0">
	<tr>
		<td>Pencarian Koleksi: <?php echo form_input('keyword', '', 'size=35'); ?></td>
		<td><?php echo form_submit('submit', 'Go'); ?></td>
	</tr>
</table>
<?php echo form_close(); ?>

<table cellpadding="5" width="100%"  cellspacing="0">
	<tr>
		<th>Kode</th>
		<th>Title</th>
		<th>Klasifikasi</th>
		<th>Last Update</th>
	</tr>
	<?php foreach ($results as $row) : ?>
	<tr>
		<td><?php echo $row->KODE; ?></td>
		<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
		<td><?php echo $row->NAMA_KLASIFIKASI; ?></td>
		<td><?php echo date(strtotime($row->LAST_UPDATE)); ?></td>
	</tr>
	<?php endforeach; ?>
</table>