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
	
	/**
	function show_koleksi_ajax()
	{
		$this->load->model('koleksi_model');
		$this->data['results'] = $this->koleksi_model->get_records();
		$this->load->view('buku/list-koleksi-ajax', $this->data);
	}
	
	function show_koleksi_keluar()
	{
		$this->load->view('buku/list-koleksi-keluar');
	}
	
	function edit($id)
	{
		$this->load->model('klasifikasi_model');
		$klasifikasi = $this->klasifikasi_model->get_records();
		$this->data['clasifications'][''] = '--- Pilih Klasifikasi ---';
		foreach ($klasifikasi as $row)
		{
			$this->data['clasifications'][$row->ID] = $row->NAMA_KLASIFIKASI;
		}
		parent::edit($id);
	} **/
	
	function save_book()
	{
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
		$this->add_tocollection($book_id);
	}
	
	function add_tocollection($book_id)
	{
		$this->data['book'] = $this->buku_model->get_record($book_id);
		$this->load->view('buku/form-koleksi', $this->data);
	}
	
	function save_tocollection()
	{
		$this->load->model('koleksi_model');
		$data = array(
			'BUKU_ID' => $this->input->post('buku_id'),
			'KODE' => $this->input->post('kode'),
			'PENEMPATAN' => $this->input->post('penempatan'),
			'TYPE_KOLEKSI' => $this->input->post('type_koleksi'),
			'NO_PESANAN' => $this->input->post('no_pesanan'),
			'TGL_PESANAN' => $this->input->post('tgl_pesanan'),
			'TGL_PENERIMAAN' => $this->input->post('tgl_penerimaan'),
			'PENYEDIA' => $this->input->post('penyedia'),
			'FAKTUR' => $this->input->post('faktur'),
			'TGL_FAKTUR' => $this->input->post('tgl_faktur'),
			'HARGA' => $this->input->post('harga'),
			'STATUS'=> true,
		);
		if ($this->koleksi_model->save($data))
		{
			$this->session->set_flashdata('notice', 'Data has been saved');
		}
		else
		{
			$this->session->set_flashdata('error', 'Sory, There are error occur');
		}
		
		echo notice();
	}
	
	function _get_klasifikasi_slug($klasifikasi_id)
	{
		$klasifikasi = $this->klasifikasi_model->get_record($klasifikasi_id);
		return $klasifikasi->SLUG;
	}
	
	function _get_tempat_penyimpanan($klasifikasi_id)
	{
		$klasifikasi = $this->klasifikasi_model->get_record($klasifikasi_id);
		return $klasifikasi->KLASIFIKASI_ID;
	}
	function find()
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