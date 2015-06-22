<h2><?=$title?></h2>
<?php 
   if (isset($result))
   {
		$row = $result;
   }
 ?>
<?=anchor('menu','<< Kembali')?>
<?=form_open($action)?>
<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
<table cellpadding="5" cellspacing="0">
<tr>
	<td valign="top"><?=form_label('Menu Group','menu_group_id')?></td>
	<td><?=form_dropdown('menu_group_id', $menu_group_options, set_value('menu_group_id', isset($row->MENU_GROUP_ID) ? $row->MENU_GROUP_ID : ''))?>
	<?=form_error('menu_group_id')?>
	</td>
</tr>
<tr>
	<td valign="top"><?=form_label('Nama Menu','nama_menu')?></td>
	<td><?=form_input('nama_menu', set_value('nama_menu', isset($row->NAMA_MENU) ? $row->NAMA_MENU : ''), 'size="35"')?>
	<?=form_error('nama_menu')?>
	</td>
</tr>
<tr>
	<td valign="top"><?=form_label('URL', 'url')?></td>
	<td><?=form_input('url', set_value('url', isset($row->URL) ? $row->URL : ''), 'size="35"')?>
	<?=form_error('url')?>
	</td>
</tr>
<tr>
	<td valign="top"><?=form_label('Urutan', 'urutan')?></td>
	<td><?=form_input('urutan', set_value('urutan', isset($row->URUTAN) ? $row->URUTAN : ''), 'size="5"')?>
	<?=form_error('urutan')?>
	</td>
</tr>
<tr>
	<td colspan="2"><?=form_submit('submit','Simpan')?>
	<?=form_button(array('name' => 'Kembali', 'onclick' => " document.location.href='menu'"), 'Kembali')?>
	</td>
</tr>
</table>
<?=form_close()?>