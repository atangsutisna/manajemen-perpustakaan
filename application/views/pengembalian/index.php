<h2>Pengembalian</h2>
<?php echo form_open(); ?>
<table cellspacing="0" cellpadding="5">
	<tr>
		<td>No Anggota</td>
		<td>:</td>
		<td><input type="text" name="no_anggota" size="34"><?php echo form_error("no_anggota"); ?></td>
	</tr>
	<tr>
		<td>No Induk Buku</td>
		<td>:</td>
		<td><input type="text" name="no_induk" size="34"><?php echo form_error("no_induk"); ?></td>
	</tr>
	<tr>
		<td colspan="3"><?php echo form_submit('submit', 'Simpan'); ?></td>
	</tr>
</table>
<?php echo form_close(); ?>

<!-- table pengembalian -->
<table cellpadding="5" cellspacing="0">	
	<tr>
		<th>No</th>
		<th>Anggota</th>
		<th>Judul Pustaka</th>
		<th>Tgl Pengembalian</th>
	</tr>
	<?php 	
		$no = 1;
		foreach ($data_pengembalian as $row) : 
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row->NAMA_ANGGOTA; ?></td>
		<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
		<td><?php echo date("d M Y", strtotime($row->CREATED_AT)); ?></td>
	</tr>
	<?php $no++; ?>
	<?php endforeach; ?>
</table>
<!-- end pengembalian -->