<!DOCTYPE html>
<html>
<head>
	<title><?php echo isset($nama_app) ? $nama_app : 'No Application Title'?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<!--
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/backend_style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/cssverticalmenu.css">
	-->
	
	<link rel="stylesheet" type="text/css" 
	href="<?php echo base_url()?>development-bundle/themes/ui-lightness/jquery-ui-1.8.14.custom.css">
	<script src="<?php echo base_url()?>development-bundle/jquery-1.5.1.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.tabs.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.mouse.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.button.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.draggable.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.position.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.dialog.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.resizable.js"></script>
	<script src="<?php echo base_url()?>development-bundle/ui/jquery.ui.dialog.js"></script>
	<script>
		$(function(){
			$( "#dialog:ui-dialog" ).dialog( "destroy" );
		});
	</script>
	<style>
		.ui-state-highlight {
			padding : 10px;
		}
		.ui-tabs .ui-tabs-panel {
			
			padding:5px;
			margin:0;
		}
		
		.header {
			background-image: url("<?php echo base_url(); ?>asset/images/header.png");
		}
	</style>
</head>

<body>
<div class="container">
	<div class="row header">
		<h1><?php echo isset($nama_app) ? $nama_app : 'No Application Title'?></h1>
	</div>
	<div class="row">
		<?php echo anchor('user', 'Ubah Profil'); ?> | 
		<?php echo anchor('buku', 'Tambah Katalog Baru'); ?> |
		<?php echo anchor('circulation', 'Mulai Transaksi Baru'); ?> |
		<?php echo anchor('#', 'Pengembalian Cepat'); ?> |
		<?php echo anchor('anggota', 'Tambah Anggota'); ?> |
		<?php echo anchor('logout', 'Loggout'); ?>
	</div>
	<div class="row">
		<?php $this->load->view($main); ?>	
	</div>

	<div class="row">
		<span class="center">
		&copy; <b>Copyright 2012 by xit-solution</b>
		</span>
	</div>
</div>
</body>

</html>