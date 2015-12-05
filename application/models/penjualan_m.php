<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Penjualan_m extends CI_Model {
	public function getDescRumah($idRumah)
	{
		$this->db->select ( 'r.*,p.nama_proyek' );
		$this->db->from('master_rumah r');
		$this->db->join('master_proyek p', 'r.id_proyek=p.id_proyek', 'LEFT');
		$this->db->where ( 'r.id_rumah', $idRumah );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	public function getDescRumahBooked($idRumah)
	{
		$this->db->select ( 'r.*,c.*, p.nama_proyek,mj.master_id, mj.tgl_trans,mj.booking' );
		$this->db->from('master_rumah r');
		$this->db->join('master_proyek p', 'r.id_proyek=p.id_proyek', 'LEFT');
		$this->db->join('master_jual mj', 'r.id_rumah=mj.id_rumah', 'LEFT');
		$this->db->join('master_customer c', 'mj.id_cust=c.id_cust', 'LEFT');
		$this->db->where ( 'r.id_rumah', $idRumah );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}


	public function getRumahAll()
	{
		$sql="SELECT r.*,p.nama_proyek from master_rumah r left join master_proyek p on r.id_proyek = p.id_proyek where status_jual = 0 or status_jual = 1 order by r.harga desc";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}

	/*function ubahRumah($data,$idRumah){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_rumah', $idRumah);
		$query2 = $this->db->update('master_rumah', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}*/
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