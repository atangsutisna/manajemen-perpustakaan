<?php


class Application_setting extends MY_Controller{

	function __construct()
	{
		parent::__construct('setting');
	}
	
	function save()
	{
		$this->form_validation->set_rules('nama_app','Nama Aplikasi','required');
		$this->form_validation->set_rules('denda','Denda','required');
		$id = $this->input->post('id');
		
		if ($this->form_validation->run())
		{
			$data = array(
							'NAMA_APP' => $this->input->post('nama_app'),
							'DENDA' => $this->input->post('denda'),
							'TERAKHIR_DIUBAH' => date('Y-m-d H:i:s')
						);
			if ($this->setting_model->save($id, $data))
			{
				$this->session->set_flashdata('notice', 'Data sudah disimpan');
			}
			else
			{
				$this->session->set_flashdata('notice', 'Data gagal disimpan');
			}
			redirect('setting');
		}
		else
			$this->index();
	}
}
