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
<div class="alert alert-info">
	<b>INFO</b>- Jika ingin melakukan pencarian, silahkan masukan Judul book kemudian klik tombol cari.<br>
</div>
<div class="pull-right">
	<?php echo anchor('book/new_form', 'Katalog Baru', 'class="btn btn-primary"') ?>
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
<!--
<div style="float: right; margin-top:10px;">
	<!--Total : <?php //echo $book_amount; ?> book
</div>-->
<br/><br/>
<table class="table table-bordered table table-striped">
	<tr>
		<th>No</th>
		<th>ISBN/ISNN</th>
		<th>Barcode</th>
		<th>Judul Pustaka</th>
		<th>Status</th>
		<th>Pembuatan</th>
		<th>Terakhir diubah</th>
		<th>#</th>
	</tr>
	<?php foreach ($list_book as $row => $book) : ?>
	<tr>
		<td><?php echo $row + 1; ?></td>
		<td><?php echo $book->ISBN_ISSN ?></td>
		<td>empty</td>
		<td><?php echo $book->JUDUL_PUSTAKA ?></td>
		<td><?php echo $book->STATUS ? 'active' : 'inactive' ?></td>
		<td><?php echo date("d M Y", strtotime($book->TANGGAL_PEMBUATAN)) ?></td>
		<td><?php echo date("d M Y", strtotime($book->TANGGAL_PERUBAHAN)) ?></td>
		<td><?php echo anchor('book/form_edit/'. $book->ID, 'Edit') ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
<div style="text-align: center">
	<?php echo isset($pages) ? $pages : ''; ?>
</div>