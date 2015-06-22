<?php


class Pengembalian extends MY_Controller{
	
	function __construct()
	{
		parent::__construct('trans_pengembalian');
	}
	
	function index()
	{
		if ($this->input->post('submit'))
		{
			$this->form_validation->set_rules("no_induk", "No Induk", "required|callback_check_anggota");
			$this->form_validation->set_rules("no_anggota", "No Anggota", "required|callback_check_no_induk");
			
			if ($this->form_validation->run())
			{
				$data = array(
					'NO_INDUK' => $this->input->post('no_induk'),
					'NO_ANGGOTA' => $this->input->post('no_anggota'),
					'CREATED_AT' => date("Y-m-d"),
					'USER' => $this->session->userdata('user_login')
				);
				$this->trans_pengembalian_model->insert($data);
			}
		}
		$this->data['data_pengembalian'] = $this->trans_pengembalian_model->get_records();
		$this->data['main'] = "pengembalian/index";
		$this->load->view($this->template, $this->data);
	}
	
	function check_anggota($no_anggota)
	{
		$this->db->where("NO_ANGGOTA", $no_anggota);
		$query = $this->db->get("mst_anggota");
		
		if ($query->num_rows() > 0)
		return TRUE;
		else
		{
			$this->form_validation->set_message("check_anggota", "No Anggota tidak diketahui");
			return FALSE;
		}
	}
	
	function check_no_induk($no_induk)
	{
		$this->db->where("NO_INDUK", $no_induk);
		$query = $this->db->get("mst_buku");
		
		if ($query->num_rows() > 0)
		return TRUE;
		else
		{
			$this->form_validation->set_message("check_no_induk", "No Induk tidak diketahui");
			return FALSE;
		}
		
	}
	
	function check_pinjaman_anggota($no_anggota, $no_induk)
	{
	}
	
}