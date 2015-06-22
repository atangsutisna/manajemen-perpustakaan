<h2>Sistem Setting</h2>
<?php 
	foreach ($results as $row){}
	echo notice();
?>
<?=form_open('setting/save')?>
<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
	<table cellspacing="0" cellpadding="5">
		<tr>
			<td valign="top">Nama Aplikasi </td>
			<td>: 
			<?=form_input('nama_app', set_value('nama_app', isset($row->NAMA_APP) ? $row->NAMA_APP : ''), 'size="50"')?>
			<?=form_error('nama_app')?>
			</td>
		</tr>
		<tr>
			<td valign="top">Denda Keterlambatan Pengembalian Buku </td>
			<td>: 
			<?=form_input('denda', set_value('denda', isset($row->DENDA) ? $row->DENDA : ''))?> / hari
			<?=form_error('denda')?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><?=form_submit('submit','Simpan')?></td>
		</tr>
	</table>
<?=form_close()?>