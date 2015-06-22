<html>
<head>
	<title>Aplikasi Perpustakaan SMA PGRI Rancaekek Bandung</title>
<link rel="stylesheet" href="<?=base_url()?>asset/css/login_style.css" type="text/css">
</head>

<body>
<div id="wrapper">
	<?=form_open('login')?>
	<table cellpadding="5" cellspacing="5">
		<tr>
			<td colspan="2">
				<h2 style="font-family: Times New Roman; border-bottom: 1px solid #006699;">Login</h2>
				<?=notice()?>
			</td>
		</tr>
		<tr>
			<td valign="top">Username </td>
			<td>: <?=form_input('username', NULL, 'size="30"')?> <?=form_error('username')?></td>
		</tr>
		<tr>
			<td valign="top">Password </td>
			<td>: <?=form_password('password', NULL, 'size="30"')?> <?=form_error('password')?></td>
		</tr>
		<tr>
			<td></td>
			<td><?=form_submit('submit', 'Login')?></td>
		</tr>
	</table>
	<div id="footer">
		&copy;Copyright 2012
	</div>
	<?=form_close()?>
</div>
</body>
</html>