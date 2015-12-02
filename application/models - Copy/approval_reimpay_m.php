<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Approval_reimpay_m extends CI_Model {
	public function getRbAll()
	{
		$sql="SELECT * from master_reimpay mr 
		left join master_karyawan mk on mr.id_kyw = mk.id_kyw ";
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
	public function getDescRb($idRb)
	{
		$this->db->select ('mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.no_invoice, mr.jml_uang, mr.tgl_jt, mr.pay_to,mr.keterangan, mr.dok_fpe, 
		mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast,mr.dok_pc,mr.dok_lpkk, mr.app_keuangan_id, 
		mr.app_hd_id, mr.app_gm_id,mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, mr.app_gm_tgl,
		mr.app_keuangan_ket,mr.app_hd_ket, mr.app_gm_ket,mr.inout_budget');
		$this->db->from('master_reimpay mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->where('mr.id_reimpay', $idRb );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}	
	}
	function updateReimpay($data,$id){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reimpay', $id);
		$query2 = $this->db->update('master_reimpay', $data);
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
		$sql = $this->db->update('master_reimpay', $data, "id_reimpay = ".$id."");
		return $sql;
	}
}
/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */