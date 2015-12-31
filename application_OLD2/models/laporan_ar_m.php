<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_ar_m extends CI_Model {
	
	function getRmAll()
	{
		$sql="select a.*, b.nama_proyek from master_rumah a left join master_proyek b on a.id_proyek = b.id_proyek where a.status_jual = 2";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getCusAll(){
		$sql="select * from master_customer";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getRumahById($rumah){
		$sql = "select b.*,c.nama_cust,c.no_id,d.nama_proyek from master_jual a
				left join master_rumah b on a.id_rumah = b.id_rumah
				left join master_customer c on a.id_cust = c.id_cust
				left join master_proyek d on b.id_proyek = d.id_proyek where a.id_rumah = '".$rumah."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getCustomerById($customer){
		$sql="select * from master_customer where id_cust = '".$customer."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getAllArAdv($rumah){
		$sql="select b.* from master_jual a left join trans_jual b on a.master_id = b.master_id 
			  where b.kode_trans = '200' and a.id_rumah = '".$rumah."' and a.status_jual = 2";
		$query=$this->db->query($sql);
		return $query->result();
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */