<div class="col-lg-6">
 <?php echo form_open("book/saveBook") ?>
 	<div class="form-group">
 		<?php echo form_label('Klasifikasi','klasifikasi_id', null, 'class="form-control"')?>
 		<?php echo form_dropdown('klasifikasi_id', $clasifications, isset($row->KLASIFIKASI_ID) ? $row->KLASIFIKASI_ID : '', "class='form-control'")?>
		<?php echo form_error('klasifikasi_id')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Judul Pustaka','judul_pustaka')?>
		<?php echo form_input('judul_pustaka', set_value('judul_pustaka', isset($row->JUDUL_PUSTAKA) ? $row->JUDUL_PUSTAKA : ''), "class='form-control'")?>
		<?php echo form_error('judul_pustaka')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('ISBN/ISSN','isbn_issn')?>
		<?php echo form_input('isbn_issn', set_value('isbn_issn', isset($row->ISBN_ISSN) ? $row->ISBN_ISSN : ''), "class='form-control'")?>
		<?php echo form_error('isbn_issn')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Pengarang','pengarang')?>
		<?php echo form_input('pengarang', set_value('pengarang', isset($row->PENGARANG) ? $row->PENGARANG : ''), "class='form-control'")?>
		<?php echo form_error('pengarang')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Penerbit','penerbit')?>
		<?php echo form_input('penerbit', set_value('penerbit', isset($row->PENERBIT) ? $row->PENERBIT : ''), "class='form-control'")?>
		<?php echo form_error('penerbit')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Tempat Terbit','tempat_terbit')?>
		<?php echo form_input('tempat_terbit', set_value('tempat_terbit', isset($row->TEMPAT_TERBIT) ? $row->TEMPAT_TERBIT : ''), "class='form-control'")?>
		<?php echo form_error('tempat_terbit')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Tahun Terbit','tahun_terbit')?>
		<?php echo form_input('tahun_terbit', set_value('tahun_terbit', isset($row->TAHUN_TERBIT) ? $row->TAHUN_TERBIT : ''), "class='form-control'")?>
		<?php echo form_error('tahun_terbit')?>
 	</div>
 	<div class="form-group">
 		<?php echo form_label('Edisi','edisi')?>
		<?php echo form_input('edisi', set_value('edisi', isset($row->EDISI) ? $row->EDISI : ''), "class='form-control'")?>
		<?php echo form_error('edisi')?>
 	</div>
 	<?php echo form_submit('submit','Simpan', 'class="btn btn-primary"')?>
	<?php echo form_button(array('class' => 'btn'), 'Kembali')?>
 </form>
<?php echo form_close()?>
</div>