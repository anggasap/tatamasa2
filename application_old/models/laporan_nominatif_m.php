<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Laporan_nominatif_m extends CI_Model {
	
	function getList($tanggal)
	{
		$sql="select a.master_id,a.id_cust,mr.nama_rumah,mc.nama_cust,a.harga,a.booking,
				(select coalesce(sum(jml_trans) ,0) from trans_jual where kode_trans='300' and master_id=a.master_id) as sdhdibayar,
				(
					(
						(select harga from master_jual where master_id=a.master_id)-
						(select coalesce(sum(jml_trans) ,0)  from trans_jual where kode_trans='300' and master_id=a.master_id)
					)
				) as sisaAngs			
				from master_jual a 
				left join master_rumah mr on mr.id_rumah = a.id_rumah
				left join master_customer mc on mc.id_cust = a.id_cust
				where a.tgl_trans <= '".$tanggal."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */