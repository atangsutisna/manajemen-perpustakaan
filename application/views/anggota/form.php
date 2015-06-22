<script>
	$(function(){
		$('#form-anggota').submit(function(){
			$.ajax({
				url: $(this).attr('action'),
				type: "POST",
				data: $(this).serialize(),
				success: function(){
					alert("Data sudah disimpan");
				},
				error: function(){
					alert("Data sudah disimpan");
				}
			});
			return false;
		});
	});
</script>
<form name="form-anggota" id="form-anggota" action="<?php echo base_url(); ?>index.php/anggota/save_ajax" method="post">
<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
<table cellpadding="5" cellspacing="0">
<tr>
	<td><?=form_label('No Anggota','no_anggota')?></td>
	<td><?=form_input('no_anggota', set_value('no_anggota', isset($row->NO_ANGGOTA) ? $row->NO_ANGGOTA : ''), 'size=35')?>
	<?=form_error('no_anggota')?>
	</td>
</tr>
<tr>
	<td><?=form_label('Nama anggota','nama_anggota')?></td>
	<td><?=form_input('nama_anggota', set_value('nama_anggota', isset($row->NAMA_ANGGOTA) ? $row->NAMA_ANGGOTA : ''))?>
	<?=form_error('nama_anggota')?>
	</td>
</tr>
<tr>
	<td valign="top"><?=form_label('Alamat Rumah','alamat_rumah')?></td>
	<td><?=form_textarea('alamat_rumah', set_value('alamat_rumah', isset($row->ALAMAT_RUMAH) ? $row->ALAMAT_RUMAH : ''), " cols='40' rows='8' style='width: 616px; height: 145px;'")?>
	<?=form_error('alamat_rumah')?>
	</td>
</tr>
<tr>
	<td><?=form_label('No Telp','no_tlp')?></td>
	<td><?=form_input('no_tlp', set_value('no_tlp', isset($row->NO_TLP) ? $row->NO_TLP : ''))?>
	<?=form_error('no_tlp')?>
	</td>
</tr>
<tr>
	<td><?=form_label('Kelas','kelas')?></td>
	<td><?=form_input('kelas', set_value('kelas', isset($row->KELAS) ? $row->KELAS : ''))?>
	<?=form_error('kelas')?>
	</td>
</td>
<tr>
	<td><?=form_label('Jenis Kelamin','jenis_kelamin')?></td>
	<td><?=form_dropdown('jenis_kelamin',array('0' => 'Wanita', '1' => 'Pria'), isset($row->JENIS_KELAMIN) ? $row->JENIS_KELAMIN : '')?>
	<?=form_error('jenis_kelamin')?>
	</td>
</tr>
<tr>
	<td colspan="2">
		<input type="submit" name="submit" value="Simpan">
	</td>
</tr>
</table>
<?=form_close()?>