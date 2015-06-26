<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Perpustakaan SMA PGRI Rancaekek Bandung</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<h2>Loggin</h2><hr/>
			<?php echo form_open('opensession', 'form-signin') ?>
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control">
				<?php echo form_error('username') ?>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="text" name="password" class="form-control">
				<?php echo form_error('password')?>
			</div>
			<?php echo form_submit('submit', 'Login', 'class="btn btn-primary"')?>
			<?php echo form_close() ?>
		</div>
	</div>
</div>
</body>
</html>