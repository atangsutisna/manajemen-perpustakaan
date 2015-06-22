<div style="padding : 10px; border : 1px solid #C1CDCD; margin : 10px;">
	<h2>Your Profile</h2>
	<?php echo form_open('user/update'); ?>
	<?php echo notice(); ?>
	<?php echo validation_errors(); ?>
	<input type="hidden" name="user_id" value="<?php echo $user->ID; ?>">
	<p>
		<label>Nama Lengkap</label><br>
		<input type="text" name="nama_lengkap" size="35" value="<?php echo $user->NAMA_LENGKAP?>">
	</p>
	<p>
		<label>Email</label><br>
		<input type="text" name="email" size="35" value="<?php echo $user->EMAIL; ?>">
	</p>
	<p>
		<label>No Telepon</label><br>
		<input type="text" name="no_telp" size="35" value="<?php echo $user->NO_TELP; ?>">
	</p>
	
	<h2>Your Account</h2>
	<p>
		<label>Username</label><br>
		<input type="text" name="username" size="35" value="<?php echo $user->USERNAME; ?>" readonly="readonly">
	</p>
	<p>
		<label>Password</label><br>
		<input type="text" name="password" size="35">
	</p>
	<p>
		<label>Retype Password</label><br>
		<input type="text" name="retype_password" size="35">
	</p>
	<input type="submit" value="Simpan Perubahan">
	<?php echo form_close(); ?>
</div>