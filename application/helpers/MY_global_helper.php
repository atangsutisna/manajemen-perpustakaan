<?php
	function is_male_or_female($status)
	{
		$gender;
		if ($status != 0)
			$gender = 'Pria';
		else
			$gender = 'Wanita';
		
		return $gender;
	}
	
	function is_member_active($status)
	{
		$active;
		if ($status != 0)
			$active = 'Aktif';
		else
			$active = 'Tidak Aktif';
		
		return $active;
	}
	
	function borrow_status($status)
	{
		$borrow;
		if ($status == 0)
			$borrow = 'Bebas Pinjaman';
		else
			$borrow = 'Ada Tunggakan';
		
		return $borrow;
	}
	
	function data_is_empty($data)
	{
		return empty($data) ? "<div style=\"color: red; margin-top: 20px; \">Data tidak ditemukan</div> " : '';
	}
	
	function show_sub_menu($group_menu_id)
	{
		$CI =& get_instance();
		$menus = $CI->menu_model->get_by(array('MENU_GROUP_ID' => $group_menu_id))->result();
		$menu_list = "<ul id=\"verticalmenu\" class=\"glossymenu\">";
			foreach ($menus as $row)
			{
				$menu_list .= "<li>".anchor($row->URL, $row->NAMA_MENU)."</li>";
			}
		$menu_list .= "</ul>";
		
		return $menu_list;
	}
	
	function notice()
	{
		$CI =& get_instance();
		$notice = $CI->session->flashdata('notice');
		$error = $CI->session->flashdata('error');
		
		$html = '';
		
		if (! empty($notice))
		{
			$html = "	
				<div class\"ui-widget\">
					<div class=\"ui-state-highlight ui-corner-all\">
						{$notice}
					</div>
				</div>
			";
		}
		
		if (! empty($error))
		{
			$html = "	
				<div class\"ui-widget\">
					<div class=\"ui-state-highlight ui-corner-all\">
						{$error}
					</div>
				</div>
			";
		}
		
		return $html;
	}
	
	function login_status()
	{
		$CI =& get_instance();
		$user = $CI->session->userdata('user_login');
		$log = "Anda login sebagai : <b>{$user}</b> | ";
	    
		if (!empty($user))
		{
			$log .= anchor('logout', 'Logout');
		}
		
		return $log;
	}
	
	function count_jumlah_keluar($no_induk)
	{
		$CI =& get_instance();
		$CI->db->select('detail_trans_pinjaman.NO_INDUK');
		$CI->db->select('count(detail_trans_pinjaman.NO_INDUK) as JUMLAH');
		$CI->db->from('detail_trans_pinjaman');
		$CI->db->join('trans_pinjaman', 'detail_trans_pinjaman.PINJAMAN_ID = trans_pinjaman.ID');
		$CI->db->where('trans_pinjaman.STATUS', 0);
		$CI->db->where('detail_trans_pinjaman.NO_INDUK', $no_induk);
		$query = $CI->db->get();
		
		return $query->row()->JUMLAH;
	}
	
	function get_buku_bytitle($judul_buku)
	{
		$CI =& get_instance();
		$CI->db->select('NO_INDUK');
		$CI->db->from('mst_buku');
		$CI->db->like('JUDUL_PUSTAKA', $judul_buku);
		$query = $CI->db->get();
		
		return $query->result();
	}
	
	function count_buku_hilang($no_induk)
	{
		$CI =& get_instance();
		$CI->db->select('count(NO_INDUK) as JUMLAH');
		$CI->db->from('detail_trans_pengembalian');
		$CI->db->where('STATUS_BUKU', 'hilang');
		$CI->db->where('NO_INDUK', $no_induk);
		$query = $CI->db->get();
		
		return $query->row()->JUMLAH;
	}
	
	function count_buku_rusak($no_induk)
	{
		$CI =& get_instance();
		$CI->db->select('count(NO_INDUK) as JUMLAH');
		$CI->db->from('detail_trans_pengembalian');
		$CI->db->where('STATUS_BUKU', 'rusak');
		$CI->db->where('NO_INDUK', $no_induk);
		$query = $CI->db->get();
		
		return $query->row()->JUMLAH;
	}
	
	function count_book($title, $type = 'dipinjam')
	{
		$books = get_buku_bytitle($title);
		$total = 0;
		switch ($type)
		{
			case 'dipinjam' : 
				foreach ($books as $book)
				{
					$total += count_jumlah_keluar($book->NO_INDUK);
				}
				break;
			case 'hilang' :
				foreach ($books as $book)
				{
					$total += count_buku_hilang($book->NO_INDUK);
				}
				break;
			case 'rusak' :
				foreach ($books as $book)
				{
					$total += count_buku_rusak($book->NO_INDUK);
				}
				break;
		}
		
		return $total;
	}
	
	function keterlambatan($tgl_kembali, $tgl_harus_kembali)
	{
		$CI =& get_instance();
		$query = $CI->db->query("SELECT DATEDIFF('$tgl_kembali', '$tgl_harus_kembali') as terlambat ");
		$hari = $query->row();
		
		if ($hari->terlambat > 0)
			return $hari->terlambat;
		else
			return 0;
	}
?>