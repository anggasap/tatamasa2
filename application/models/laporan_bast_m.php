<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_bast_m extends CI_Model {
	
	function insert_temp_perkiraan_aktiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_perkiraan (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) 
				SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'L' as sisi 
				FROM perkiraan WHERE 			
				LEFT(perkiraan.kode_perk,1)=1 ";
		$query = $this->db->query($sql);					   
	}
	
	function insert_temp_perkiraan_pasiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_perkiraan (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) 
		SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'R' as sisi
		FROM perkiraan WHERE  			
		LEFT(perkiraan.kode_perk,1)=2 OR LEFT(perkiraan.kode_perk,1)=3 OR LEFT(perkiraan.kode_perk,1)=4 OR LEFT(perkiraan.kode_perk,1)=5
		OR LEFT(perkiraan.kode_perk,1)=6 OR LEFT(perkiraan.kode_perk,1)=7 OR LEFT(perkiraan.kode_perk,1)=8 OR LEFT(perkiraan.kode_perk,1)=9";
		$query = $this->db->query($sql);	
	}
	
	function get_saldo_aktiva($tgl_trans,$user_id){
        $query_ak="SELECT perkiraan.nama_perk,perkiraan.type,trans_detail_perk.tgl_trans,trans_detail_perk.kode_perk,
					SUM(trans_detail_perk.debet)- SUM(trans_detail_perk.kredit) AS jumlah_ak
					FROM trans_detail_perk,perkiraan
					WHERE trans_detail_perk.kode_perk=perkiraan.kode_perk
					AND trans_detail_perk.tgl_trans <= '".$tgl_trans."' AND LEFT(perkiraan.kode_perk,1)=1 
					GROUP BY kode_perk ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function get_saldo_pasiva($tgl_trans,$user_id){
        $query_ak="SELECT perkiraan.nama_perk,perkiraan.type,trans_detail_perk.kode_perk,
					SUM(trans_detail_perk.kredit) - SUM(trans_detail_perk.debet) AS jumlah_psv
					FROM trans_detail_perk,perkiraan
					WHERE trans_detail_perk.kode_perk=perkiraan.kode_perk
					AND tgl_trans <='".$tgl_trans."' AND (LEFT(perkiraan.kode_perk,1)=2 OR LEFT(perkiraan.kode_perk,1)=3
					OR LEFT(perkiraan.kode_perk,1)=4 OR LEFT(perkiraan.kode_perk,1)=5 OR LEFT(perkiraan.kode_perk,1)=6 
					OR LEFT(perkiraan.kode_perk,1)=7 OR LEFT(perkiraan.kode_perk,1)=8 OR LEFT(perkiraan.kode_perk,1)=9) GROUP BY
					kode_perk ASC";
        $query = $this->db->query($query_ak);
        return $query;
    }
	function update_saldo_temp_perkiraan($kode_perk,$saldo,$user_id){
		$sql ="UPDATE web_temp_perkiraan SET saldo_akhir = saldo_akhir +'".$saldo."' WHERE kode_perk='".$kode_perk."' and user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function get_kode_induk($tgl_trans,$user_id){
		$sql = "select * from web_temp_perkiraan where type='G' AND user_id='".$user_id."' AND tanggal <='".$tgl_trans."' order by level desc";
		$query = $this->db->query($sql);
		return $query;
	}
	function get_saldo_induk($kode_perk,$user_id){
		$sql = "SELECT saldo_akhir from web_temp_perkiraan where kode_induk='".$kode_perk."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
		return $query;
	}
	function update_saldo_induk($kode_perk,$saldo,$user_id){	
		$sql = "UPDATE web_temp_perkiraan SET saldo_akhir ='".$saldo."' WHERE kode_perk='".$kode_perk."' AND user_id='".$user_id."'";
		$query = $this->db->query($sql);
	}
	function get_data_neraca($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_neraca_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and type = 'G' 
		AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_neraca_bukan_nol($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and 
		saldo_akhir != 0 AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function get_data_neraca_bukan_nol_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' and type = 'G' and
		saldo_akhir != 0 AND (left(kode_perk,1)='1' OR left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();
	}	
	function get_labarugi_berjalan(){
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
	function get_total_aktiva($tgl_trans){
		$sql = "SELECT saldo_akhir as total_aktiva FROM web_temp_perkiraan WHERE kode_perk=1 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_aktiva;
		return $query;
	}
	function get_total_pasiva($tgl_trans){
		$sql = "SELECT saldo_akhir as total_pasiva FROM web_temp_perkiraan WHERE kode_perk=2 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_pasiva;
		return $query;
	}
	function get_total_modal($tgl_trans){
		$sql = "SELECT saldo_akhir as total_modal FROM web_temp_perkiraan WHERE kode_perk=3 AND tanggal='".$tgl_trans."'";
		$query = $this->db->query($sql)->row()->total_modal;
		return $query;
	}
	//benuk T. dengan 0
	function get_total_neraca_aktiva($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		AND left(kode_perk,1)='1' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();;
	}
	function get_total_neraca_pasiva($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		AND (left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function insert_temp_aktiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,'','','','','0','','0' ";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function insert_temp_pasiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp ('',user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,'','','','','0','','0',kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "(left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function get_data_aktiva(){
		$sql .= "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_data_pasiva(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE (left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();	
	}
	//end dengan 0;
	
	//benuk T. dengan 0 hanya header
	function get_total_neraca_aktiva_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		and type='G' AND left(kode_perk,1)='1' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();;
	}
	function get_total_neraca_pasiva_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		and type='G' AND (left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function insert_temp_aktiva_hanya_header($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,'','','','','0','','0' ";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function insert_temp_pasiva_hanya_header($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,'','','','','0','','0',kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "(left(kode_perk,1)='2' OR left(kode_perk,1)='3') and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function get_data_aktiva_hanya_header(){
		$sql .= "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_data_pasiva_hanya_header(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE (left(kode_perk,1)='2' OR left(kode_perk,1)='3') and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();	
	}
	//end dengan 0 hanya header;
	//tanpa 0
	function get_total_neraca_aktiva_tanpa_0($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		AND left(kode_perk,1)='1' and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();;
	}
	function get_total_neraca_pasiva_tanpa_0($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		and saldo_akhir != 0 AND (left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function insert_temp_aktiva_tanpa_0($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,'','','','','0','','0' ";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function insert_temp_pasiva_tanpa_0($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv)
				SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,'','','','','0','','0',kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
				FROM web_temp_perkiraan WHERE 			
				(left(kode_perk,1)='2' OR left(kode_perk,1)='3') and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function get_data_aktiva_tanpa_0(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE 			
		LEFT(web_temp_perkiraan.kode_perk,1)=1 and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_data_pasiva_tanpa_0(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE (left(kode_perk,1)='2' OR left(kode_perk,1)='3') and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();	
	}
	//end tanpa 0
	//tanpa 0 hanya header
	function get_total_neraca_aktiva_tanpa_0_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		and type='G' AND left(kode_perk,1)='1' and saldo_akhir != 0 order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();;
	}
	function get_total_neraca_pasiva_tanpa_0_hanya_header($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
		and type='G' and saldo_akhir != 0 AND (left(kode_perk,1)='2' OR left(kode_perk,1)='3') order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	function insert_temp_aktiva_tanpa_0_hanya_header($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,'','','','','0','','0' ";
		$sql .= "FROM web_temp_perkiraan WHERE "; 			
		$sql .= "LEFT(web_temp_perkiraan.kode_perk,1)=1 and saldo_akhir != 0 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function insert_temp_pasiva_tanpa_0_hanya_header($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,kode_perk_psv,kode_alt_psv,nama_perk_psv,type_psv,level_psv,kode_induk_psv,saldo_akhir_psv)
				SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,'','','','','0','','0',kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
				FROM web_temp_perkiraan WHERE 			
				(left(kode_perk,1)='2' OR left(kode_perk,1)='3') and saldo_akhir != 0 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);					   
	}
	function get_data_aktiva_tanpa_0_hanya_header(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE 			
		LEFT(web_temp_perkiraan.kode_perk,1)=1 and saldo_akhir != 0 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();		
	}
	function get_data_pasiva_tanpa_0_hanya_header(){
		$sql = "SELECT user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir
		FROM web_temp_perkiraan WHERE (left(kode_perk,1)='2' OR left(kode_perk,1)='3') and saldo_akhir != 0 and type='G' order by kode_perk asc";
		$query = $this->db->query($sql);
		return $query->result();	
	}
	//end tanpa 0 hanya header
	function get_data_neraca_t($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function update_temp($data,$id){
		$this->db->where('id', $id);
		$this->db->update('web_temp', $data); 	
	}
	function deleteTempPerk($tgl_trans,$user_id){
		$this->db->trans_begin();
		$query3	= $this->db->empty_table('web_temp_perkiraan');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}	
	}
	function deleteTemp($tgl_trans,$user_id){
		$this->db->trans_begin();
		$query3	= $this->db->empty_table('web_temp');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}	
	}
}

/* End of file kasmodel.php */
/* Location: ./application/models/kasmodel.php */