<script>
/**
 $(function(){
	$("#form-klasifikasi").hide();
	
	$('#tabs').tabs({
		ajaxOptions: {
				beforeSend: function(){
					$("#loading").show();
				},
				error: function( xhr, status, index, anchor ) {
							$( anchor.hash ).html(
								"Couldn't load this tab. We'll try to fix this as soon as possible. " +
								"If this wouldn't be a demo." );
						},
				cache: false,
				complete: function(){
					$("#loading").hide();
				}
		}
	});
	
	$("#katalog").click(function(){
		$.ajax({
			type: "GET",
			cache: false,
			beforeSend: function(){
					$("#loading").show();
			},
			complete: function(){
					$("#loading").hide();
			},
			url: "<?php echo base_url(); ?>index.php/book/show_catalog_ajax",
			success: function(data){
				$("#list-book").html(data);
			}
		});
	});
	
	$("#loading").hide();
 });**/
</script>
<?php echo $this->session->flashdata('notice')?>
<ul>
	<li><a href="#tabs-1" id="katalog">Daftar Katalog</a></li>
	<li><a href="<?php echo base_url(); ?>index.php/book/add">Tambah Katalog Baru</a></li>
	<li><a href="<?php echo base_url(); ?>index.php/book/show_koleksi_ajax">Daftar Koleksi</a></li>
	<li><a href="<?php echo base_url(); ?>index.php/book/show_koleksi_keluar">Daftar Koleksi Keluar</a></li>
</ul>

<div class="alert alert-info">
	<b>INFO</b>- Jika ingin melakukan pencarian, silahkan masukan Judul book kemudian klik tombol cari.<br>
</div>
<form method="post" class="form-inline">
	<div class="form-group">
		<input type="text" name="judul_book" class="form-control" placeholder="Masukan judul buku">
	</div>
	<div class="form-group">
	    <?php echo form_dropdown('clasifications', $clasifications, null, 'class="form-control"'); ?>
	</div>
	<button type="submit" class="btn">
		<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
	</button>
</form>
<div style="float: right; margin-top:10px;">
	Total : <?php echo $book_amount; ?> book
</div>
<table class="table table-bordered table table-striped">
	<tr>
		<th>No</th>
		<th>Judul Pustaka</th>
		<th>ISBN/ISNN</th>
		<th>Qty</th>
		<th>Terakhir diubah</th>
		<th>#</th>
	</tr>
	<?php foreach ($list_book as $row => $book) : ?>
	<tr>
		<td><?php echo $row + 1; ?></td>
		<td><?php echo $book->JUDUL_PUSTAKA ?></td>
		<td><?php echo $book->ISBN_ISSN ?></td>
		<td><?php echo $book->JUMLAH ?></td>
		<td><?php echo date("d M Y", strtotime($book->TANGGAL_INPUT)) ?></td>
		<td><a href="#">Edit</a></td>
	</tr>
	<?php endforeach; ?>
</table>
<div style="text-align: center">
	<?php echo isset($pages) ? $pages : ''; ?>
</div>