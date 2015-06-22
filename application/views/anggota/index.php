<script>
	$(function() {
		$( "#tabs" ).tabs({
			ajaxOptions: {
				error: function( xhr, status, index, anchor ) {
					$( anchor.hash ).html(
						"Couldn't load this tab. We'll try to fix this as soon as possible. " +
						"If this wouldn't be a demo." );
				},
				cache: false
			}
		});
		
		$("#request-list-anggota").click(function(){
			$.ajax({
				type: "GET",
				url: "<?php echo base_url(); ?>index.php/anggota/list_anggota_ajax/",
				cache: false,
				success: function(data){
					$("#list-anggota").html(data);
				},
				error: function(){
					alert("Gagal...!!");
				}
			});
			
			return false;
		});
		
		$("#dialog-form-anggota").dialog({
			autoOpen: false,
			modal: true,
			height: 500,
			width: 400,
			buttons: {
				"Edit Anggota" : function(){
					$(this).dialog('close');
					edit_anggota();
				},
				"Cancel" : function(){
					$(this).dialog('close');
				}
			}
		});
		
		$("a[class='edit']").click(function(){
			var edit_id = $(this).attr('id');
			$.ajax({
				type: "GET",
				dataType: "json",
				url: "<?php echo base_url(); ?>index.php/anggota/edit_ajax/"+edit_id,
				cache: false,
				success: function(data){
					$("input[name='no_anggota']").attr('value', data.no_anggota);
					$("input[name='nama_anggota']").attr('value', data.nama_anggota);
					$("textarea[name='alamat']").attr('value', data.alamat);
					$("input[name='no_tlp']").attr('value', data.no_tlp);
					$("input[name='kelas']").attr('value', data.kelas);
					$("#dialog-form-anggota").dialog('open');
				},
				error: function(){
					alert("Error");
				}
				
			});
			
			//$("#dialog-form-anggota").dialog('open');
			return false;
		});
	});
	
	function edit_anggota()
	{
		var edit_id = $("a[class='edit']").attr('id');
		var no_anggota = $("input[name='no_anggota']").attr('value');
		var nama_anggota = $("input[name='nama_anggota']").attr('value');
		var alamat = $("textarea[name='alamat']").attr('value');
		var no_telp = $("input[name='no_tlp']").attr('value');
		var kelas = $("input[name='kelas']").attr('value');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/anggota/update_anggota/",
			cache: false,
			data: $("#form-edit-ajax").serialize(),
			success: function(){
				$("#row_"+edit_id).html("<td>"+no_anggota+"</td><td>"+nama_anggota+"</td><td>"+alamat+"</td><td>"+no_telp+"</td><td>Edit | Delete</td>");
				alert('Data berhasil diupdate');
			},
			error: function(){
				alert('Data gagal diupdate');
			}
		});
	}
</script>
<div id="dialog-form-anggota" title="Edit Anggota">
	<form method="post" action="<?php echo base_url(); ?>anggota/update_ajax/" id="form-edit-ajax">
	<input type="hidden" name="no_anggota">
	<p>
		<label>Nama Anggota</label><br>
		<input type="text" size="35" name="nama_anggota">
	</p>
	<p>
		<label>Alamat</label><br>
		<textarea name="alamat" rows="5" cols="45">
		</textarea>
	</p>
	<p>
		<label>No Telp</label><br>
		<input type="text" size="25" name="no_tlp">
	</p>
	<p>
		<label>Kelas</label><br>
		<input type="text" size="25" name="kelas">
	</p>
	</form>
</div>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1" id="request-list-anggota">Daftar Anggota</a></li>
		<li><a href="<?php echo base_url(); ?>index.php/anggota/add">Tambah Katalog Baru</a></li>
	</ul>
	
	<div id="tabs-1">
		<img src="<?php echo base_url(); ?>asset/images/catalog64.png" align="left">
		<p style="border-bottom: 1px solid #757575; margin-left: 83px;">
			<b>MEMBER</b>- Jika ingin melakukan pencarian, silahkan masukan No Anggota kemudian klik tombol cari.<br>
			<form method="post" style="margin-left: 83px;">
			Masukan No Anggota : <input type="text" name="judul_buku" size="35">
			<?php echo form_submit('submit','cari')?>
			</form>
		</p>	
		<div id="list-anggota">
			<table cellpadding="5" cellspacing="0" width="100%">
				<tr>
					<th>No. Anggota</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>No Telp</th>
					<th></th>
				</tr>
				<?php  foreach ($results as $row) : ?>
				<tr id="row_<?php echo $row->ID; ?>">
					<td><?php echo $row->NO_ANGGOTA; ?></td>
					<td><?php echo $row->NAMA_ANGGOTA; ?></td>
					<td><?php echo $row->ALAMAT_RUMAH; ?></td>
					<td><?php echo $row->NO_TLP; ?></td>
					<td>
						<a href="#" class="edit" id="<?php echo $row->ID; ?>">Edit</a> |
						<a href="#" id="<?php echo $row->ID; ?>">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>


