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
	<?php echo anchor('collection/new_form', 'Katalog Baru', 'class="btn btn-primary"') ?>
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
	<!--Total : <?php //echo $row_amount; ?> book
</div>-->
<br/><br/>
<table class="table table-bordered table table-striped">
	<tr>
		<th>No</th>
		<th>Kode <br/>ISBN/ISNN</th>
		<th>Judul Pustaka<br/>Pengarang</th>
		<th>Jml</th>
		<th>Status</th>
		<th>Tgl Pembuatan/Perubahan</th>
		<th>#</th>
	</tr>
	<?php foreach ($list_collection as $idx => $row) : ?>
	<tr>
		<td><?php echo $idx + 1; ?></td>
		<td>
			<?php echo !empty($row->KODE_PUSTAKA) ? $row->KODE_PUSTAKA : "null" ?><br/>
			<?php echo $row->ISBN_ISSN ?>
		</td>
		<td>
			<?php echo $row->JUDUL_PUSTAKA ?><br/>
			<em><?php echo $row->PENGARANG ?></em>
		</td>
		<td class="text-right"><?php echo $row->QTY ?>bh</td>
		<td><?php echo $row->STATUS ? 'active' : 'inactive' ?></td>
		<td>
			<b>Pembuatan: </b><?php echo date("d M Y", strtotime($row->TANGGAL_PEMBUATAN)) ?><br/>
		    <b>Perubahan: </b><?php echo date("d M Y", strtotime($row->TANGGAL_PERUBAHAN)) ?>
		</td>
		<td><?php echo anchor('collection/form_edit/'. $row->ID, 'Edit') ?></a></td>
	</tr>
	<?php endforeach; ?>
</table>
<div style="text-align: center">
	<?php echo isset($pages) ? $pages : ''; ?>
</div>