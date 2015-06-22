<?php


class Circulation extends MY_Controller 
{
	function __construct()
	{
		parent::__construct('circulation');
		$this->load->model("anggota_model");
		$this->load->model("koleksi_model");
		$this->load->model("pinjaman_model");
		
		$user_id = $this->session->userdata('user_id');
		$this->data['sedang_pinjam'] = $this->pinjaman_model->get_pinjaman($user_id);
	}
	
	function index()
	{
		$user_id = $this->session->userdata('user_id');
		if (! empty($user_id))
		{
			$this->data['member'] = $this->anggota_model->get_user("NO_ANGGOTA", $user_id);
			$this->data['tmp_pinjaman'] = $this->pinjaman_model->get_tmp_pinjaman();
			$this->data['pinjaman'] = true;
		}
		$this->data['main'] = 'circulation/index';
		$this->load->view($this->template, $this->data);
	}
	
	function get_user()
	{
		$user_id = $this->input->post('user_id');
		$this->data['member'] = $this->anggota_model->get_user("NO_ANGGOTA", $user_id);
		$this->data['sedang_pinjam'] = $this->pinjaman_model->get_pinjaman($user_id);
		$sess_data = array(
			'user_id' => $user_id,
			'transaction' => true,
			'pinjaman' => false,
		);
		$this->session->set_userdata($sess_data);
		$this->load->view('circulation/profile', $this->data);
	}
	
	function check_userid()
	{
		$user_id = $this->input->post('user_id');
		$user = $this->anggota_model->get_user("NO_ANGGOTA", $user_id);
		
		if ( ! empty($user) )
		{
			$data['user'] = true;
		}
		else
		{
			$data['user'] = false;
		}
		
		echo json_encode($data);
	}
	
	function add_tolistpinjaman()
	{
		$book_id = $this->input->post("kode_buku");
		$this->session->set_userdata('pinjaman', true);
		$book = $this->koleksi_model->get_collection($book_id);
		if (! empty($book))
		{
			$data['Kode'] = $book->KODE;
			$data['Title'] = $book->JUDUL_PUSTAKA;
			$data['empty'] = false;
			$user_id = $this->session->userdata('user_id');
			$tmp_pinjaman = array(
				'KODE' => $book_id,
				'NO_ANGGOTA' => $user_id
			);
			$this->db->insert("tmp_trans_pinjaman", $tmp_pinjaman);
		}
		else
		{
			$data['empty'] = true;
		}
		
		echo json_encode($data);
	}
	
	function end_transaction()
	{
		$user_id = $this->session->userdata('user_id');
		$pinjaman = $this->session->userdata('pinjaman');
		if ($pinjaman === true)
		{
			//* menentukan batas pengembalian  */
			$batas_pengembalian  = mktime(0, 0, 0, date("m")  , date("d")+3, date("Y"));
			//* simpan ke dalam tabel pinjaman */
			$data_pinjaman = array(
				'NO_ANGGOTA' => $user_id,
				'TGL_PINJAMAN' => date('Y-m-d'),
				'TGL_HARUS_KEMBALI' => date("Y-m-d",$batas_pengembalian),
				'USER_ID' => 1,
				'STATUS' => 0,
				'JUMLAH_PINJAMAN' => $this->pinjaman_model->count_tmp_pinjaman()
			);
			$this->pinjaman_model->insert($data_pinjaman);
			
			//* dapatkan id pinjaman terbaru */
			$pinjaman_id = $this->db->insert_id();
			//* tampilkan semua data pinjaman dari tabel tmp_trans_pinjaman */
			$tmp_pinjaman = $this->pinjaman_model->get_tmp_pinjaman();
			foreach ($tmp_pinjaman as $pinjaman)
			{
				$detail_pinjaman = array(
					'PINJAMAN_ID' => $pinjaman_id,
					'KODE' => $pinjaman->KODE
				);
				$this->db->insert("detail_trans_pinjaman", $detail_pinjaman);
			}
			$this->db->empty_table("tmp_trans_pinjaman");
			$sess_data = array(
				'user_id' => $user_id,
				'transaction' => true
			);
		}
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('transaction');
		$this->session->unset_userdata('pinjaman');
		redirect("circulation");
	}
	
	function due($pinjaman_id =0, $kode_buku =0)
	{
		//$this->session->set_userdata('pengembalian', $pinjaman_id);
		$pinjaman = $this->pinjaman_model->get_record($pinjaman_id = 17);
		$user = $this->session->userdata('user_id');
		$tgl_kembali = "2012-03-29";
		$data_pengembalian = array(
			'NO_ANGGOTA' => $user,
			'TGL_PINJAMAN' => $pinjaman->TGL_PINJAMAN,
			'TGL_HARUS_KEMBALI' => $pinjaman->TGL_HARUS_KEMBALI,
			'TGL_KEMBALI' => $tgl_kembali,
			'TERLAMBAT' => keterlambatan($tgl_kembali, $pinjaman->TGL_HARUS_KEMBALI),
			'DENDA' => 0
		);
		$detail_pengembalian = array(
			'PENGEMBALIAN_ID' => 0,
			'KODE' => $kode_buku,
			'STATUS' => "kembali"
		);
		print_r($data_pengembalian);
	}
	function unset_sess()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('transaction');
		
		$batas_pengembalian  = mktime(0, 0, 0, date("m")  , date("d")+3, date("Y"));
		echo date("Y-m-d",$batas_pengembalian);
	}
}