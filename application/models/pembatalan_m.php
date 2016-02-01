<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Pembatalan_m extends CI_Model {
	public function getPenjualanAll()
	{
		$sql="SELECT mj.master_id,mj.id_rumah,mj.id_cust,mr.nama_rumah,mc.nama_cust,mj.status_jual
			  from master_jual mj
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  where mj.status_jual = '1' or mj.status_jual = '2'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getAngsInfo($idPenj)
	{
		$sql="select jml_trans as totalAngs from trans_jual where master_id ='$idPenj' and kode_trans = '300'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getAngsInfo2($idPenj)
	{
		$sql ="select queri.sisaAngs,queri.sdhdibayar from(
				select (
						(
							(select harga from master_jual where master_id='$idPenj')-
							(select coalesce(sum(jml_trans) ,0)  from trans_jual where kode_trans='300' and master_id='$idPenj')
						)
					) as sisaAngs,
					(select coalesce(sum(jml_trans) ,0) from trans_jual where  kode_trans='300' and master_id='$idPenj') as sdhdibayar
  				) as queri";
		$query=$this->db->query($sql);
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	function update_statusmasterjual($data_master_jual,$kodePenj){
		$this->db->trans_begin();
		$query1 = $this->db->where('master_id', $kodePenj);
		$query2 = $this->db->update('master_jual', $data_master_jual);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function update_statusmasterrumah($data_master_rumah,$idRumah){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_rumah', $idRumah);
		$query2 = $this->db->update('master_rumah', $data_master_rumah);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}

	
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */