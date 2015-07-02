<?php


class Book extends MY_Controller {

	function __construct()
	{
		parent::__construct('buku');
		$this->load->model(array('klasifikasi_model', 'book_model'));
		$this->data['clasifications'][''] = '--- Pilih Klasifikasi ---';
		$classifications = $this->klasifikasi_model->get_records();
		foreach ($classifications as $row) {
			$this->data['clasifications'][$row->KLASIFIKASI_ID] = $row->NAMA_KLASIFIKASI;
		}
	}
	
	function index()
	{
		$this->data['list_book'] = $this->book_model->get_records();
		$this->data['book_amount'] = $this->book_model->count_books();
		$this->data['main'] = 'buku/index';
		$this->load->view($this->template, $this->data);
	}
	
	function newForm() 
	{
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	function editForm($book_id) 
	{
		$this->data['book'] = $this->book_model->get_record($book_id);
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	
	function save_book()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('judul_pustaka', 'Judul Pustaka', 'required');
		$this->form_validation->set_rules('isbn_issn', 'ISBN_ISSN', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
		
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'KLASIFIKASI_ID' => $this->input->post('klasifikasi_id'),
				'JUDUL_PUSTAKA' => $this->input->post('judul_pustaka'),
				'ISBN_ISSN' => $this->input->post('isbn_issn'),
				'PENGARANG' => $this->input->post('pengarang'),
				'PENERBIT' => $this->input->post('penerbit'),
				'TEMPAT_TERBIT' => $this->input->post('tempat_terbit'),
				'TAHUN_TERBIT' => $this->input->post('tahun_terbit'),
				'EDISI' => $this->input->post('edisi'),
				'TANGGAL_INPUT'	=> date('Y-m-d')
			);
			$this->db->insert("mst_buku", $data);
			$book_id = $this->db->insert_id();
			$this->data['book'] = $this->book_model->get_record($book_id);
		}
		$this->load->view($this->template, $this->data);
	}
	
	function find_book_by_term()
	{
		$this->form_validation->set_rules('keyword','Kata Pencarian','required');
		
		if ($this->form_validation->run())
		{
			$keyword = $this->input->post('keyword');
			$criteria = "JUDUL_PUSTAKA LIKE'%{$keyword}%' ";
			parent::find($criteria);
		}
		else
			parent::index();
	}
}