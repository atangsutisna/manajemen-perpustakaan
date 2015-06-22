<script>
	$(function(){
		$("#tabs").tabs();
		$("#warning-message").dialog({
			autoOpen: false,
			modal: true,
			buttons: {
				"Ok" : function(){
					$(this).dialog("close");
				}
			}
		});
		
		$("#peminjaman").submit(function(){
			var book;
			var ada_pinjaman = $("#pinjaman").val();
			if (ada_pinjaman)
			{
				alert("Anggota ini masih mempunyai pinjaman..!");
			}
			else
			{
				$.ajax({	
					type: "POST",
					url: "<?php echo base_url(); ?>index.php/circulation/add_tolistpinjaman",
					data: $("#peminjaman").serialize(),
					dataType: "json",
					success: function(data){
						if (data.empty == true)
						{
							$("#warning-message").dialog("open");
						}
						else
						{
							$("table tr[class='empty-table']").remove();
							$("table[id='tabel_pinjaman']").append(
								"<tr><td>"+ data.Kode + "</td><td>"+ data.Title +"</td><td align=center><a href=\"#\"><img src=\"<?php echo base_url(); ?>asset/images/delete_2.png\" width=16></a></td></tr>"
							);
						}
						$("input[name='kode_buku']").attr('value', '');
					},
					error: function(){
						alert("Ada kesalahan dalam sistem, maaf transaksi tidak dapat dilangsungkan");
					}
				});
			}

			return false;
		});
	});
</script>
<div id="warning-message" title="Peringatan">
	<p>
		<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
		Buku yang Anda cari tidak terdaftar dalam database
	</p>
</div>

<p style="background-color: #009ACD; padding:11px; margin-bottom: 0;">
	<!--<input type="button" value="Selesai Transaksi" name="button" class="button">-->
	<a href="<?php echo base_url(); ?>index.php/circulation/end_transaction" class="anchor_btn">Selesai Transaksi</a>
</p>
<!-- profile anggota/member  -->
<table cellpadding="2" cellspacing="0" width="100%" style="margin-top:0; margin-bottom: 10px;">
	<tr>
		<td style="background-color: #DBDBDB;"><b>Nama Lengkap</b></td>
		<td>: <?php echo $member->NAMA_ANGGOTA; ?></td>
		<td style="background-color: #DBDBDB;"><b>No Anggota</b></td>
		<td>: <?php echo $member->NO_ANGGOTA; ?></td>
		<td rowspan="3" align="center">
			<img src="<?php echo base_url(); ?>asset/images/<?php echo !empty($member->image_url) ? $member->image_url : "default-user.jpeg" ?>" width="120px;">
		</td>
	</tr>
	<tr>
		<td style="background-color: #DBDBDB;"><b>No Telp</b></td>
		<td>: <?php echo $member->NO_TLP; ?></td>
		<td style="background-color: #DBDBDB;"><b>Type Keanggotaan</b></td>
		<td>: <?php echo $member->NAMA_TYPE_KEANGGOTAAN; ?></td>
	</tr>
	<tr>
		<td style="background-color: #DBDBDB;"><b>Tanggal Registrasi</b></td>
		<td>: <?php echo $member->TANGGAL_REGISTRASI; ?></td>
		<td style="background-color: #DBDBDB;"><b>Berlaku Hingga</b></td>
		<td>: <?php echo $member->BERLAKU_HINGGA; ?></td>
	</tr>
</table>
<!-- end profile member -->
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Peminjaman</a></li>
		<li><a href="#tabs-2">Sedang dipinjam</a></li>
		<li><a href="#tabs-3">Denda</a></li>
		<li><a href="#tabs-4">Sejarah Pinjaman</a></li>
	</ul>
	<div id="tabs-1">
		<div>
			<form id="peminjaman">
				Masukan Kode Buku : 
				<input type="hidden" id="pinjaman" name="pinjaman" value="<?php echo isset($pinjaman) ? true : false?>">
				<input type="text" name="kode_buku" size="35">
				<input type="submit" value="Tambahkan">
			</form>
		</div>
		<table cellpadding="5" cellspacing="0" width="100%" id="tabel_pinjaman">
			<tr>
				<th>Kode</th>
				<th>Judul Pustaka</th>
				<th>Batal</th>
			</tr>
			<?php if (isset($tmp_pinjaman)) : ?>
				<?php foreach ($tmp_pinjaman as $book) : ?>
				<tr>
					<td><?php echo $book->KODE; ?></td>
					<td><?php echo $book->JUDUL_PUSTAKA; ?></td>
					<td align="center">
						<a href="#">
							<img src="<?php echo base_url(); ?>asset/images/delete_2.png" width="16">
						</a>
					</td>
				</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			<?php if (! isset($tmp_pinjaman) or empty($tmp_pinjaman)) : ?>
			<tr class="empty-table">	
				<td colspan="3">Saat ini belum ada transaksi pinjaman</td>
			</tr>
			<?php endif; ?>
		</table>
	</div>
	<div id="tabs-2">
		<!-- data buku yang dipinjam -->
		<table cellpadding="5" cellspacing="0" width="100%">
			<tr>
				<th>Kembali</th>
				<th>Perpanjang</th>
				<th>Kode</th>
				<th>Judul Pustaka</th>
				<th>Tgl Pinjam</th>
				<th>Tgl Harus Kembali</th>
			</tr>
			<?php foreach ($sedang_pinjam as $pinjaman) : ?>
			<tr>
				<td align="center">
					<a href="<?php echo base_url(); ?>index.php/circulation/loan/<?php echo $pinjaman->PINJAMAN_ID; ?>/<?php echo $pinjaman->KODE; ?>">
						<img src="<?php echo base_url(); ?>asset/images/arrow_down.png">
					</a>
				</td>
				<td align="center">
					<a href="<?php echo base_url(); ?>">
					<img src="<?php echo base_url(); ?>asset/images/check.png">
					</a>
				</td>
				<td><?php echo $pinjaman->KODE; ?></td>
				<td><?php echo $pinjaman->JUDUL_PUSTAKA; ?></td>
				<td align="center"><?php echo date("d M Y", strtotime($pinjaman->TGL_PINJAMAN)); ?></td>
				<td align="center"><?php echo date("d M Y", strtotime($pinjaman->TGL_HARUS_KEMBALI)); ?></td>
			</tr>
			<?php endforeach ; ?>
		</table>
		<!-- end data buku yang dipinjam -->
	</div>
	<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>
	<div id="tabs-4">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>
</div>
