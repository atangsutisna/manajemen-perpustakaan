<?php 
   if (isset($result))
   {
		$row = $result;
   }
 ?>
 <script>	
	$(function(){
		
		$("#dialog-confirm").dialog({
				autoOpen: false,
				resizable: true,
				height: 170,
				width: 300,
				modal: true,
				buttons: {
					"Ya" : function(){
						$(this).dialog("close");
						var datas = $("#book-form :input");
						var values = {}
						datas.each(function(){	
							values[this.name] = $(this).val();
						});
			
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>index.php/buku/save",
							data: values,
							success: function(data){
								$("#book-form").remove();
								$("#form-container").html(data);
							},
							error: function(){
								$('.ui-widget').html("Error Occur..!!");
							}
						});
					},
					"Tidak": function(){
						$(this).dialog("close");
					}
				}
		});
		
		$('#submit').click(function(){	
			$('#dialog-confirm').dialog('open');
			return false;
		});
	
	});
 </script>
 
 <div id="dialog-confirm" title="Pemberitahuan">
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
		Apakah Anda akan langsung memasukan buku ini ke dalam daftar koleksi ?
	</p>
 </div>
 
 <div id="form-container">
	<form id="book-form">
	<?=form_hidden('id', set_value('id', isset($row->ID) ? $row->ID : ''))?>
	<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<td><?=form_label('Klasifikasi','klasifikasi_id')?></td>
		<td><?=form_dropdown('klasifikasi_id', $clasifications, isset($row->KLASIFIKASI_ID) ? $row->KLASIFIKASI_ID : '', "id=klasifikasi_id")?>
		<?=form_error('klasifikasi_id')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Judul Pustaka','judul_pustaka')?></td>
		<td><?=form_input('judul_pustaka', set_value('judul_pustaka', isset($row->JUDUL_PUSTAKA) ? $row->JUDUL_PUSTAKA : ''), ' size="80" id="judul_pustaka"')?>
		<?=form_error('judul_pustaka')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('ISBN/ISSN','isbn_issn')?></td>
		<td><?=form_input('isbn_issn', set_value('isbn_issn', isset($row->ISBN_ISSN) ? $row->ISBN_ISSN : ''), ' size="50" id="isbn_issn"')?>
		<?=form_error('isbn_issn')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Pengarang','pengarang')?></td>
		<td><?=form_input('pengarang', set_value('pengarang', isset($row->PENGARANG) ? $row->PENGARANG : ''), 'size="50" id="pengarang" ')?>
		<?=form_error('pengarang')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Penerbit','penerbit')?></td>
		<td><?=form_input('penerbit', set_value('penerbit', isset($row->PENERBIT) ? $row->PENERBIT : ''), 'size="50" id="penerbit" ')?>
		<?=form_error('penerbit')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Tempat Terbit','tempat_terbit')?></td>
		<td><?=form_input('tempat_terbit', set_value('tempat_terbit', isset($row->TEMPAT_TERBIT) ? $row->TEMPAT_TERBIT : ''), 'size="50" id="tempat_terbit"')?>
		<?=form_error('tempat_terbit')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Tahun Terbit','tahun_terbit')?></td>
		<td><?=form_input('tahun_terbit', set_value('tahun_terbit', isset($row->TAHUN_TERBIT) ? $row->TAHUN_TERBIT : ''), 'size="20" id="tahun_terbit"')?>
		<?=form_error('tahun_terbit')?>
		</td>
	</tr>
	<tr>
		<td><?=form_label('Edisi','edisi')?></td>
		<td><?=form_input('edisi', set_value('edisi', isset($row->EDISI) ? $row->EDISI : ''), 'size="20" id="edisi" ')?>
		<?=form_error('edisi')?>
		</td>
	</tr>
	<tr>
		<td colspan="2"><?=form_submit('submit','Simpan', 'id=submit')?>
		<?=form_button(array('name' => 'Kembali', 'onclick' => " document.location.href='buku'"), 'Kembali')?>
		</td>
	</tr>
	</table>
</div>
<?=form_close()?>