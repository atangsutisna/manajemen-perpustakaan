<!-- form pinjaman -->
<?php	
	$no_anggota = $this->session->userdata("no_anggota");
	//echo $no_anggota;
?>
<div id="create_pinjaman">
	<?php echo form_open("pinjaman/save"); ?>
	<h2>Buat Pinjaman</h2>
	<form method="POST" action="#">
		<input type="hidden" name="no_anggota" value="<?php echo $no_anggota; ?>">
		<b>Kode Buku </b><input type="text" name="no_induk" size="35">
		<input type="submit" name="submit" value="Tambahkan">
	</form>
	<?php form_close(); ?>
	
	<table cellspacing="0" cellpadding="5" width="100%">
		<tr>
			<th>No Induk</th>
			<th>Judul Pustaka</th>
			<th></th>
		</tr>
		<?php if (isset($tmp_pinjaman)) : ?>
		<?php foreach ($tmp_pinjaman as $row) : ?>
			<tr>
				<td><?php echo $row->NO_INDUK; ?></td>
				<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
				<td><?php echo anchor("#", "batal"); ?></td>
			</tr>
		<?php endforeach; ?>
		<?php endif;?>
		<tr>
			<td colspan="3">
				<?php echo form_open("pinjaman/akhiri_pinjaman"); ?>
				<input type="submit" value="Akhiri Pinjaman">
				<?php echo form_close(); ?>
			</td>
		</tr>
	</table>
	
</div>
<!-- end form pinjaman -->
