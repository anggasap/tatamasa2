<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_ar_m extends CI_Model {
	
	function getAr($tanggal1,$tanggal2)
	{
		$sql="select a.id_advance,a.id_kyw,a.jml_uang,a.tgl_trans,a.tgl_jt,a.keterangan,b.*,c.* from master_advance a 
			  left join master_karyawan b on a.id_kyw = b.id_kyw
			  left join master_dept c on  b.dept_kyw= c.id_dept
			  where tgl_jt between '".$tanggal1."' and '".$tanggal2."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getRmAll()
	{
		$sql="select a.*, b.nama_proyek from master_rumah a left join master_proyek b on a.id_proyek = b.id_proyek";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getCusAll(){
		$sql="select * from master_customer";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getRumahById($rumah){
		$sql = "select a.*, b.nama_proyek from master_rumah a left join master_proyek b on a.id_proyek = b.id_proyek where a.id_rumah = '".$rumah."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getCustomerById($customer){
		$sql="select * from master_customer where id_cust = '".$customer."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getAllArAdv($rumah,$customer){
		$sql="select b.* from master_jual a left join trans_jual b on a.master_id = b.master_id 
			  where b.kode_trans = '200' and a.id_rumah = '".$rumah."' and a.id_cust = '".$customer."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */