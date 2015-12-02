<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_reqpay_m extends CI_Model {
	public function get_dept() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_dept order by id_dept asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getReqpayAll()
	{
		$sql="SELECT mr.id_reqpay,mk.nama_kyw, mr.jml_uang from master_reqpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	/* public function getKywAll()
	{
		$sql="SELECT mk.id_kyw,mk.nama_kyw,md.nama_dept from master_karyawan mk left join master_dept md on mk.dept_kyw = md.id_dept";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	} */
	public function getDescReqpay($idReqpay)
	{
		$this->db->select ( 'mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.no_invoice, mr.no_po, mr.jml_uang,mr.id_proyek, mr.id_kurs, mr.nilai_kurs, mr.tgl_trans,
		mr.tgl_jt, mr.pay_to,ms.nama_spl, ms.nama_akun_bank, ms.no_akun_bank, ms.nama_bank, mr.keterangan, mr.dok_fpe, mr.dok_kuitansi, mr.dok_fpa, 
		mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast, mr.dok_bap, mr.dok_cop, mr.dok_ssp, mr.dok_sspk, mr.dok_sbj, 
		mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, 
		mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket, mr.app_user_id, mr.inout_budget' );
		$this->db->from('master_reqpay mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->join('master_supplier ms', 'mr.pay_to=ms.id_spl', 'LEFT');
		$this->db->where ( 'mr.id_reqpay', $idReqpay );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
		
	}
	public function getIdReqpay($bulan,$tahun){
		/*$sql= "select id_reqpay from master_reqpay";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "RP";
		if($jml == 0){
			$id_reqpay = "000001";
			return $id_reqpay;
		}else{
			$sql= "select max(right(id_reqpay,6)) as id_reqpay from master_reqpay";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_reqpay =  $hasil[0]->id_reqpay;
			$id_reqpay = sprintf('%06u',$id_reqpay+1);
			return $id_reqpay;
		}*/
		$sql= "select id_reqpay from master_reqpay where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "RP";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(id_reqpay,4,7)) as id_rp from master_reqpay";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_rp;
			$id_adv = sprintf('%07u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
	public function insertReqpay($data){
		
		$this->db->trans_begin();
		$model = $this->db->insert('master_reqpay', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	
	}
	function updateReqpay($data,$idReqpay){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reqpay', $idReqpay);
		$query2 = $this->db->update('master_reqpay', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function deleteReqpay($idReqpay){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_reqpay',$idReqpay);
		$query2	=   $this->db->delete('master_reqpay');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function getPayTo($idKyw){
		$this->db->select('nama_kyw');
		$this->db->from('master_karyawan');
		$this->db->where('id_kyw',$idKyw);
		$query = $this->db->get();
		return $query->result();
	}
	public function getCDescCpa($idReqpay)
	{
		/*$this->db->select ( 'id_cpa,id_master,kode_perk,kode_cflow,keterangan,jumlah' );
		$this->db->from('cpa');
		$this->db->where ( 'id_master', $idReqpay );*/
		$sql= "select * from cpa_perk where id_master = '$idReqpay' union select * from cpa_cflow where id_master = '$idReqpay' ";
		$query = $this->db->query($sql);
		return $query->num_rows();
	}
    
    public function getDescCpa($idReqpay)
	{
		/*$this->db->select ( 'id_cpa,id_master,kode_perk,kode_cflow,keterangan,jumlah' );
		$this->db->from('cpa');
		$this->db->where ( 'id_master', $idReqpay );
		$query = $this->db->get ();*/
		$sql= "select kode_perk as kode,1 as jns_kode, keterangan,jumlah from cpa_perk where id_master = '$idReqpay' union select kode_cflow as kode,2 as jns_kode, keterangan,jumlah  from cpa_cflow where id_master = '$idReqpay' ";
		$query = $this->db->query($sql);
        $rows['data_cpa'] = $query->result();
		return $rows;
        	
	}
    function deleteCpa($idReqpay){
		$this->db->trans_start();
		$this->db->query("delete from cpa_perk where id_master ='$idReqpay'");
		$this->db->query("delete from cpa_cflow where id_master ='$idReqpay'");
		$this->db->trans_complete();
		/*$this->db->trans_begin();
		$query1	=	$this->db->where('id_master',$idReqpay);
		$query2	=   $this->db->delete('cpa');
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}*/
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
	function cetak_cpa($idReqPay){
		$sql="select a.*,b.nama_proyek,c.nama_kyw,d.nama_dept, 
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_keuangan_id) as financeName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_hd_id) as hdName,
			(select e.nama_kyw from master_karyawan e where e.id_kyw = a.app_gm_id) as gmName,
			(select e.nama_spl from master_supplier e where e.id_spl = a.pay_to) as payTo,
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
			from master_reqpay a 
			left join master_proyek b on a.id_proyek = b.id_proyek
			left join master_karyawan c on a.id_kyw = c.id_kyw
			left join master_dept d on c.dept_kyw = d.id_dept
			where a.id_reqpay = '".$idReqPay."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function cetak_cpa_detail($idReqPay){
		$sql="select a.*, b.*, c.terpakai,c.saldo,(c.jan+c.feb+c.mar+c.apr+c.mei+c.jun+c.jul+c.agu+c.sep+c.okt+c.nov+c.des) as anggaran 
				from cpa_cflow a left join master_cashflow b on a.kode_cflow = b.kode_cflow
				left join budget_cflow c on a.kode_cflow = c.kode_cflow where a.id_master = '".$idReqPay."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */