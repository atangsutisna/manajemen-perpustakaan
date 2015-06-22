<?php


class Laporan_pinjaman extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct("lpinjaman");
		$this->limit = 10;
		//$this->load->model("lpinjaman_model");
	}
	
	function index($page = 0)
	{
		//$model_name = $this->model_name;
		//$this->data['current_url'] = $this->current_url;
		$config['base_url'] = base_url()."index.php/laporan_pinjaman/page/";
		$config['total_rows'] = $this->lpinjaman_model->count_records();
		$config['per_page'] = $this->limit;

		$this->pagination->initialize($config); 
		$this->data['results'] = $this->lpinjaman_model->get_records($this->limit, $page);
		$this->data['pages'] = $this->pagination->create_links();
		$this->data['main'] = 'laporan/laporan_pinjaman';
		$this->load->view($this->template, $this->data);
	}
}