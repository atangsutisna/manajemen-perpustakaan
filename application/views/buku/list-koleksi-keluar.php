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
		<th>Member ID</th>
		<th>Title</th>
		<th>Tgl Pinjaman</th>
		<th>Tgl Pengembalian</th>
	</tr>
	
</table>