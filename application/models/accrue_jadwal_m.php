<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Accrue_jadwal_m extends CI_Model {

	public function getCJadwalJT($tglTrans)
	{
		$sql="select tj.master_id,mr.nama_rumah,mc.nama_cust,tj.tgl_trans,tj.jml_trans from trans_jual tj
			  left join master_jual mj on tj.master_id = mj.master_id
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where tj.tgl_trans= '$tglTrans' and tj.kode_trans = 200 and tj.accr = 0";
		$query=$this->db->query($sql);

		return $query->num_rows();
	}
	public function getJadwalJT($tglTrans)
	{
		$sql="select tj.master_id,mp.id_proyek,mr.nama_rumah,mc.nama_cust,tj.tgl_trans,tj.jml_trans,mc.kode_perk from trans_jual tj
			  left join master_jual mj on tj.master_id = mj.master_id
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where tj.tgl_trans= '$tglTrans' and tj.kode_trans = 200 and tj.accr = 0";
		$query=$this->db->query($sql);

		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	public function getJurnalPend($idJurnalPend)
	{
		$this->db->select ( 'ij.kode_perk,p.nama_perk' );
		$this->db->from('integrasi_jurnal ij');
		$this->db->join('perkiraan p', 'ij.kode_perk=p.kode_perk', 'LEFT');
		$this->db->where ( 'id_integrasi', $idJurnalPend );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();

		$rows = $query->result();
		return $rows;

	}
	function updateAccrStatus($data_accr,$tmpIdPenj,$tglTrans){
		/*$sql ="update trans_jual set accr = 1 where master_id = '$tmpIdPenj' and tgl_trans = '$tglTrans' and kode_trans = '200'";
		$query=$this->db->query($sql);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}*/

		$this->db->trans_begin();
		$query1 = $this->db->where('master_id', $tmpIdPenj);
		$query1 = $this->db->where('tgl_trans', $tglTrans);
		$query1 = $this->db->where('kode_trans', '200');
		$query2 = $this->db->update('trans_jual', $data_accr);
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