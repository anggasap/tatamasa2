<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Lapneracamodel extends CI_Model {
	
	function insert_temp_perkiraan_aktiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_perkiraan (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'L' as sisi ";
		$sql .= "FROM perkiraan WHERE "; 			
		$sql .= "LEFT(perkiraan.kode_perk,1)=1 OR LEFT(perkiraan.kode_perk,1)=5 OR LEFT(perkiraan.kode_perk,1)=6";
		$query = $this->db->query($sql);					   
	}
	
	function insert_temp_perkiraan_pasiva($tgl_trans,$user_id){
		$sql  = "INSERT INTO web_temp_perkiraan (user_id,tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_akhir,sisi) ";
		$sql .= "SELECT '".$user_id."' as user_id,'".$tgl_trans."' as tanggal,kode_perk,kode_alt,nama_perk,type,level,kode_induk,saldo_awal,'R' as sisi ";
		$sql .= "FROM perkiraan WHERE "; 			
		$sql .= "LEFT(perkiraan.kode_perk,1)=2 OR LEFT(perkiraan.kode_perk,1)=3 OR LEFT(perkiraan.kode_perk,1)=4";
		$query = $this->db->query($sql);	
	}
	
	function get_saldo_aktiva($tgl_trans,$user_id){
        $query_ak="SELECT perkiraan.nama_perk,perkiraan.type,trans_detail_perk.tgl_trans,trans_detail_perk.kode_perk,
					SUM(trans_detail_perk.debet)- SUM(trans_detail_perk.kredit) AS jumlah_ak
					FROM trans_detail_perk,perkiraan
					WHERE trans_detail_perk.kode_perk=perkiraan.kode_perk
					AND trans_detail_perk.tgl_trans <= '".$tgl_trans."' AND (LEFT(perkiraan.kode_perk,1)=1 OR LEFT(perkiraan.kode_perk,1)=5
					OR LEFT(perkiraan.kode_perk,1)=6)
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
					OR LEFT(perkiraan.kode_perk,1)=4) GROUP BY
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
	function get_data_neraca_aktiva($induk=0)
	{
		$data = array();
		$sql = "SELECT * from web_temp_perkiraan where kode_induk='".$induk."' AND left(kode_perk,1)='1' order by kode_perk asc";
		$result = $this->db->query($sql);
		foreach($result->result() as $row)
		{
			$data[] = array(
					'kode_perk'	=>$row->kode_perk,
					'nama'	=>$row->nama_perk,
					'saldo'	=>$row->saldo_akhir,
					'level'	=>$row->level,
					'type'	=>$row->type,
					// recursive
					'child'	=>$this->get_data_neraca_aktiva($row->kode_perk)
				);
		}
		return $data;
	}
	function get_data_neraca_pasiva($induk=0){
		$data = array();
		$sql = "SELECT * from web_temp_perkiraan where kode_induk='".$induk."' AND (left(kode_perk,1)='2' OR left(kode_perk,1)='3') ";
		$sql.= "order by kode_perk asc";
		$result = $this->db->query($sql);
		foreach($result->result() as $row){
			$data[] = array(
					'kode_perk'	=>$row->kode_perk,
					'nama'	=>$row->nama_perk,
					'saldo'	=>$row->saldo_akhir,
					'level'	=>$row->level,
					'type'	=>$row->type,
					// recursive
					'child'	=>$this->get_data_neraca_pasiva($row->kode_perk)
				);
		}
		return $data;
	}
	function get_data_neraca($tgl_trans,$user_id){
		$sql = "SELECT * from web_temp_perkiraan where user_id = '".$user_id."' and tanggal <= '".$tgl_trans."' 
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
	function get_labarugi_berjalan(){
		$sql = "SELECT ((SELECT saldo_akhir FROM web_temp_perkiraan WHERE kode_perk=4)-";
		$sql.= "(SELECT saldo_akhir FROM web_temp_perkiraan WHERE kode_perk=5)) as lbrg_berjalan";
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
	function deleteTemp($tgl_trans,$user_id){
		$this->db->trans_begin();
		$query1	= $this->db->where('user_id',$user_id);
		$query2	= $this->db->where('tanggal',$tgl_trans);
		$query3	= $this->db->delete('web_temp_perkiraan');
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