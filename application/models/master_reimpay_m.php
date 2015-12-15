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
		$this->db->select('mr.id_kyw, mk.nama_kyw,md.id_dept, md.nama_dept, mr.no_invoice, mr.jml_uang, mr.id_proyek, mr.id_kurs, mr.nilai_kurs, mr.tgl_trans,, mr.tgl_jt, mr.pay_to, mr.nama_akun_bank, mr.no_akun_bank,
		mr.nama_bank, mr.keterangan, mr.dok_fpe, mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast, 
		mr.dok_pc, mr.dok_lpkk, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, 
		mr.app_keuangan_tgl, mr.app_hd_tgl, mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket, mr.app_user_id, mr.inout_budget,
		(select e.nama_kyw from master_karyawan e where e.id_kyw = mr.pay_to) as pay');
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
		$this->db->select ( 'id_cpa,id_master,kode_perk,kode_cflow,keterangan,jumlah' );
		$this->db->from('cpa');
		$this->db->where ( 'id_master', $idReimpay );
//
		$query = $this->db->get ();
		return $query->num_rows();
	}
	public function getDescCpa($idReimpay)
	{
		$this->db->select ( 'id_cpa,id_master,kode_perk,kode_cflow,keterangan,jumlah' );
		$this->db->from('cpa');
		$this->db->where ( 'id_master', $idReimpay );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();

		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	function deleteCpa($idReimpay){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_master',$idReimpay);
		$query2	=   $this->db->delete('cpa');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function insertCpa($data){
		$this->db->trans_begin();
		$model = $this->db->insert('cpa', $data);
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
	function cetak_cpa($idAdv){
		$sql="select a.*,b.nama_proyek,c.nama_kyw,d.nama_dept,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.pay_to) as pay,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_keuangan_id) as financeName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_hd_id) as hdName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_gm_id) as gmName,
			(
			CASE 
			 WHEN app_keuangan_status = '1' THEN 'Approve'
			 WHEN app_keuangan_status = '2' THEN 'Reject'
			 WHEN app_keuangan_status = '3' THEN 'Paid'
			END) AS statusKeuangan,
			(
			CASE 
			 WHEN app_hd_status = '1' THEN 'Approve'
			 WHEN app_hd_status = '2' THEN 'Reject'
			 WHEN app_hd_status = '3' THEN 'Paid'
			END) AS statusHd,
			(
			CASE 
			 WHEN app_gm_status = '1' THEN 'Approve'
			 WHEN app_gm_status = '2' THEN 'Reject'
			 WHEN app_gm_status = '3' THEN 'Paid'
			END) AS statusGm 
			from master_reimpay a 
			left join master_proyek b on a.id_proyek = b.id_proyek
			left join master_karyawan c on a.id_kyw = c.id_kyw
			left join master_dept d on c.dept_kyw = d.id_dept
			where a.id_reimpay = '".$idAdv."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	/*function getCflowTerpakai(){
		$sql ="select ";
	}*/
	function cetak_cpa_detail($idAdv){
		$sql=" select a.*, b.*, c.terpakai,c.saldo,(c.jan+c.feb+c.mar+c.apr+c.mei+c.jun+c.jul+c.agu+c.sep+c.okt+c.nov+c.des) as anggaran 
				from cpa_cflow a left join master_cashflow b on a.kode_cflow = b.kode_cflow
				left join budget_cflow c on a.kode_cflow = c.kode_cflow where a.id_master = '".$idAdv."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */