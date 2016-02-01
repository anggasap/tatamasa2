<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_budget_realisasi_m extends CI_Model {
	
	public function getProyek() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_proyek order by id_proyek asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	
	function getTahun() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select distinct(tahun) as tahun from budget_perkiraan order by tahun asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	
	/*function insert_temp_perkiraan_aktiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_laba_rugi (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'L' as sisi ";
		$sql .= "FROM perkiraan WHERE "; 			
		$sql .= "LEFT(perkiraan.kode_perk,1)=1 OR LEFT(perkiraan.kode_perk,1)=5 OR LEFT(perkiraan.kode_perk,1)=6";
		$query = $this->db->query($sql);					   
	}
	
	function insert_temp_perkiraan_pasiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_laba_rugi (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'R' as sisi ";
		$sql .= "FROM perkiraan WHERE "; 			
		$sql .= "LEFT(perkiraan.kode_perk,1)=2 OR LEFT(perkiraan.kode_perk,1)=3 OR LEFT(perkiraan.kode_perk,1)=4";
		$query = $this->db->query($sql);	
	}*/
	function insert_temp_laba_rugi($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_laba_rugi (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi)
		SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'R' as sisi
		FROM perkiraan WHERE LEFT(perkiraan.kode_perk,1)=4 OR LEFT(perkiraan.kode_perk,1)=5 OR LEFT(perkiraan.kode_perk,1)=6 
		OR LEFT(perkiraan.kode_perk,1)=7 OR LEFT(perkiraan.kode_perk,1)=8 OR LEFT(perkiraan.kode_perk,1)=9";
		$query = $this->db->query($sql);	
	}
	function get_saldo_realisasi_b($tgl_trans,$user_id){
        $query_ak="SELECT perkiraan.nama_perk,perkiraan.type,trans_detail_perk.tgl_trans,trans_detail_perk.kode_perk,
					SUM(trans_detail_perk.debet)- SUM(trans_detail_perk.kredit) AS jumlah_ak
					FROM trans_detail_perk,perkiraan
					WHERE trans_detail_perk.kode_perk=perkiraan.kode_perk
					AND trans_detail_perk.tgl_trans <= '".$tgl_trans."' 
					GROUP BY kode_perk ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function get_saldo_realisasi_a($month,$tahun){
        $query_ak="SELECT perkiraan.nama_perk,perkiraan.type,trans_detail_perk.tgl_trans,trans_detail_perk.kode_perk,
					SUM(trans_detail_perk.debet)- SUM(trans_detail_perk.kredit) AS jumlah_ak
					FROM trans_detail_perk,perkiraan
					WHERE trans_detail_perk.kode_perk=perkiraan.kode_perk
					AND MONTH(trans_detail_perk.tgl_trans) = '".$month."' AND YEAR(trans_detail_perk.tgl_trans) = '".$tahun."' 
					GROUP BY kode_perk ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function get_saldo_budget_a($bulan,$kode_proyek,$tahun){
		$query_ak="select b.kode_perk,b.".$bulan." from budget_perkiraan b where b.tahun = '".$tahun."' and b.id_proyek = '".$kode_proyek."'";
        $query = $this->db->query($query_ak);
        return $query;
	}
	function get_saldo_budget_b($bulan,$kode_proyek,$tahun){
		$query_ak="select b.kode_perk,b.saldo from budget_perkiraan b where b.tahun = '".$tahun."' and b.id_proyek = '".$kode_proyek."'";
        $query = $this->db->query($query_ak);
        return $query;
	}
	function update_saldo_budget_a($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_laba_rugi SET budget_a = budget_a +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_budget_b($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_laba_rugi SET budget_b = budget_b +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_realisasi_a($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_laba_rugi SET realisasi_a = realisasi_a +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_realisasi_b($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_laba_rugi SET realisasi_b = realisasi_b +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_temp_perkiraan($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_laba_rugi SET saldo_akhir = saldo_akhir +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function get_kode_induk($tgl_trans,$user_id){
		$sql = "select * from web_temp_laba_rugi where type='G' AND user_id='".$user_id."' AND tanggal <='".$tgl_trans."' order by level desc";
		$query = $this->db->query($sql);
		return $query;
	}
	function get_saldo_induk($kode_perk,$user_id){
		$sql = "SELECT saldo_akhir,realisasi_a,realisasi_b,budget_a,budget_b from web_temp_laba_rugi where kode_induk='".$kode_perk."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
		return $query;
	}
	function update_saldo_induk($kode_perk,$saldo,$realisasi_a,$realisasi_b,$budget_a,$budget_b,$user_id){	
		$sql = "UPDATE web_temp_laba_rugi SET saldo_akhir ='".$saldo."',realisasi_a='".$realisasi_a."',realisasi_b = '".$realisasi_b."',
		budget_a = '".$budget_a."',budget_b = '".$budget_a."' WHERE kode_perk='".$kode_perk."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	/*function get_data_neraca($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_laba_rugi where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_neraca_bukan_nol($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_laba_rugi where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and 
		saldo_akhir != 0 AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}*/	
	function get_labarugi_berjalan_realisasi_a(){
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
	function get_labarugi_berjalan_realisasi_b(){
		$sql = "SELECT((select realisasi_b as total_pendapatan from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 4 ) - 
				(select realisasi_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 5) -
				(select realisasi_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 6) -
				(select realisasi_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 7) +
				((select realisasi_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 8) -
				(select realisasi_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 9))
				) as lbrg_berjalan";
		$query = $this->db->query($sql)->row()->lbrg_berjalan;
		return $query;
	}
	function get_labarugi_berjalan_budget_a(){
		$sql = "SELECT((select budget_a as total_pendapatan from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 4 ) - 
				(select budget_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 5) -
				(select budget_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 6) -
				(select budget_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 7) +
				((select budget_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 8) -
				(select budget_a as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 9))
				) as lbrg_berjalan";
		$query = $this->db->query($sql)->row()->lbrg_berjalan;
		return $query;
	}
	function get_labarugi_berjalan_budget_b(){
		$sql = "SELECT((select budget_b as total_pendapatan from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 4 ) - 
				(select budget_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 5) -
				(select budget_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 6) -
				(select budget_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 7) +
				((select budget_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 8) -
				(select budget_b as total_biaya from web_temp_laba_rugi where web_temp_laba_rugi.kode_perk = 9))
				) as lbrg_berjalan";
		$query = $this->db->query($sql)->row()->lbrg_berjalan;
		return $query;
	}
	/*function get_total_aktiva($tgl_trans){
		$sql = "SELECT saldo_akhir as total_aktiva FROM web_temp_laba_rugi WHERE kode_perk=1 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_aktiva;
		return $query;
	}
	function get_total_pasiva($tgl_trans){
		$sql = "SELECT saldo_akhir as total_pasiva FROM web_temp_laba_rugi WHERE kode_perk=2 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_pasiva;
		return $query;
	}
	function get_total_modal($tgl_trans){
		$sql = "SELECT saldo_akhir as total_modal FROM web_temp_laba_rugi WHERE kode_perk=3 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_modal;
		return $query;
	}
	*/
	function get_all_data($tahun,$proyek){
		$sql = "select w.* from web_temp_laba_rugi w 
				order by w.kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_all_data_bukan_nol($tahun,$proyek){
		$sql = "select w.* from web_temp_laba_rugi w 
				where w.realisasi_a != '0' or w.realisasi_b != '0' or w.budget_a != '0' or w.budget_b != '0'
				order by w.kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function deleteTempPerk($tgl_trans,$user_id){
		$this->db->trans_begin();
		$query3	= $this->db->empty_table('web_temp_laba_rugi');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}	
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */