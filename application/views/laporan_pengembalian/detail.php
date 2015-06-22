<h2>Detail Pengembalian</h2>
<p><?php echo anchor('laporan_pengembalian', '<< Kembali'); ?></p>
<table cellpadding="5" cellspacing="0">
	<tr>
		<td>No Anggota</td>
		<td>:</td>
		<td><?php echo $result->NO_ANGGOTA; ?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td><?php echo $result->NAMA_ANGGOTA; ?></td>
	</tr>
	<tr>
		<td>No Pinjaman</td>
		<td>:</td>
		<td><?php echo $result->PINJAMAN_ID; ?></td>
	</tr>
	<tr>
		<td>Tgl Pinjam</td>
		<td>:</td>
		<td><?php echo date("d M Y", strtotime($result->TGL_PINJAM)); ?></td>
	</tr>
	<tr>
		<td>Tgl Kembali</td>
		<td>:</td>
		<td><?php echo date("d M Y", strtotime($result->TGL_KEMBALI)); ?></td>
	</tr>
	<tr>
		<td>Batas Pengembalian</td>
		<td>:</td>
		<td><?php echo $result->BATAS_PENGEMBALIAN; ?></td>
	</tr>
	<tr>
		<td>Denda Keterlambatan</td>
		<td>:</td>
		<td><?php echo 0; ?></td>
	</tr>
</table>

<h2>Daftar Buku</h2>
<?php $no = 1; ?>
<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>No</th>
		<th>Judul Pustaka</th>
		<th>Status</th>
	</tr>
	<?php foreach ($books as $row) : ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
		<td align="center"><?php echo $row->STATUS_BUKU; ?></td>
	</tr>
	<?php $no++; ?>
	<?php endforeach; ?>
<tr>
	<td colspan="3">
	<b>Kembali : </b> <?php echo $jml_kembali; ?> Buku<br>
	<b>Rusak : </b> <?php echo $jml_rusak; ?> Buku<br>
	<b>Hilang : </b> <?php echo $jml_hilang; ?> Buku<br>
</tr>
</table>