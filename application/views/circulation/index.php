<script>
	$(function(){
		$("#circulation-content").addClass("height_fixed");
		$("#warning").dialog({
			autoOpen: false,
			modal: true,
			buttons: {
				"Ok": function(){
					$(this).dialog('close');
				}
			}
		});
	});
	
	function get_user()
	{
		var user_id = $("#user_id").val();
		
		if (user_id == "")
		{
			$("#warning").dialog('open');
			return false;
		}
		
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/circulation/get_user",
			data: {user_id: user_id},
			cache: false,
			success: function(data){
				$("#circulation-content").removeClass("height_fixed");
				$("#profile").html(data);
			},
			error: function(){
				$("#profile").html("Error Ocur");
			}
		});
		return false;
	}
	
	function check_user(user_id)
	{
		var is_user;
		$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/circulation/check_userid",
				data: {user_id: user_id},
				dataType: "json",
				cache: false,
				success: function(data){
					if (data.user == false)
					{
						alert("Maneh tamliho..!")
					}
					else
					{
						get_user();
					}
				},
				error: function(){
					$("#profile").html("Error Ocur");
				}
		});
		
		return false;
	}
</script>
<div id="circulation-content">	
	<img src="<?php echo base_url(); ?>asset/images/sirkulasi.png"  align="left" hspace="10">
	<p style="border-bottom: 1px solid #757575; margin-left: 83px;"><b>SIRKULASI</b>- Masukan nomor anggota untuk mulai transaksi</p>

	<?php echo form_open('#'); ?>
	<input type="text" name="user_id" size="35" id="user_id">
	<input type="submit" name="submit" value="Mulai Transaksi" onclick="return get_user(); " class="button">
	<?php echo form_close(); ?>
	
	<div id="warning" title="Peringatan">
		<p>
			<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 50px 0;"></span>
			Silahkan masukan No Anggota
		</p>
	</div>
	<div style="clearer: both; "></div>
	<div id="profile">
		<?php
			$transaction = $this->session->userdata('transaction');
			if ($transaction == true)
			{
				$this->load->view('circulation/profile');
				echo "
					<script>
						$(function(){
							$('#circulation-content').removeClass('height_fixed');
						});
					</script>
				";
			}
		?>
	</div>
</div>