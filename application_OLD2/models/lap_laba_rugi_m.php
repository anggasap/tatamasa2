<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Lap_laba_rugi_m extends CI_Model {
	function get_data_laba_rugi_pendapatan($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where 
		LEFT(web_temp_perkiraan.kode_perk,1)=4 and
		user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_laba_rugi_pendapatan_bukan_nol($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where 
		LEFT(web_temp_perkiraan.kode_perk,1)=4 and
		user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_laba_rugi_biaya($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where 
		LEFT(web_temp_perkiraan.kode_perk,1)=5 and
		user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_laba_rugi_biaya_bukan_nol($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where 
		LEFT(web_temp_perkiraan.kode_perk,1)=5 and
		user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	
	function get_total_pendapatan($tgl_trans,$user_id){
		$sql = "select sum(saldo_akhir) as total_pendapatan from web_temp_perkiraan where LEFT(web_temp_perkiraan.kode_perk,1)=4 AND type = 'D' AND user_id = '".$user_id."' 
		AND tanggal <= '".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_pendapatan;
		return $query;
	}
	function get_total_biaya($tgl_trans,$user_id){
		$sql = "select sum(saldo_akhir) as total_biaya from web_temp_perkiraan where LEFT(web_temp_perkiraan.kode_perk,1)=5 AND type = 'D' AND user_id = '".$user_id."' 
		AND tanggal <= '".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_biaya;
		return $query;
	}
}

/* End of file kasmodel.php */
/* Location: ./application/models/kasmodel.php */