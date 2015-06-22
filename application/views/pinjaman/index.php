<h2>Pinjaman</h2>
<p>Untuk mengecek pinjaman anggota, silahkan masukan <b>No Anggota</b> pada kolom berikut : </p>
<?php echo $this->session->flashdata('notice'); ?>
<!-- start form pencarian -->
<?php echo form_open('pinjaman/find')?>
	<table cellspacing="0" cellpadding="5">
	<tr>
		<td valign="top"><?=form_label('No Anggota','no_anggota')?></td>
		<td>
			<?=form_input("no_anggota", NULL, 'size="35"')?>
			<?=form_error("no_anggota")?>
		</td>
		<td valign="top"><?=form_submit('submit','cari')?></td>
	</table>
<?=form_close()?>
<!-- end form pencarian -->
<?php if (! empty($anggota)) : ?>
<?php echo form_open("pinjaman/create_pinjaman"); ?>
<table cellpadding="5" cellspacing="0" width="50%">
	<tr>
		<td><b>No</b></td>
		<td>: <?php echo $anggota->NO_ANGGOTA; ?></td>
	</tr>
	<tr>
		<td><b>Nama</b></td>
		<td>: <?php echo $anggota->NAMA_ANGGOTA; ?></td>
	</tr>
	<tr>
		<td><b>Alamat</b></td>
		<td>: <?php echo $anggota->ALAMAT_RUMAH; ?></td>
	</tr>
	<tr>
		<td><b>No Telp</b></td>
		<td>: <?php echo $anggota->NO_TLP; ?></td>
	</tr>
	<tr>
		<td><b>Kelas</b></td>
		<td>: <?php echo $anggota->KELAS; ?></td>
	</tr>
	<tr>
		<td><b>Jenis Kelamin</b></td>
		<td>: <?php echo $anggota->JENIS_KELAMIN ? "Pria" : "Wanita" ; ?></td>
	</tr>
	<tr>
		<td><b>Pinjaman</b></td>
		<td>: <?php echo $anggota->STATUS_PINJAMAN ? "Ada Pinjaman" : "Tidak Ada Pinjaman" ; ?></td>
	</tr>
	<tr>
		<td colspan="2" align="right">	
			<?php if (! isset($pinjaman)) : ?>
			<input type="hidden" name="no_anggota" value="<?php echo $anggota->NO_ANGGOTA; ?>">
			<input type="submit" value="Buat Pinjaman">
			<?php endif; ?>
		</td>
	</tr>
</table>
<?php echo form_close(); ?>
<p>&nbsp;</p>
<!-- data pinjaman -->
<?php if (isset($pinjaman)) : ?>
<div id="pinjaman">
	<h2>#Pinjaman</h2>
	<form method="POST" action="create_pengembalian">
		<input type="hidden" name="pinjaman_id" value="<?php echo $pinjaman->ID; ?>">
		<p><b>Tanggal Pinjam : </b><?php echo date("d M Y", strtotime($pinjaman->TGL_PINJAM)); ?></p>
		<table cellspacing="0" cellpadding="5" width="100%">
			<tr>
				<th>No Induk</th>
				<th>Judul Pustaka</th>
				<th>Aksi</th>
			</tr>
			<?php foreach ($data_pinjaman as $row) : ?>
			<tr>
				<td><?php echo $row->NO_INDUK; ?></td>
				<td><?php echo $row->JUDUL_PUSTAKA; ?></td>
				<td align="center">
					<select name="status_buku[<?php echo $row->NO_INDUK; ?>]">
						<option value="kembali" selected>Kembali</option>
						<option value="rusak">Rusak</option>
						<option value="hilang">Hilang</option>
					</select>
				</td>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="3" align="right"><input type="submit" name="pengembalian" value="Catat Pengembalian"></td>
			</tr>
		</table>
	</form>
</div>
<?php endif;?>
<!-- end pinjaman -->
<?php else: ?>
	<p style="color: red;">Data tidak ditemukan ..</p>
<?php endif; ?>