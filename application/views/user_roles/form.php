<h2>Pengaturan Hak Akses</h2>
<?php
	$success = $this->session->flashdata('success');
	echo !empty($success) ? $success : '';
?>
<?php
	echo form_open('user_roles/save');
	echo table_open_tag('cellpadding="5" cellspacing="0" width="100%"');
		$title = array('#', 'Modules', 'Roles');
		echo table_title($title);
		
		foreach ($user_permissions as $user_permission)
		{
			$data = array(
				form_checkbox("modules[".$user_permission['module_id']."]", $user_permission['module_id'], $user_permission['module_permission']),
				$user_permission['module_name'],
				form_checkbox("modules[".$user_permission['module_id']."][create]", $user_permission['create'], $user_permission['create']). "CREATE".
				form_checkbox("modules[".$user_permission['module_id']."][update]", $user_permission['update'], $user_permission['update']). "EDIT".
				form_checkbox("modules[".$user_permission['module_id']."][delete]", $user_permission['delete'], $user_permission['delete']). "DELETE",
			);
			echo table_contents($data);
		}
	echo table_close_tag();
	echo "<br>";
	echo form_submit('submit','Simpan');
	echo form_close();
?>