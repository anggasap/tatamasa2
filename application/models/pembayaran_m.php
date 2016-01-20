<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Pembayaran_m extends CI_Model {
	public function getRumahAll()
	{
		$sql="SELECT r.*,p.nama_proyek,mj.master_id,mj.harga as harga_deal from master_rumah r left join master_proyek p on r.id_proyek = p.id_proyek left join master_jual mj on r.id_rumah = mj.id_rumah where r.status_jual = 2 and mj.status_jual";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}

	public function getDescRumahSelled($idRumah)
	{
		$this->db->select ( 'r.*,c.*, mj.master_id, mj.tgl_trans, mj.harga,c.kode_perk,p.nama_perk' );
		$this->db->from('master_rumah r');
		$this->db->join('master_jual mj', 'r.id_rumah=mj.id_rumah', 'LEFT');
		$this->db->join('master_customer c', 'mj.id_cust=c.id_cust', 'LEFT');
		$this->db->join('perkiraan p', 'c.kode_perk=p.kode_perk', 'LEFT');
		$this->db->where ( 'r.id_rumah', $idRumah );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	public function getAngsInfo1($idPenj)
	{
		$sql ="select queri.allAngs,queri.sisaAngs,(queri.allAngs-queri.sisaAngs) as jmlAngs,(queri.allAngs-queri.sisaAngs)+1 as angsKe from(
				select round(
						(
							(select harga from master_jual where master_id='$idPenj')-
							(select coalesce(sum(jml_trans) ,0)  from trans_jual where kode_trans='300' and master_id='$idPenj')
						)/(
							select distinct(jml_trans) from trans_jual where kode_trans='200' and master_id='$idPenj' limit 1
						)
					) as sisaAngs,
					(select count(trans_id) from trans_jual where master_id='$idPenj' and kode_trans='200') as allAngs
  				) as queri";
		$query=$this->db->query($sql);
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	public function getAngsInfo2($idPenj,$tglTrans)
	{
		$sql ="select queri.sisaAngs, queri.tagihan,queri.sdhdibayar from(
				select (
						(
							(select harga from master_jual where master_id='$idPenj')-
							(select coalesce(sum(jml_trans) ,0)  from trans_jual where kode_trans='300' and master_id='$idPenj')
						)
					) as sisaAngs,
					(
						(select coalesce(sum(jml_trans) ,0) from trans_jual where tgl_trans<= '$tglTrans' and kode_trans='200' and master_id='$idPenj')-
						(select coalesce(sum(jml_trans) ,0) from trans_jual where tgl_trans<= '$tglTrans' and kode_trans='300' and master_id='$idPenj')
					 )as tagihan	,
					(select coalesce(sum(jml_trans) ,0) from trans_jual where  kode_trans='300' and master_id='$idPenj') as sdhdibayar
  				) as queri";
		$query=$this->db->query($sql);
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}

	public function simpan_trans($data){

		$this->db->trans_begin();
		$model = $this->db->insert('trans_jual', $data);
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