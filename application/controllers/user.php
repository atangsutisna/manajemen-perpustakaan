<?php


class User extends MY_Controller {
	
	
	function __construct()
	{
		parent::__construct('user');
		$this->load->library('form_validation');
	}
	
	function index()
	{
		$this->data['main'] = "user/index";
		$this->data['user'] = $this->user_model->get_profile($this->get_current_user());
		$this->load->view($this->template, $this->data);
	}
	
	function update()
	{
		$user_id = $this->input->post('user_id');
		$nama_lengkap = $this->input->post('nama_lengkap');
		$email = $this->input->post('email');
		$no_telp = $this->input->post('no_telp');
		$password = $this->input->post('password');
		$retype_password = $this->input->post('retype_password');
		
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'xss_clean|required|max_length[40]|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'xss_clean|required|valid_email');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'xss_clean|required|numeric');
		
		if (!empty($password))
		{
			$this->form_validation->set_rules('password', 'Password', 'xss_clean|required|min_length[6]|max_length[25]');
			$this->form_validation->set_rules('retype_password', 'Re Password', 'xss_clean|mathes[password]');
		}
		
		if ($this->form_validation->run())
		{
			$data = array(
				'NAMA_LENGKAP' => $nama_lengkap,
				'EMAIL' => $email,
				'NO_TELP' => $no_telp
			);
			
			if (! empty($password))
			{
				$data['PASSWORD'] = $password;
			}
			
			$update = $this->user_model->update(array('ID' => $user_id), $data);
			if ($update)
			{
				$this->session->set_flashdata('notice', 'Data has been saved');
			}
			else
			{	
				$this->session->set_flashdata('error', 'Error have occur when update process');
			}
			
			redirect('user');
		}
		
		$this->index();
	}
}