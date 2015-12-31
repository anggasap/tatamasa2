<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Kasir_m extends CI_Model {
	public function getAdvAll()
	{
		$sql="select p.id_pp,m.id_advance,m.jml_uang,k.nama_kyw,d.nama_dept from perintah_pembayaran p
				left join master_advance m on p.id_advance = m.id_advance
				left join master_karyawan k on m.id_kyw = k.id_kyw
				left join master_dept d on k.dept_kyw = d.id_dept
				where p.status_kasir = 0 ";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getReqpayAll()
	{
		$sql="SELECT mr.id_reqpay,mk.nama_kyw, mr.jml_uang
			  from master_reqpay mr
			  left join master_karyawan mk on mr.id_kyw = mk.id_kyw
			  where mr.status_akuntansi = 1 and mr.status_kasir = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getReimpayAll()
	{
		$sql="SELECT mr.id_reimpay,mk.nama_kyw, mr.jml_uang
			  from master_reimpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw
			  where mr.status_akuntansi = 1 and mr.status_kasir = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getProyek() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_proyek order by id_proyek asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	function getSettleAll()
	{
		$sql="SELECT ms.id_settle_adv,mk.nama_kyw, ma.jml_uang,ms.jml_uang_paid
			  from master_settle_adv ms
			  left join master_advance ma on ms.id_adv = ma.id_advance
			  left join master_karyawan mk on ms.id_kyw = mk.id_kyw
			  where ms.status_akuntansi = 1 and ms.status_kasir = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getKodeBayar() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from type_bayar order by kode_bayar asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getDescKodeBayar($kdBayar)
	{
		$this->db->select ( 'tb.kode_perk, p.nama_perk' );
		$this->db->from('type_bayar tb');
		$this->db->join('perkiraan p', 'tb.kode_perk=p.kode_perk', 'LEFT');
		$this->db->where ( 'tb.kode_bayar', $kdBayar);
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}


	public function getJurnalKr($idMaster)
	{
		$sql= "select tdp.kode_perk,p.nama_perk,tdp.keterangan,
(select kode_cflow from trans_detail_cflow where id_seq_perk = tdp.id_seq and left(trans_id,2)='AP') as kode_cflow,
tdp.debet,tdp.kredit
from trans_detail_perk tdp
left join perkiraan p on tdp.kode_perk = p.kode_perk
where tdp.master_id='$idMaster' and tdp.kredit > 0
and left(tdp.trans_id,2)='AP'";
		$query = $this->db->query($sql);
		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	public function getJurnalKrSt($idMaster,$jmlPaid)
	{
		$sql= "select tdp.kode_perk,p.nama_perk,tdp.keterangan,
(select kode_cflow from trans_detail_cflow where id_seq_perk = tdp.id_seq and left(trans_id,2)='AP') as kode_cflow,
tdp.debet,tdp.kredit
from trans_detail_perk tdp
left join perkiraan p on tdp.kode_perk = p.kode_perk
where tdp.master_id='$idMaster' and tdp.kredit = '$jmlPaid'
and left(tdp.trans_id,2)='AP'";
		$query = $this->db->query($sql);
		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	public function getJurnalDb($idMaster,$jmlPaid)
	{
		$sql= "select tdp.kode_perk,p.nama_perk,tdp.keterangan,
(select kode_cflow from trans_detail_cflow where id_seq_perk = tdp.id_seq and left(trans_id,2)='AP') as kode_cflow,
tdp.debet,tdp.kredit
from trans_detail_perk tdp
left join perkiraan p on tdp.kode_perk = p.kode_perk
where tdp.master_id='$idMaster' and tdp.debet = '$jmlPaid'
and left(tdp.trans_id,2)='AP'";
		$query = $this->db->query($sql);
		$rows['data_cpa'] = $query->result();
		return $rows;

	}
	public function getDescAdv($idAdv)
	{
		$this->db->select ( 'ma.keterangan,md.id_dept,mk.nama_kyw, md.nama_dept, ma.jml_uang, ma.id_proyek, ma.tgl_trans,
		ma.tgl_jt, ma.pay_to, ma.nama_akun_bank, ma.no_akun_bank, ma.nama_bank, ma.keterangan,
		p.kode_perk, p.nama_perk ' );
		$this->db->from('master_advance ma');
		$this->db->join('master_karyawan mk', 'ma.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->join('master_proyek mp', 'ma.id_proyek=mp.id_proyek', 'LEFT');
		$this->db->join('perintah_pembayaran pp', 'ma.id_advance=pp.id_advance', 'LEFT');
		$this->db->join('type_advance ta', 'pp.type_adv=ta.id_account', 'LEFT');
		$this->db->join('perkiraan p', 'ta.kode_perk=p.kode_perk', 'LEFT');
		//$this->db->join('cpa_cflow ccf', 'ma.id_advance = ccf.id_advance', 'LEFT');
		$this->db->where ( 'ma.id_advance', $idAdv );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}
	function getIdPemb($bulan,$tahun){
		$sql= "select trans_id from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "PA";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(trans_id,4,7)) as id_pemb from trans_detail_perk";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function getNoVoucher($bulan,$tahun){
		$sql= "select voucher_no from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "BK";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(voucher_no,4,7)) as id_pemb from trans_detail_perk";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function insertAdvPerk($data){
		$this->db->trans_begin();
		$model = $this->db->insert('trans_detail_perk', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function insertAdvCflow($data){
		$this->db->trans_begin();
		$model = $this->db->insert('trans_detail_cflow', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updatePP_statusKasir($data_model2,$id_master){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_advance', $id_master);
		$query2 = $this->db->update('perintah_pembayaran', $data_model2);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateReqpay_statusKasir($data_model2,$id_master){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reqpay', $id_master);
		$query2 = $this->db->update('master_reqpay', $data_model2);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateReimpay_statusKasir($data_model2,$id_master){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_reimpay', $id_master);
		$query2 = $this->db->update('master_reimpay', $data_model2);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function updateSettle_statusKasir($data_model2,$id_master){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_settle_adv', $id_master);
		$query2 = $this->db->update('master_settle_adv', $data_model2);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	/*BENDOT*/
	/*function updateJadv($data,$jadvId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_advance', $jadvId);
		$query2 = $this->db->update('perintah_pembayaran', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}*/
	function getDataCetak($idadv)
	{
		$sql = "select ma.id_advance,ma.id_kyw,mk.nama_kyw,mk.dept_kyw,md.nama_dept,ma.tgl_trans,ma.jml_uang,ma.keterangan,
				tb.kode_perk,tb.nama_kdbayar,tb.norek_bank,ma.id_proyek,tdp.voucher_no,tdp.tgl_trans as tgl_voucher,cf.kode_cflow,
				(select a.nama_cflow from master_cashflow a where a.kode_cflow = cf.kode_cflow) as nama_cf from master_advance ma
				inner join master_karyawan mk on ma.id_kyw = mk.id_kyw
				inner join master_dept md on md.id_dept = mk.dept_kyw
				inner join cpa cf on ma.id_advance = cf.id_master
				inner join trans_detail_perk tdp on tdp.master_id = ma.id_advance
				inner join perintah_pembayaran pp on pp.id_advance = ma.id_advance
				inner join type_bayar tb on tb.kode_perk = pp.kode_bayar where tdp.trans_id = '".$idadv."' group by
				ma.id_advance";
		$query = $this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getDataCetakRp($idadv)
	{
		$sql = "select ma.id_reqpay,ma.id_kyw,mk.nama_kyw,mk.dept_kyw,md.nama_dept,ma.tgl_trans,ma.jml_uang,ma.keterangan,
				tb.kode_perk,tb.nama_kdbayar,tb.norek_bank,ma.id_proyek,tdp.voucher_no,tdp.tgl_trans as tgl_voucher,cf.kode_cflow,
				(select a.nama_cflow from master_cashflow a where a.kode_cflow = cf.kode_cflow) as nama_cf from master_reqpay ma
				inner join master_karyawan mk on ma.id_kyw = mk.id_kyw
				inner join master_dept md on md.id_dept = mk.dept_kyw
				inner join cpa cf on ma.id_reqpay = cf.id_master
				inner join trans_detail_perk tdp on tdp.master_id = ma.id_reqpay
				inner join type_bayar tb on tb.kode_perk = tdp.kode_perk where tdp.trans_id = '".$idadv."'
				group by ma.id_reqpay";
		$query = $this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getDataCetakRm($idadv)
	{
		$sql = "select ma.id_reimpay,ma.id_kyw,mk.nama_kyw,mk.dept_kyw,md.nama_dept,ma.tgl_trans,ma.jml_uang,ma.keterangan,
				tb.kode_perk,tb.nama_kdbayar,tb.norek_bank,ma.id_proyek,tdp.voucher_no,tdp.tgl_trans as tgl_voucher,cf.kode_cflow,
				(select a.nama_cflow from master_cashflow a where a.kode_cflow = cf.kode_cflow) as nama_cf from master_reimpay ma
				inner join master_karyawan mk on ma.id_kyw = mk.id_kyw
				inner join master_dept md on md.id_dept = mk.dept_kyw
				inner join cpa cf on ma.id_reimpay = cf.id_master
				inner join trans_detail_perk tdp on tdp.master_id = ma.id_reimpay
				inner join type_bayar tb on tb.kode_perk = tdp.kode_perk where tdp.trans_id = '".$idadv."'
				group by ma.id_reimpay";
		$query = $this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getDetailDataCetak($idadv)
	{
		$sql = "select td.kode_perk,td.keterangan,p.nama_perk,td.debet,td.kredit from trans_detail_perk td
				left join perkiraan p on td.kode_perk = p.kode_perk where td.trans_id = '".$idadv."'";
		$query = $this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */