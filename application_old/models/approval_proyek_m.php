<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Approval_proyek_m extends CI_Model {
	function updateApproval($data,$advId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_proyek', $advId);
		$query2 = $this->db->update('master_proyek', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getIdAdv($id_proyek){
		$sql= "select id_rumah from master_rumah where id_proyek='$id_proyek'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = $id_proyek;
		if($jml == 0){
			$id_adv = "001";
			return $kode."-".$id_adv;
		}else{
			$sql= "select max(substring(id_advance,4,7)) as id_adv from master_advance";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_adv;
			$id_adv = sprintf('%07u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
}
/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */