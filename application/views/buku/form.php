<h2><span class="glyphicon glyphicon-book"></span> Katalog Baru</h2><hr/>
<?php echo isset($feedback_msg) ? "<div class='alert alert-info'>'".$feedback_msg. "</div>" : '' ?>
<div class="col-lg-6">
 <?php echo form_open("collection/save". (isset($book->ID) ? "?act=update" : "?act=insert")) ?>
 	<?php echo form_hidden('id', isset($book->ID) ? $book->ID : null) ?>
 	<div class="form-group">
 		<?php echo form_label('Klasifikasi','klasifikasi_id', null, 'class="form-control"')?>
 		<?php echo form_dropdown('klasifikasi_id', $clasifications, isset($book->KLASIFIKASI_ID) ? $book->KLASIFIKASI_ID : '', "class='form-control'")?>
		<?php echo form_error('klasifikasi_id')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Judul Pustaka','judul_pustaka')?>
		<?php echo form_input('judul_pustaka', set_value('judul_pustaka', isset($book->JUDUL_PUSTAKA) ? $book->JUDUL_PUSTAKA : ''), "class='form-control'")?>
		<?php echo form_error('judul_pustaka')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('ISBN/ISSN','isbn_issn')?>
		<?php echo form_input('isbn_issn', set_value('isbn_issn', isset($book->ISBN_ISSN) ? $book->ISBN_ISSN : ''), "class='form-control'")?>
		<?php echo form_error('isbn_issn')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Pengarang','pengarang')?>
		<?php echo form_input('pengarang', set_value('pengarang', isset($book->PENGARANG) ? $book->PENGARANG : ''), "class='form-control'")?>
		<?php echo form_error('pengarang')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Penerbit','penerbit')?>
		<?php echo form_input('penerbit', set_value('penerbit', isset($book->PENERBIT) ? $book->PENERBIT : ''), "class='form-control'")?>
		<?php echo form_error('penerbit')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Tahun Terbit','tahun_terbit')?>
		<?php echo form_input('tahun_terbit', set_value('tahun_terbit', isset($book->TAHUN_TERBIT) ? $book->TAHUN_TERBIT : ''), "class='form-control'")?>
		<?php echo form_error('tahun_terbit')?>
 	</div>
 	<?php if (!isset($book->ID)) : ?>
 	<div class="form-group">
 		<?php echo form_label('Qty','qty')?>
		<?php echo form_input(array('name' => 'qty', 'type' => 'number'), 
		      set_value('qty', isset($book->QTY) ? $book->QTY : ''), 
		      "class='form-control'")?>
		<?php echo form_error('tahun_terbit')?>
 	</div>
 	<?php endif; ?>
 	<div class="form-group">
 		<?php echo form_label('Status','status')?>
		<?php echo form_checkbox('status', isset($book->STATUS) ? $book->STATUS : FALSE, isset($book->STATUS) ? "checked" : "")?>
		<?php echo form_error('tahun_terbit')?>
 	</div>
 	<?php echo form_submit('submit','Simpan', 'class="btn btn-primary"')?>
	<?php echo anchor('collection', '<< Kembali', 'class="btn"') ?>
 </form>
<?php echo form_close()?>
</div>