<?php


class Laporan_pengembalian extends MY_Controller
{
	function __construct()
	{
		parent::__construct('laporan_pengembalian');
	}
	
	function detail($id)
	{
		$this->data['result'] = $this->laporan_pengembalian_model->detail_pengembalian($id);
		$this->data['books'] = $this->laporan_pengembalian_model->get_detail_buku($id);
		$this->data['jml_kembali'] = $this->laporan_pengembalian_model->count_detail_buku($id);
		$this->data['jml_rusak'] = $this->laporan_pengembalian_model->count_detail_buku($id, 'rusak');
		$this->data['jml_hilang'] = $this->laporan_pengembalian_model->count_detail_buku($id, 'hilang');
		$this->data['main'] = 'laporan_pengembalian/detail';
		$this->load->view($this->template, $this->data);
	}

}