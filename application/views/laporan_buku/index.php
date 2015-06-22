<h2>Laporan Buku</h1>
<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<th>No</th>
		<th>Judul Pustaka</th>
		<th>Stok</th>
		<th>Dipinjam</th>
		<th>Hilang</th>
		<th>Rusak</th>
		<th>Tersedia</th>
	</tr>
	<?php $no = 1; ?>
	<?php foreach ($results as $row) : ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
		<td><?php 
			$stock = $row->JUMLAH; 
			echo $stock;
			?>
		</td>
		<td><?php
				$dipinjam = count_book($row->JUDUL_PUSTAKA); 
				echo $dipinjam;
			?>
		</td>
		<td><?php 
				$hilang = count_book($row->JUDUL_PUSTAKA, 'hilang'); 
				echo $hilang;
			?>
		</td>
		<td><?php 
				$rusak = count_book($row->JUDUL_PUSTAKA, 'rusak'); 
				echo $rusak;
			?>
		</td>
		<td>
			<?php
				$tersedia = $stock - ($dipinjam - $hilang - $rusak);
				echo $tersedia;
			?>
		</td>
	</tr>
	<?php $no++; ?>
	<?php endforeach; ?>
</table>