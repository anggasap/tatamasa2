<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Approval_reqpay_m extends CI_Model {
	public function getRpAll()
	{
		$sql="SELECT * from master_reqpay ma left join master_karyawan mk on ma.id_kyw = mk.id_kyw left join master_supplier ms on ma.pay_to = ms.id_spl";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function getDescRp($idRp)
	{
		$this->db->select ( 'mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.no_invoice, mr.no_po, mr.jml_uang,mr.id_proyek, mr.id_kurs, mr.nilai_kurs,mr.tgl_trans, mr.tgl_jt, mr.pay_to,ms.nama_spl, ms.nama_akun_bank, ms.no_akun_bank, ms.nama_bank, mr.keterangan, mr.dok_fpe, mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast, mr.dok_bap, mr.dok_cop, mr.dok_ssp, mr.dok_sspk, mr.dok_sbj, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket,mp.nama_proyek,mr.inout_budget' );
		$this->db->from('master_reqpay mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->join('master_supplier ms', 'mr.pay_to=ms.id_spl', 'LEFT');
		$this->db->join('master_proyek mp', 'mr.id_proyek=mp.id_proyek', 'LEFT');
		$this->db->where ( 'mr.id_reqpay', $idRp );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}	
	}
	function updateReqpay($data,$advId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reqpay', $advId);
		$query2 = $this->db->update('master_reqpay', $data);
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