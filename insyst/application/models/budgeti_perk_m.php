<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Budgeti_perk_m extends CI_Model {
	public function getTahun() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select distinct(tahun) as tahun from budget_perkiraan order by tahun asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	function getBudgetPerk($tahun)
	{
		$sql="SELECT b.*,p.nama_perk,p.level from budget_perkiraan b left join perkiraan p on b.kode_perk = p.kode_perk where b.tahun = '$tahun'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	
	function getNamaProyek($tahun)
	{
		$sql="select distinct b.nama_proyek from budget_perkiraan a left join master_proyek b on a.id_proyek = b.id_proyek where a.tahun = '$tahun'";
		$query=$this->db->query($sql);
		$hasil = $query->result(); // returning rows, not row
		return $hasil[0]->nama_proyek;
	}
	
	function update($data,$kode_perk){
		$this->db->trans_begin();
		$query1 = $this->db->where('kode_perk', $kode_perk);
		$query2 = $this->db->update('budget_perkiraan', $data);
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