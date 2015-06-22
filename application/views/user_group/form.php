<h2><?=$title?></h2>
<?php 
   if (isset($result))
   {
		$row = $result;
   }
 ?>
<?=anchor('user_group','<< Kembali')?>
<?=form_open($action)?>
<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
<table cellpadding="5" cellspacing="0">
<tr>
	<td valign="top"><?=form_label('Nama Group','nama_group')?></td>
	<td><?=form_input('nama_group', set_value('nama_group', isset($row->NAMA_GROUP) ? $row->NAMA_GROUP : ''))?>
	<?=form_error('nama_group')?>
	</td>
</tr>
<tr>
	<td colspan="2"><?=form_submit('submit','Simpan')?>
	<?=form_button(array('name' => 'Kembali', 'onclick' => " document.location.href='user_group'"), 'Kembali')?>
	</td>
</tr>
</table>
<?=form_close()?>