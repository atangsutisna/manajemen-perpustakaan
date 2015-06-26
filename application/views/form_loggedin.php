<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Perpustakaan SMA PGRI Rancaekek Bandung</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}
		
		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		
		.form-signin .checkbox {
		  font-weight: normal;
		}
		
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		
		.form-signin input[type="text"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	</style>
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3">
			<h2>Please Logged In</h2>
			<?php echo form_open('login', 'form-signin') ?>
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