<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_spk_m extends CI_Model {
	
	function getAllSpk($tanggal){
		$sql=" select * from master_kontrak m where m.tgl_kontrak <= '".$tanggal."' ";
		$query=$this->db->query($sql);
		return $query->result();
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */