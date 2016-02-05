<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_arus_cashflow_m extends CI_Model {
	
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
	function insert_temp_laba_rugi($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_arus_kas (user_id,tanggal,kode_cflow,kode_alt,nama_cflow,type,level,kode_induk,saldo_akhir,sisi)
		SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_cflow,kode_alt,nama_cflow,type,level,kode_induk,saldo_awal,'R' as sisi
		FROM master_cashflow mc WHERE LEFT(mc.kode_cflow,1)=1 OR LEFT(mc.kode_cflow,1)=2 OR LEFT(mc.kode_cflow,1)=3";
		$query = $this->db->query($sql);	
	}
	function get_saldo_realisasi_b($tgl_trans,$user_id){
        $query_ak="SELECT master_cashflow.nama_cflow,master_cashflow.type,trans_detail_cflow.tgl_trans,trans_detail_cflow.kode_cflow,
					SUM(trans_detail_cflow.saldo_akhir) AS jumlah_ak
					FROM trans_detail_cflow,master_cashflow
					WHERE trans_detail_cflow.kode_cflow=master_cashflow.kode_cflow
					AND trans_detail_cflow.tgl_trans <= '".$tgl_trans."' 
					GROUP BY kode_cflow ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function get_saldo_realisasi_a($month,$tahun){
        $query_ak="SELECT master_cashflow.nama_cflow,master_cashflow.type,trans_detail_cflow.tgl_trans,trans_detail_cflow.kode_cflow,
					SUM(trans_detail_cflow.saldo_akhir) AS jumlah_ak
					FROM trans_detail_cflow,master_cashflow
					WHERE trans_detail_cflow.kode_cflow=master_cashflow.kode_cflow
					AND MONTH(trans_detail_cflow.tgl_trans) = '".$month."' AND YEAR(trans_detail_cflow.tgl_trans) = '".$tahun."' 
					GROUP BY kode_cflow ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function get_saldo_budget_a($bulan,$kode_proyek,$tahun){
		$query_ak="select b.kode_cflow,b.".$bulan." from budget_cflow b where b.tahun = '".$tahun."' and b.id_proyek = '".$kode_proyek."'";
        $query = $this->db->query($query_ak);
        return $query;
	}
	function get_saldo_budget_b($bulan,$kode_proyek,$tahun){
		$query_ak="select b.kode_cflow,b.saldo from budget_cflow b where b.tahun = '".$tahun."' and b.id_proyek = '".$kode_proyek."'";
        $query = $this->db->query($query_ak);
        return $query;
	}
	function update_saldo_budget_a($kode_cflow,$saldo,$user_id){
		$sql ="UPDATE web_temp_arus_kas SET budget_a = budget_a +'".$saldo."' WHERE kode_cflow='".$kode_cflow."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_budget_b($kode_cflow,$saldo,$user_id){
		$sql ="UPDATE web_temp_arus_kas SET budget_b = budget_b +'".$saldo."' WHERE kode_cflow='".$kode_cflow."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_realisasi_a($kode_cflow,$saldo,$user_id){
		$sql ="UPDATE web_temp_arus_kas SET realisasi_a = realisasi_a +'".$saldo."' WHERE kode_cflow='".$kode_cflow."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function update_saldo_realisasi_b($kode_cflow,$saldo,$user_id){
		$sql ="UPDATE web_temp_arus_kas SET realisasi_b = realisasi_b +'".$saldo."' WHERE kode_cflow='".$kode_cflow."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function get_kode_induk($tgl_trans,$user_id){
		$sql = "select * from web_temp_arus_kas where type='G' AND user_id='".$user_id."' AND tanggal <='".$tgl_trans."' order by level desc";
		$query = $this->db->query($sql);
		return $query;
	}
	function get_saldo_induk($kode_cflow,$user_id){
		$sql = "SELECT saldo_akhir,realisasi_a,realisasi_b,budget_a,budget_b from web_temp_arus_kas where kode_induk='".$kode_cflow."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
		return $query;
	}
	function update_saldo_induk($kode_cflow,$saldo,$realisasi_a,$realisasi_b,$budget_a,$budget_b,$user_id){	
		$sql = "UPDATE web_temp_arus_kas SET saldo_akhir ='".$saldo."',realisasi_a='".$realisasi_a."',realisasi_b = '".$realisasi_b."',
		budget_a = '".$budget_a."',budget_b = '".$budget_a."' WHERE kode_cflow='".$kode_cflow."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function get_total_realisasi_a(){
		$sql = "SELECT((select realisasi_a as total_pendapatan from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101 ) -		
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) -
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301) -
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_realisasi_b(){
		$sql = "SELECT((select realisasi_b as total_pendapatan from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101 ) -		
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) -
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301) -
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_a(){
		$sql = "SELECT((select budget_a as total_pendapatan from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101 ) -		
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) -
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301) -
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_b(){
		$sql = "SELECT((select budget_b as total_pendapatan from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101 ) -		
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) -
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301) -
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_realisasi_a_kas_keluar(){
		$sql = "SELECT(		
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_realisasi_b_kas_keluar(){
		$sql = "SELECT(		
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_a_kas_keluar(){
		$sql = "SELECT(		
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_b_kas_keluar(){
		$sql = "SELECT(		
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 102) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 202) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 302)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_realisasi_a_kas_masuk(){
		$sql = "SELECT(		
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) +
				(select realisasi_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_realisasi_b_kas_masuk(){
		$sql = "SELECT(		
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) +
				(select realisasi_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_a_kas_masuk(){
		$sql = "SELECT(		
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) +
				(select budget_a as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_total_budget_b_kas_masuk(){
		$sql = "SELECT(		
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 101) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 201) +
				(select budget_b as total_biaya from web_temp_arus_kas where web_temp_arus_kas.kode_cflow = 301)
				) as total";
		$query = $this->db->query($sql)->row()->total;
		return $query;
	}
	function get_all_data($tahun,$proyek){
		$sql = "select w.* from web_temp_arus_kas w 
				order by w.kode_cflow asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_all_data_bukan_nol($tahun,$proyek){
		$sql = "select w.* from web_temp_arus_kas w 
				where w.realisasi_a != '0' or w.realisasi_b != '0' or w.budget_a != '0' or w.budget_b != '0'
				order by w.kode_cflow asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function deleteTempPerk($tgl_trans,$user_id){
		$this->db->trans_begin();
		$query3	= $this->db->empty_table('web_temp_arus_kas');
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