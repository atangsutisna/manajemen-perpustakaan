<h2>Transaksi Pinjaman</h2>
<?=anchor('pinjaman','<< Pinjaman')?>
<?=form_open($action)?>
<table cellpadding="5" cellspacing="0">
	<tr>
		<td valign="top"><?=form_label('No Anggota', 'no_anggota')?></td>
		<td><?=form_input('no_anggota', set_value('no_anggota'))?>
		<?=form_error('no_anggota')?>
		</td>
	</tr>
	<tr>
		<td valign="top"><?=form_label('No Induk Buku', 'no_induk')?></td>
		<td><?=form_input('no_induk', set_value('no_induk'))?>
		<?=form_error('no_induk')?>
		</td>
	</tr>
	<tr>
		<td><?=form_submit('submit','Simpan')?></td>
	</tr>
</table>
<?=form_close()?>