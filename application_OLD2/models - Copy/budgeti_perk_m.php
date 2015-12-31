<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Budgeti_perk_m extends CI_Model {
	function getTahun() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select distinct(tahun) as tahun from budget_perkiraan order by tahun asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
    function getProyek() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_proyek order by id_proyek asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
    function getNamaProyek($proyek){
        $sql ="select nama_proyek from master_proyek where id_proyek='$proyek'";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function getNamaProyek2($proyek)
	{
		$sql ="select nama_proyek from master_proyek where id_proyek='$proyek'";
        $query = $this->db->query($sql);
		$hasil = $query->result(); // returning rows, not row
		return $hasil[0]->nama_proyek;
	}
	public function getBudgetPerk($tahun,$proyek)
	{
		$sql="SELECT b.*,p.nama_perk,p.type,p.level,jan + feb + mar + apr + mei + jun + jul + agu + sep + okt + nov + des  as total_right from budget_perkiraan b 
		left join perkiraan p on b.kode_perk = p.kode_perk where b.tahun = '$tahun' and b.id_proyek='$proyek'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getTotalPerk($tahun,$proyek)
	{
		$sql="select sum(jan) as jan,sum(feb) as feb,sum(mar) as mar,sum(apr) as apr,sum(mei) as mei,sum(jun) as jun,
				sum(jul) as jul,sum(agu) as agu,sum(sep) as sep,sum(okt) as okt,sum(nov) as nov,sum(des) as des,
				sum(jan+feb+mar+apr+mei+jun+jul+agu+sep+okt+nov+des) as total	
				from budget_perkiraan b where b.tahun = '$tahun' and b.id_proyek='$proyek'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function update($data,$total,$kode_perk,$proyek,$tahun){
		$this->db->trans_begin();
		//$query1 = $this->db->where('kode_perk', $kode_perk);
//		$query2 = $this->db->update('budget_perkiraan', $data);
        /*$sql1 = "select (jan+feb+mar+apr+mei+jun+jul+agu+sep+okt+nov+des) as saldo_sbl from budget_perkiraan where kode_perk = '$kode_perk' and id_proyek = '$proyek'";
        $query = $this->db->query($sql1);
        $row = $query->result();
        $saldo_sbl = $row[0]->saldo_sbl;*/
        $sql2  = "update budget_perkiraan set jan = '$data[jan]', feb = '$data[feb]', mar = $data[mar], apr = $data[apr], 
        mei = '$data[mei]', jun = '$data[jun]', jul = '$data[jul]', agu = '$data[agu]', sep = '$data[sep]', okt = '$data[okt]',
        nov = '$data[nov]', des = '$data[des]', saldo= ('$total' - terpakai) where kode_perk = '$kode_perk' and id_proyek = '$proyek' and tahun = '$tahun'";
        $query = $this->db->query($sql2);
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