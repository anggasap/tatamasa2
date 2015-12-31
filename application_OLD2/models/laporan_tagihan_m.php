<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_tagihan_m extends CI_Model {
	
	function getRmAll()
	{
		$sql="select a.*, b.nama_proyek from master_rumah a left join master_proyek b on a.id_proyek = b.id_proyek where a.status_jual = 2";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getMasterAll(){
		$sql="select a.master_id,b.*,c.nama_cust,c.no_id,d.nama_proyek from master_jual a
				left join master_rumah b on a.id_rumah = b.id_rumah
				left join master_customer c on a.id_cust = c.id_cust
				left join master_proyek d on b.id_proyek = d.id_proyek";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getMasterById($master){
		$sql = "select b.*,c.nama_cust,c.no_id,d.nama_proyek from master_jual a
				left join master_rumah b on a.id_rumah = b.id_rumah
				left join master_customer c on a.id_cust = c.id_cust
				left join master_proyek d on b.id_proyek = d.id_proyek where a.master_id = '".$master."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getCustomerById($customer){
		$sql="select * from master_customer where id_cust = '".$customer."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getAllArAdv($tanggal){
		$sql=" select q.master_id,c.nama_cust,c.no_hp,r.nama_rumah,m.harga, q.jadwal-q.angs as tagihan,tot_jadwal - tot_angs as baki_debet from(
				select master_id,
				sum(case when kode_trans='200' and tgl_trans <= '".$tanggal."' then jml_trans else 0 end) as jadwal,
				sum(case when kode_trans='300' and tgl_trans <= '".$tanggal."' then jml_trans else 0 end) as angs,
				sum(case when kode_trans='200' then jml_trans else 0 end) as tot_jadwal,
				sum(case when kode_trans='300' then jml_trans else 0 end) as tot_angs
				from trans_jual t group by master_id) as q left join master_jual m on q.master_id =m.master_id 
				left join master_customer c on m.id_cust = c.id_cust
				left join master_rumah r on m.id_rumah = r.id_rumah";
		$query=$this->db->query($sql);
		return $query->result();
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */