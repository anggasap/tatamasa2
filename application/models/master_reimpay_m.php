<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_reimpay_m extends CI_Model {
	public function get_dept() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_dept order by id_dept asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getReimpayAll()
	{
		$sql="SELECT mr.id_reimpay,mk.nama_kyw, mr.jml_uang from master_reimpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getDescReimpay($idReimpay)
	{
		$this->db->select('mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.no_invoice, mr.jml_uang, mr.id_proyek, mr.id_kurs, mr.nilai_kurs, mr.tgl_trans,, mr.tgl_jt, mr.pay_to, mr.nama_akun_bank, mr.no_akun_bank,
		mr.nama_bank, mr.keterangan, mr.dok_fpe, mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast, 
		mr.dok_pc, mr.dok_lpkk, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, 
		mr.app_keuangan_tgl, mr.app_hd_tgl, mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket, mr.app_user_id, mr.inout_budget' );
		$this->db->from('master_reimpay mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->where('mr.id_reimpay',$idReimpay);
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
		
	}
	function getIdReimpay($bulan,$tahun){
		$sql= "select id_reimpay from master_reimpay where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "RM";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(id_reimpay,4,7)) as id_rm from master_reimpay";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_rm;
			$id_adv = sprintf('%07u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
	public function insertReimpay($data){
		$this->db->trans_begin();
		$model = $this->db->insert('master_reimpay', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateReimpay($data,$idReimpay){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reimpay', $idReimpay);
		$query2 = $this->db->update('master_reimpay', $data);
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	function deleteReimpay($idReimpay){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_reimpay',$idReimpay);
		$query2	=   $this->db->delete('master_reimpay');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getCDescCpa($idReimpay)
	{
		$sql= "select * from cpa_perk where id_master = '$idReimpay' union select * from cpa_cflow where id_master = '$idReimpay' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
	public function getDescCpa($idReimpay)
	{
		$sql= "select kode_perk as kode,1 as jns_kode, keterangan,jumlah from cpa_perk where id_master = '$idReimpay' union select kode_cflow as kode,2 as jns_kode, keterangan,jumlah  from cpa_cflow where id_master = '$idReimpay' ";
		$query = $this->db->query($sql);
		$rows['data_cpa'] = $query->result();
		return $rows;

	}
    function deleteCpa($idReimpay){
		$this->db->trans_start();
		$this->db->query("delete from cpa_perk where id_master ='$idReimpay'");
		$this->db->query("delete from cpa_cflow where id_master ='$idReimpay'");
		$this->db->trans_complete();
	}
	function insertCpaP($data){
		$this->db->trans_begin();
		$model = $this->db->insert('cpa_perk', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function insertCpaC($data){
		$this->db->trans_begin();
		$model = $this->db->insert('cpa_cflow', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateBudgetCflowTerpakai($tmpKodeCflow,$tahun,$idProyek,$data){
		$this->db->trans_begin();
		$query1 = $this->db->where('kode_cflow', $tmpKodeCflow);
		$query2 = $this->db->where('tahun', $tahun);
		$query3 = $this->db->where('id_proyek', $idProyek);
		$query4 = $this->db->update('budget_cflow', $data);

		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateBudgetCflowSaldo($tmpKodeCflow,$tahun,$idProyek){
		$sql2  = "update budget_cflow set saldo= (saldo  - terpakai) where kode_cflow = '$tmpKodeCflow' and id_proyek = '$idProyek' and tahun = '$tahun'";
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
	function updateBudgetKdPerkTerpakai($tmpKodePerk,$tahun,$idProyek,$data){
		$this->db->trans_begin();
		$query1 = $this->db->where('kode_perk', $tmpKodePerk);
		$query2 = $this->db->where('tahun', $tahun);
		$query3 = $this->db->where('id_proyek', $idProyek);
		$query4 = $this->db->update('budget_perkiraan', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateBudgetKdPerkSaldo($tmpKodePerk,$tahun,$idProyek){
		$sql2  = "update budget_perkiraan set saldo= (saldo  - terpakai) where kode_perk = '$tmpKodePerk' and id_proyek = '$idProyek' and tahun = '$tahun'";
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
	function get_terpakai_perk($tmpKodePerk){
		$sql="select terpakai from budget_perkiraan where kode_perk = '".$tmpKodePerk."'";
		$query = $this->db->query($sql);
		if($query->num_rows()== '1'){
			$g = $query->row()->terpakai;
			return $g;
		}else{
			return false;
		}
	}
	function get_terpakai_cflow($tmpKodeCflow){
		$sql="select terpakai from budget_cflow where kode_cflow = '".$tmpKodeCflow."'";
		$query = $this->db->query($sql);
		if($query->num_rows()== '1'){
			$g = $query->row()->terpakai;
			return $g;
		}else{
			return false;
		}
	}
	function get_saldo_cflow($tmpKodeCflow){
		$sql="select saldo from budget_cflow where kode_cflow = '".$tmpKodeCflow."'";
		$query = $this->db->query($sql);
		if($query->num_rows()== '1'){
			$g = $query->row()->saldo;
			return $g;
		}else{
			return false;
		}
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */