<h2>Your Profile</h2>
<?php echo form_open('user/update'); ?>
	<?php echo validation_errors(); ?>
	<input type="hidden" name="user_id" value="<?php echo $user->ID; ?>">
	<div class="form-group">
		<label>Nama Lengkap</label><br>
		<input type="text" name="nama_lengkap" size="35" value="<?php echo $user->NAMA_LENGKAP?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Email</label><br>
		<input type="text" name="email" size="35" value="<?php echo $user->EMAIL; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>No Telepon</label><br>
		<input type="text" name="no_telp" size="35" value="<?php echo $user->NO_TELP; ?>" class="form-control">
	</div>
	
	<h2>Your Account</h2>
	<div class="form-group">
		<label>Username</label><br>
		<input type="text" name="username" size="35" value="<?php echo $user->USERNAME; ?>" readonly="readonly" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label><br>
		<input type="text" name="password" size="35" class="form-control">
	</div>
	<div class="form-group">
		<label>Retype Password</label><br>
		<input type="text" name="retype_password" size="35" class="form-control">
	</div>
	<input type="submit" value="Simpan Perubahan" class="btn btn-primary">
<?php echo form_close(); ?>
