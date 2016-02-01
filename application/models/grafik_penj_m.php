<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Grafik_penj_m extends CI_Model {
	public function get_penj($bulan1,$bulan2)
	{
		$rows = array(); //will hold all results
		$sql="select date_format(tgl_trans,'%m-%Y') as tgl,count(id_rumah) as jml_rumah, sum(harga) as harga from master_jual
			  where tgl_trans between '$bulan1' and '$bulan2'
			  group by year(tgl_trans), month(tgl_trans) desc";

		$query=$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */