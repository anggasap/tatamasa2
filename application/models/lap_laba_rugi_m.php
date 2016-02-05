<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Lap_laba_rugi_m extends CI_Model {
	/*function get_data_laba_rugi_pendapatan($tgl_trans,$user_id){
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
	}*/
	function get_data_labarugi_tanpa_0(){
		$sql = "SELECT * FROM web_temp_perkiraan WHERE (LEFT(web_temp_perkiraan.kode_perk,1)=4 OR LEFT(web_temp_perkiraan.kode_perk,1)=5
		OR LEFT(web_temp_perkiraan.kode_perk,1)=6 OR LEFT(web_temp_perkiraan.kode_perk,1)=7 OR LEFT(web_temp_perkiraan.kode_perk,1)=8
		OR LEFT(web_temp_perkiraan.kode_perk,1)=9)
		and level <= 3 and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_data_labarugi(){
		$sql = "SELECT * FROM web_temp_perkiraan WHERE (LEFT(web_temp_perkiraan.kode_perk,1)=4 OR LEFT(web_temp_perkiraan.kode_perk,5)=2
		OR LEFT(web_temp_perkiraan.kode_perk,1)=6 OR LEFT(web_temp_perkiraan.kode_perk,1)=7 OR LEFT(web_temp_perkiraan.kode_perk,1)=8
		OR LEFT(web_temp_perkiraan.kode_perk,1)=9)
		and level <= 3 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_labarugi_bersih(){
		$sql = "SELECT((select realisasi_a as total_pendapatan from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 4 ) - 
				(select realisasi_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 5) -
				(select realisasi_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 6) -
				(select realisasi_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 7) +
				((select realisasi_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 8) -
				(select realisasi_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 9))
				) as lbrg_berjalan";
		$query = $this->db->query($sql)->row()->lbrg_berjalan;
		return $query;
	}
}

/* End of file kasmodel.php */
/* Location: ./application/models/kasmodel.php */