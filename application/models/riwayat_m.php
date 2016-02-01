<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Riwayat_m extends CI_Model {
	public function getCJadwalJT($idMaster)
	{
		$sql="select tj.master_id,mr.nama_rumah,mc.nama_cust,tj.tgl_trans,tj.jml_trans from trans_jual tj
			  left join master_jual mj on tj.master_id = mj.master_id
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where tj.master_id= '$idMaster' and tj.kode_trans <> 200";
		$query=$this->db->query($sql);

		return $query->num_rows();
	}
	public function getJadwalJT($idMaster)
	{
		$sql="select tj.master_id,mp.id_proyek,mr.nama_rumah,mc.nama_cust,tj.tgl_trans,tj.kode_trans,tj.jml_trans,tj.keterangan,mc.kode_perk from trans_jual tj
			  left join master_jual mj on tj.master_id = mj.master_id
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where tj.master_id= '$idMaster' and tj.kode_trans <> 200";
		$query=$this->db->query($sql);

		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	function ubahMasterJual($data,$idPenj){
		$this->db->trans_begin();
		$query1 = $this->db->where('master_id', $idPenj);
		$query2 = $this->db->update('master_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
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