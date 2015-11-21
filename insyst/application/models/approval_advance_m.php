<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Approval_advance_m extends CI_Model {
	public function getAdvAll()
	{
		$sql="SELECT * from master_advance ma left join master_karyawan mk on ma.id_kyw = mk.id_kyw";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function getDescAdv($idAdv)
	{
		$this->db->select('ma.id_kyw, mk.nama_kyw, md.nama_dept, ma.jml_uang, ma.tgl_jt, ma.pay_to, ma.nama_akun_bank, ma.no_akun_bank, ma.nama_bank, ma.keterangan, ma.dok_po, ma.dok_sp, ma.dok_ssp, ma.dok_sspk, ma.dok_sbj, ma.app_keuangan_id, ma.app_hd_id, ma.app_gm_id, ma.app_keuangan_status, ma.app_hd_status, ma.app_gm_status, ma.app_keuangan_tgl, ma.app_hd_tgl, ma.app_gm_tgl, ma.app_keuangan_ket, ma.app_hd_ket, ma.app_gm_ket' );
		$this->db->from('master_advance ma');
		$this->db->join('master_karyawan mk', 'ma.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->where ( 'ma.id_advance', $idAdv );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}	
	}
	function updateAdvance($data,$advId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_advance', $advId);
		$query2 = $this->db->update('master_advance', $data);
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