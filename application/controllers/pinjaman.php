<?php


class Pinjaman extends MY_Controller{
	
	var $is_member;
	var $is_available;
	var $no_anggota;
	
	
	//* status buku */
	private $_kembali = 0;
	private $_hilang = 0;
	private $_rusak = 0;
	
	function __construct()
	{
		parent::__construct('pinjaman');
		$this->load->model("anggota_model");
		$this->load->model("pengembalian_model");
	}
	
	function create_pinjaman()
	{
		if ($this->input->post("no_anggota"))
		{
			$no_anggota = $this->input->post("no_anggota");
			$this->session->set_userdata("no_anggota", $no_anggota);
			$this->data["tmp_pinjaman"] = $this->pinjaman_model->get_tmp_pinjaman();
		}
		else
		{
			$this->data["tmp_pinjaman"] = $this->pinjaman_model->get_tmp_pinjaman();
		}
		$this->data["main"] = "pinjaman/form_pinjaman";
		$this->load->view($this->template, $this->data);
	}
	
	function akhiri_pinjaman()
	{
		$no_anggota = $this->session->userdata("no_anggota");
		$data_pinjaman = array(
			"NO_ANGGOTA" => $no_anggota,
			"TGL_PINJAM" => date("Y-m-d"),
			"USER_ID" => 1,
			"JUMLAH_PINJAMAN" => $this->pinjaman_model->count_tmp_pinjaman($no_anggota)
		);
		$this->pinjaman_model->insert($data_pinjaman);
		$pinjaman_id = $this->pinjaman_model->get_current_id();
		$tmp_pinjaman = $this->pinjaman_model->get_tmp_pinjaman();
		
		foreach ($tmp_pinjaman as $row)
		{
			$detail_pinjaman = array(
				"PINJAMAN_ID" => $pinjaman_id,
				"NO_INDUK" => $row->NO_INDUK
			);
			
			$this->db->insert("detail_trans_pinjaman", $detail_pinjaman);
		}
		
		$this->db->empty_table("tmp_trans_pinjaman");
		$this->session->unset_userdata("no_induk");
		$this->session->set_flashdata('notice', 'Data pinjaman telah di simpan');
		redirect("pinjaman");
	}
	function save()
	{
		//$this->form_validation->set_rules("no_induk");
		$no_anggota = $this->session->userdata("no_anggota");
		
		if ($this->input->post("no_induk"))
		{
			$no_induk = $this->input->post("no_induk");
			$data = array(	
				"NO_INDUK" => $no_induk,
				"NO_ANGGOTA" => $no_anggota
			);
			if ($this->db->insert("tmp_trans_pinjaman", $data))
			{
				$this->session->set_userdata("notice", "Data berhasil disimpan..");
			}
		}
		$this->data["tmp_pinjaman"] = $this->pinjaman_model->get_tmp_pinjaman();
		$this->data["main"] = "pinjaman/form_pinjaman";
		$this->load->view($this->template, $this->data);
	}
	
	function _check_member($no_anggota)
	{
		$member = $this->anggota_model->get_by(array('NO_ANGGOTA' => $no_anggota))->row();
		
		if (empty($member))
		{
			$this->form_validation->set_message('_check_member','Anggota tidak terdaftar atau sudah tidak aktif');
			$this->is_member = FALSE;
			return FALSE;
		}
		else
		{
			$this->is_member = TRUE;
			return TRUE;
		}
	}
	
	function _check_status_pinjaman($no_anggota)
	{
		$this->db->where("NO_ANGGOTA", $no_anggota);
		$this->db->where("TGL_PINJAM", date("Y-m-d"));
		$query = $this->db->get("trans_pinjaman");
		
		if ($query->num_rows() >= 3)
		{
			$this->form_validation->set_message('_check_status_pinjaman','Pinjaman tidak boleh dari 3');
			return FALSE;
		}
		else
		return TRUE;
	}
	
	function _check_book($no_induk)
	{
		$this->load->model('buku_model');
		$book = $this->buku_model->get_by(array('NO_INDUK' => $no_induk));
		
		if (empty($book))
		{
			$this->form_validation->set_message('_check_book','Buku tidak terdaftar');
			$this->is_available = FALSE;
			return FALSE;
		}
		else
		{
			$this->is_available = TRUE;
			return TRUE;
		}
	}
	
	function _have_completed()
	{
		if ($this->is_member && $this->is_available)
		{
			$this->anggota_model->update(array('NO_ANGGOTA' => $this->_no_anggota), array('STATUS_PINJAMAN' => 1));
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('_have_completed','ting tong');
			return FALSE;
		}
	}
	
	function find()
	{
		$this->form_validation->set_rules("no_anggota","No Anggota","required");
		
		if ($this->form_validation->run())
		{
			$no_anggota = $this->input->post("no_anggota");
			$user = $this->anggota_model->get_byid($no_anggota);
			
			if ($user->num_rows() > 0)
			{
				$this->data['anggota'] = $user->row();
				$pinjaman = $this->pinjaman_model->get_pinjaman($no_anggota);
				
				if (! empty($pinjaman))
				{
					$this->data["pinjaman"] = $pinjaman;
					$this->data["data_pinjaman"] = $this->pinjaman_model->get_detail_pinjaman($pinjaman->ID);
				}
			}
			
			$this->data['main'] = "pinjaman/index";
			$this->load->view($this->template, $this->data);
		}
		else
			parent::index();
	}
	
	function create_pengembalian()
	{
		$pinjaman_id = $this->input->post("pinjaman_id");
		$status_buku = $this->input->post("status_buku");
		
		$data_pengembalian = array(
			"PINJAMAN_ID" => $pinjaman_id,
			"TGL_KEMBALI" => date("Y-m-d"),
			"DENDA" => 0,
			"KEMBALI" => 0,
			"HILANG" => 0,
			"RUSAK" => 0,
		);
		
		//* masukan data pengembalian ke tabel trans_pengembalian */
		$insert = $this->pengembalian_model->insert($data_pengembalian);
		$pengembalian_id = $this->pengembalian_model->get_current_id();
		
		//* catat data-data buku yang dikembalikan ke table detail_trans_pengembalian */
		//* catatan ini berguna untuk mencatat status buku yang dikembalkan, apakah kembali, rusak atau hilang */
		foreach ($status_buku as $key => $val)
		{
			$data_buku = array(
				"PENGEMBALIAN_ID" => $pengembalian_id,
				"NO_INDUK" => $key,
				"STATUS_BUKU" => $val
			);
			
			$this->pengembalian_model->insert_detail_pengembalian($data_buku);
		}
		
		//* update tabel pengembalian */
		$this->get_status_pengembalian($pengembalian_id);
		$data_pengembalian = array(
			"KEMBALI" => $this->_kembali,
			"HILANG" => $this->_hilang,
			"RUSAK" => $this->_rusak,
		);
		$this->pengembalian_model->update($pengembalian_id, $data_pengembalian);
		
		//* update status pinjaman menjadi true */
		$update_pinjaman = array(
			"STATUS" => 1
		);
		$this->pinjaman_model->update($pinjaman_id, $update_pinjaman);
		$this->session->set_flashdata('notice','Data pengembalian telah disimpan..!');
		redirect("pinjaman");
	}
	
	function hitung_denda()
	{
	}
	
	function get_status_pengembalian($pengembalian_id)
	{
		$detail_pengembalian = $this->pengembalian_model->get_detail_pengembalian($pengembalian_id);
		
		foreach ($detail_pengembalian as $row)
		{
			if ($row->STATUS_BUKU == "kembali")
			{
				$this->_kembali += 1;
			}
			elseif ($row->STATUS_BUKU == "rusak")
			{
				$this->_rusak += 1;
			}elseif ($row->STATUS_BUKU == "hilang")
			{
				$this->_hilang += 1;
			}
		}
	}
	
	function get_member($no_anggota)
	{
		$query = $this->anggota_model->get_record();
	}
}