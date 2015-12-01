<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Approval_settle_m extends CI_Model {
	public function getSettleAll()
	{
		$sql="SELECT * from master_settle_adv ms 
		left join master_karyawan mk on ms.id_kyw = mk.id_kyw ";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getPayTo($idKyw){
		$this->db->select('nama_kyw');
		$this->db->from('master_karyawan');
		$this->db->where('id_kyw',$idKyw);
		$query = $this->db->get()->row()->nama_kyw;
		return $query;
	}
	function getDescSt($idSettle)
	{
		$this->db->select('mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.id_adv,ma.jml_uang,mr.jml_uang_paid,mr.jml_uang_oupaid,
		 mr.tgl_jt, mr.pay_to, mr.nama_akun_bank, mr.no_akun_bank, mr.nama_bank, mr.keterangan, mr.dok_fpe, 
		 mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg, mr.dok_bast, 
		 mr.dok_bap, mr.dok_ssp, mr.dok_sspk, mr.dok_lpjum, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, 
		 mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, 
		 mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket, mr.app_user_id, mr.inout_budget' );
		$this->db->from('master_settle_adv mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->join('master_advance ma', 'ma.id_advance = mr.id_adv', 'LEFT');
		$this->db->where('mr.id_settle_adv', $idSettle );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}
	function updateSettle($data,$id){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_settle_adv', $id);
		$query2 = $this->db->update('master_settle_adv', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	function update($data,$id){
		$sql = $this->db->update('master_settle_adv', $data, "id_settle_adv = ".$id."");
		return $sql;
	}
}
/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */