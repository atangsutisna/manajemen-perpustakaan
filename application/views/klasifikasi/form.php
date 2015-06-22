<h2><?=$title?></h2>
<?php 
   if (isset($result))
   {
		$row = $result;
   }
 ?>
<?=anchor('klasifikasi','<< Kembali')?>
<?=form_open($action)?>
<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
<table cellpadding="5" cellspacing="0">
<tr>
	<td><?php echo form_label('ID Klasifikasi', 'id_klasifikasi'); ?></td>
	<td>
		<?php echo form_input('klasifikasi_id'); ?>
		<?php echo form_error('klasifikasi_id'); ?>
	</td>
</tr>
<tr>
	<td valign="top"><?=form_label('Nama Klasifikasi','nama_klasifikasi')?></td>
	<td><?=form_input('nama_klasifikasi', set_value('nama_klasifikasi', isset($row->NAMA_KLASIFIKASI) ? $row->NAMA_KLASIFIKASI : ''))?>
	<?=form_error('nama_klasifikasi')?>
	</td>
</tr>
<tr>
	<td colspan="2"><?=form_submit('submit','Simpan')?>
	<?=form_button(array('name' => 'Kembali', 'onclick' => " document.location.href='klasifikasi'"), 'Kembali')?>
	</td>
</tr>
</table>
<?=form_close()?>