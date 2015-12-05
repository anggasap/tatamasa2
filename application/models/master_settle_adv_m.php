<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_settle_adv_m extends CI_Model {
	function get_dept() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_dept order by id_dept asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	function getSettleAll()
	{
		$sql="SELECT ms.id_settle_adv,mk.nama_kyw, ms.jml_uang_paid from master_settle_adv ms left join master_karyawan mk on ms.id_kyw = mk.id_kyw";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getDescSettle($idSettle)
	{
		$this->db->select('mp.nama_proyek,mp.id_proyek, ma.tgl_trans,ma.jml_uang, mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.id_adv,ma.jml_uang,mr.jml_uang_paid,mr.jml_uang_oupaid,
		mr.tgl_jt, mr.pay_to, mr.nama_akun_bank, mr.no_akun_bank, mr.nama_bank, mr.keterangan,ma.keterangan as ketadv, mr.dok_fpe, 
		mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg, mr.dok_bast, 
		mr.dok_bap, mr.dok_ssp, mr.dok_sspk, mr.dok_lpjum, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, 
		mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, 
		mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket, mr.app_user_id, mr.inout_budget' );
		$this->db->from('master_settle_adv mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->join('master_advance ma', 'ma.id_advance = mr.id_adv', 'LEFT');
		$this->db->join('master_proyek mp', 'ma.id_proyek = mp.id_proyek', 'LEFT');
		$this->db->where('mr.id_settle_adv', $idSettle );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}
	function getPayTo($idKyw){
		$this->db->select('nama_kyw');
		$this->db->from('master_karyawan');
		$this->db->where('id_kyw',$idKyw);
		$query = $this->db->get()->row()->nama_kyw;
		return $query;
	}
    public function getCDescCpa($idAdv)
	{
		/*$this->db->select('id_cpa,id_master,kode_perk,kode_cflow,keterangan,jumlah');
		$this->db->from('cpa');
		$this->db->where('id_master',$idAdv);
		$query = $this->db->get();*/
		$sql= "select * from cpa_perk where id_master = '$idAdv' union select * from cpa_cflow where id_master = '$idAdv' ";
		$query = $this->db->query($sql);
		return $query->num_rows();	
	}    
    public function getDescCpa($idAdv)
	{
		$sql= "select kode_perk as kode,1 as jns_kode, keterangan,jumlah from cpa_perk where id_master = '$idAdv' 
				union select kode_cflow as kode,2 as jns_kode, keterangan,jumlah  from cpa_cflow where id_master = '$idAdv' ";
		$query = $this->db->query($sql);
        $rows['data_cpa'] = $query->result();
		return $rows;
        	
	}
    function deleteCpa($IdAdv){
		$this->db->trans_start();
		$this->db->query("delete from cpa_perk where id_master ='$IdAdv'");
		$this->db->query("delete from cpa_cflow where id_master ='$IdAdv'");
		$this->db->trans_complete();
		/*$this->db->trans_begin();
		$query1	=	$this->db->where('id_master',$IdAdv);
		$query2	=   $this->db->delete('cpa_perk');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}*/
	}
	function getIdSettle($bulan,$tahun){
		$sql= "select id_settle_adv from master_settle_adv where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
        $kode = "ST";
        $th = substr($tahun,-2);
		if($jml == 0){
			$id_settle = "0000001";
			return $kode."-".$id_settle."-".$bulan.$th;
		}else{
			$sql= "select max(substring(id_settle_adv,4,7)) as id_settle from master_settle_adv";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_settle =  $hasil[0]->id_settle;
			$id_settle = sprintf('%07u',$id_settle+1);
			return $kode."-".$id_settle."-".$bulan.$th;
		}
	}
	function insertSettle($data){	
		$this->db->trans_begin();
		$model = $this->db->insert('master_settle_adv', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
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
	function updateSettle($data,$settleId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_settle_adv', $settleId);
		$query2 = $this->db->update('master_settle_adv', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function deleteSettle($settleId){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_settle_adv',$settleId);
		$query2	=   $this->db->delete('master_settle_adv');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
    function cetak_cpa($idSettle){
		$sql="select a.*,b.nama_proyek,c.nama_kyw,d.nama_dept, ma.jml_uang,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.pay_to) as pay,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_keuangan_id) as financeName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_hd_id) as hdName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_gm_id) as gmName,
			(
			CASE 
			 WHEN a.app_keuangan_status = '1' THEN 'Approve'
			 WHEN a.app_keuangan_status = '2' THEN 'Reject'
			 WHEN a.app_keuangan_status = '3' THEN 'Paid'
			END) AS statusKeuangan,
			(
			CASE 
			 WHEN a.app_hd_status = '1' THEN 'Approve'
			 WHEN a.app_hd_status = '2' THEN 'Reject'
			 WHEN a.app_hd_status = '3' THEN 'Paid'
			END) AS statusHd,
			(
			CASE 
			 WHEN a.app_gm_status = '1' THEN 'Approve'
			 WHEN a.app_gm_status = '2' THEN 'Reject'
			 WHEN a.app_gm_status = '3' THEN 'Paid'
			END) AS statusGm 
			from master_settle_adv a
			left join master_advance ma on a.id_adv = ma.id_advance 
			left join master_proyek b on ma.id_proyek = b.id_proyek
			left join master_karyawan c on ma.id_kyw = c.id_kyw
			left join master_dept d on c.dept_kyw = d.id_dept
			where a.id_settle_adv = '".$idSettle."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function cetak_cpa_detail($idSettle){
		$sql="select a.*, b.*, c.terpakai,c.saldo,(c.jan+c.feb+c.mar+c.apr+c.mei+c.jun+c.jul+c.agu+c.sep+c.okt+c.nov+c.des) as anggaran 
				from cpa_cflow a left join master_cashflow b on a.kode_cflow = b.kode_cflow
				left join budget_cflow c on a.kode_cflow = c.kode_cflow where a.id_master = '".$idSettle."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
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
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */