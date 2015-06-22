<h2>Laporan Pinjaman</h2>
<div style="float: right;">
	<?php echo form_open(); ?>
	Cari <?php echo form_input(); ?> <?php echo form_submit('submit','Go'); ?>
	<?php echo form_close(); ?>
</div>
<div>
	<?php echo form_open(); ?>
	Filter <?php echo form_input(); ?> s/d <?php echo form_input(); ?>
	<?php echo form_submit('submit', 'Go'); ?>
	<?php echo form_button('button', 'Print'); ?>
	<?php echo form_close(); ?>
</div>
<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>No Transaksi</th>
		<th>Nama Petugas</th>
		<th>Nama Anggota</th>
		<th>Tgl Pinjam</th>
		<th>Jml Buku</th>
		<th>Status</th>
	</tr>
	
	<?php foreach ($results as $row) : ?>
	<tr>
		<td><?php echo $row->ID; ?></td>
		<td><?php echo $row->NAMA_LENGKAP; ?></td>
		<td><?php echo $row->NAMA_ANGGOTA; ?></td>
		<td><?php echo date("d M Y", strtotime($row->TGL_PINJAM)); ?></td>
		<td><?php echo $row->JUMLAH_PINJAMAN; ?></td>
		<td><?php echo !$row->STATUS ? "Belum Kembali" : "Sudah Kembali"; ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $pages; ?>