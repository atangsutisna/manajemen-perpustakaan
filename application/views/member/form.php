<?php echo form_open('#'); ?>
	<?php echo form_hidden('id', isset($member->ID) ? $member->ID : null) ?>
 	<div class="form-group">
 		<?php echo form_label('Nama','nama', null, 'class="form-control"')?>
 		<?php echo form_input('nama', set_value('nama', isset($member->NAMA) ? $member->NAMA : ''), "class='form-control'")?>
		<?php echo form_error('nama')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Alamat Rumah','alamat_rumah') ?>
		<?php echo form_textarea('alamat', set_value('alamat', isset($member->ALAMAT) ? $member->ALAMAT : ''), "class='form-control'") ?>
		<?php echo form_error('alamat_rumah')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Kota','kota') ?>
		<?php echo form_input('kota', set_value('kota', isset($member->KOTA) ? $member->KOTA : ''), "class='form-control'") ?>
		<?php echo form_error('kota') ?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('No Telp','telepon') ?>
		<?php echo form_input('no_telepon', set_value('no_telepon', isset($member->NO_TELEPON) ? $member->NO_TELEPON : ''), "class='form-control'") ?>
		<?php echo form_error('no_telepon') ?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('No HP','no_hp') ?>
		<?php echo form_input('no_hp', set_value('no_hp', isset($member->hp) ? $member->hp : ''), "class='form-control'") ?>
		<?php echo form_error('no_hp') ?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Email','email') ?>
		<?php echo form_input('email', set_value('email', isset($member->EMAIL) ? $member->EMAIL : ''), "class='form-control'") ?>
		<?php echo form_error('email') ?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Status','status')?>
		<?php echo form_checkbox('status', isset($member->STATUS) ? $member->STATUS : FALSE, isset($member->STATUS) ? "checked" : "")?>
		<?php echo form_error('status')?>
 	</div>
 	<?php echo form_submit('submit','Simpan', 'class="btn btn-primary"')?>
	<?php echo anchor('member', '<< Kembali', 'class="btn"') ?>
<?php echo form_close(); ?>