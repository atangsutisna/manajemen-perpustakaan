<h2>Laporan Pengembalian</h2>
<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>No Pinjaman</th>
		<th>No Anggota</th>
		<th>Tgl Pinjam</th>
		<th>Tgl Kembali</th>
		<th>Batas Pengembalian</th>
		<th>Denda</th>
		<th>-</th>
	</tr>
	<?php foreach ($results as $row) :?>
	<tr>
		<td><?php echo $row->PINJAMAN_ID; ?></td>
		<td><?php echo $row->NO_ANGGOTA; ?></td>
		<td><?php echo date("d M Y", strtotime($row->TGL_PINJAM)); ?></td>
		<td><?php echo date("d M Y", strtotime($row->TGL_KEMBALI)); ?></td>
		<td><?php echo $row->BATAS_PENGEMBALIAN; ?></td>
		<td><?php echo 0; ?></td>
		<td><?php echo anchor('laporan_pengembalian/detail/'.$row->ID, 'detail'); ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo empty($results) ? "<p>Data tidak ditemukan</p>" : "";