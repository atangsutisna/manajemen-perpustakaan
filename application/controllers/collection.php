<?php

/**
 * 
 * #url php myadmin
https://manajemen-perpustakaan-atangsutisna.c9.io/phpmyadmin/
username: atangsutisna
 * */
class Collection extends MY_Controller {

	function __construct()
	{
		parent::__construct('buku');
		$this->load->library('session');
		$this->load->model(array('klasifikasi_model', 'collection_model'));
		$this->data['clasifications'][''] = '--- Pilih Klasifikasi ---';
		$classifications = $this->klasifikasi_model->get_records();
		foreach ($classifications as $row) {
			$this->data['clasifications'][$row->KLASIFIKASI_ID] = $row->NAMA_KLASIFIKASI;
		}
	}
	
	function index()
	{
		//TODO: ini harus di batasi, misalnya 10;
		$this->data['list_collection'] = $this->collection_model->get_records();
		//$this->data['collection_amount'] = $this->collection_model->count_collections();
		$this->data['main'] = 'buku/index';
		$this->load->view($this->template, $this->data);
	}
	
	function new_form() 
	{
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	function form_edit($collection_id) 
	{
		$this->data['book'] = $this->collection_model->get_record($collection_id);
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	function form_view()
	{
		$collection_id = $this->input->get('collection_id');
		$this->data['feedback_msg'] = $this->session->flashdata('feedback_msg');
		$this->data['book'] = $this->collection_model->get_record($collection_id);
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	
	function save()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters("<span class='label label-danger'>","</span>");
		$this->form_validation->set_rules('judul_pustaka', 'Judul Pustaka', 'required');
		$this->form_validation->set_rules('isbn_issn', 'ISBN_ISSN', 'required');
		$this->form_validation->set_rules('pengarang', 'Pengarang', 'required');
		$this->form_validation->set_rules('penerbit', 'Penerbit', 'required');
		$this->form_validation->set_rules('tahun_terbit', 'Tahun Terbit', 'required');
		$this->form_validation->set_rules('qty', 'Qty', 'required|number');
		
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'KLASIFIKASI_ID' => $this->input->post('klasifikasi_id'),
				'JUDUL_PUSTAKA' => $this->input->post('judul_pustaka'),
				'ISBN_ISSN' => $this->input->post('isbn_issn'),
				'PENGARANG' => $this->input->post('pengarang'),
				'PENERBIT' => $this->input->post('penerbit'),
				'TAHUN_TERBIT' => $this->input->post('tahun_terbit'),
				'STATUS' => $this->input->post('status'),
				'QTY' => $this->input->post('qty')
			);
			
			$act = $this->input->get('act');
			if ($act === 'insert') {
				$data['TANGGAL_PEMBUATAN'] = date('Y-m-d');
				$this->collection_model->insert("mst_buku", $data);
				$this->session->set_flashdata('feedback_msg', '1 data has been saved');
				//$collection_id = $this->db->insert_id();
				//$this->data['book'] = $this->collection_model->get_record($collection_id);
			} elseif ($act === 'update') {
				$data['TANGGAL_PERUBAHAN'] = date('Y-m-d');
				$collection_id = $this->input->post('id');
				$this->collection_model->update(array(
					'ID' => $collection_id
				), 
				$data);
				//$this->data['book'] = $this->collection_model->get_record($collection_id);
				$this->session->set_flashdata('feedback_msg', '1 data has been updated');
			}
			
			$collection_id = $this->input->post('id');
			redirect('collection/form_view?collection_id='. $collection_id);
		}
		$this->data['main'] = 'buku/form';
		$this->load->view($this->template, $this->data);
	}
	
	function coll_receipt() 
	{
		$this->load->view($this->template, array('main' => 'buku/form_receipt_collection'));
	}
	
	function find_collection_by_term()
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