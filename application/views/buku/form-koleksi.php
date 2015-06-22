<script>
$(function(){
	$("#save_nnext").click(function(){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/buku/save_tocollection",
			data: $("#collection").serialize(),
			success: function(){
				$("input[type='text']").attr('value', '');
				alert("Data sudah disimpan");
			},
			error: function(){
				alert("Data gagal disimpan");
			}
		});
		return false;
	});
	
	$("#simpan").click(function(){
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/buku/save_tocollection",
			data: $("#collection").serialize(),
			success: function(){
				//$("input[type='text']").attr('value', '');
				alert("Data sudah disimpan");
				window.location.href = "<?php  echo base_url(); ?>index.php/buku";
			},
			error: function(){
				alert("Data gagal disimpan");
			}
		});
		
		return false;
	});
	
	var dates = $( "#tgl_pesanan, #tgl_penerimaan" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "tgl_pesanan" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
	});
});
</script>
<form name="collection" id="collection">
<input type="hidden" name="buku_id" value="<?php echo $book->ID; ?>">
<table cellpadding="5" width="100%" cellspacing="0">
	<tr>
		<td>Judul Pustaka</td>
		<td>: <?php echo $book->JUDUL_PUSTAKA; ?></td>
	</tr>
	<tr>
		<td>Kode</td>
		<td><input type="text" name="kode" size="50" id="kode"></td>
	</tr>
	<tr>
		<td>Penempatan</td>
		<td><input type="text" name="penempatan" size="50" id="penempatan"></td>
	</tr>
	<tr>
		<td>Type Koleksi</td>
		<td>
			<select name="type_koleksi">
				<option value="textbook">Textbook</option>
				<option value="textbook">Majalah</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>No Pesanan</td>
		<td><input type="text" name="no_pesanan" size="50" id="no_pesanan"></td>
	</tr>
	<tr>
		<td>Tgl Pesanan</td>
		<td><input type="text" name="tgl_pesanan" size="50" id="tgl_pesanan"></td>
	</tr>
	<tr>
		<td>Tgl Penerimaan</td>
		<td><input type="text" name="tgl_penerimaan" size="50" id="tgl_penerimaan"></td>
	</tr>
	<tr>
		<td>Penyedia</td>
		<td><input type="text" name="penyedia" size="50" id="penyedia"></td>
	</tr>
	<tr>
		<td>Faktur</td>
		<td><input type="text" name="faktur" size="50" id="faktur"></td>
	</tr>
	<tr>
		<td>Tgl Faktur</td>
		<td><input type="text" name="tgl_faktur" size="50" id="tgl_faktur"></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td><input type="text" name="harga" size="50" id="harga"></td>
	</tr>
</table>
<input type="submit" value="Simpan" name="submit" id="simpan"> <input type="button" value="Simpan dan Lanjutkan" name="save_nnext" id="save_nnext">
</form>
