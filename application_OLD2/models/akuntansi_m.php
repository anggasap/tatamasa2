<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Akuntansi_m extends CI_Model {
	public function getReqpayAll()
	{
		$sql="SELECT mr.id_reqpay,mk.nama_kyw, mr.jml_uang
			  from master_reqpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw
			  where mr.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getReimpayAll()
	{
		$sql="SELECT mr.id_reimpay,mk.nama_kyw, mr.jml_uang
			  from master_reimpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw
			  where mr.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getSettleAll()
	{
		$sql="SELECT ms.id_settle_adv,mk.nama_kyw, ma.jml_uang,ms.jml_uang_paid
			  from master_settle_adv ms
			  left join master_advance ma on ms.id_adv = ma.id_advance
			  left join master_karyawan mk on ms.id_kyw = mk.id_kyw
			  where ms.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getIdAP($bulan,$tahun){
		$sql= "select trans_id from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "AP";
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
	function getIdTDPerk($modelidAP,$tglTrans,$id_master,$idProyek,$idDept,$tmpKodePerk,$tmpDb,$tmpKr){
		$sql= "select id_seq from trans_detail_perk where trans_id ='$modelidAP' and tgl_trans = '$tglTrans'
				and master_id = '$id_master' and  id_proyek ='$idProyek' and id_dept = '$idDept'
				and kode_perk = '$tmpKodePerk' and debet = '$tmpDb' and kredit = '$tmpKr'";
		$query = $this->db->query($sql);
		$hasil = $query->result();
		return $hasil[0]->id_seq;
	}
	
	function insertTDPerk($data){
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
	function insertTDCflow($data){
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
	function updateReqpay_statusAkuntansi($data_model2,$id_master){
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
	function updateReimpay_statusAkuntansi($data_model2,$id_master){
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
	function updateSettle_statusAkuntansi($data_model2,$id_master){
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
	/*Fungsi Cetak*/
	function getAp($idPP){
		$sql = "select t.trans_id,t.tgl_trans,mr.no_invoice,mr.tgl_jt,mr.id_reqpay,mr.tgl_trans as tgl_ap,
				mk.nama_kyw,ms.nama_spl,mp.nama_proyek from trans_detail_perk t
				left join master_reqpay mr on t.master_id = mr.id_reqpay
				left join master_karyawan mk on mr.id_kyw = mk.id_kyw
				left join master_supplier ms on mr.pay_to = ms.id_spl
				left join master_proyek mp on mr.id_proyek = mp.id_proyek where t.trans_id = '".$idPP."' group by t.trans_id ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getApRp($idPP){
		$sql = "select t.trans_id,t.tgl_trans,mr.no_invoice,mr.tgl_jt,mr.id_reimpay,mr.tgl_trans as tgl_ap,
				mk.nama_kyw,(select mmk.nama_kyw from master_karyawan mmk where mmk.id_kyw = mr.pay_to) as nama_spl,
				mp.nama_proyek from trans_detail_perk t
				left join master_reimpay mr on t.master_id = mr.id_reimpay
				left join master_karyawan mk on mr.id_kyw = mk.id_kyw
				left join master_supplier ms on mr.pay_to = ms.id_spl
				left join master_proyek mp on mr.id_proyek = mp.id_proyek where t.trans_id = '".$idPP."' group by t.trans_id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getApSt($idPP){
		$sql = "select t.trans_id,t.tgl_trans,mr.no_invoice,mr.tgl_jt,mr.id_settle_adv,mr.tgl_trans as tgl_ap,
				mk.nama_kyw,(select mmk.nama_kyw from master_karyawan mmk where mmk.id_kyw = mr.pay_to) as nama_spl,
				mp.nama_proyek from trans_detail_perk t
				left join master_settle_adv ms on t.master_id = ms.id_settle_adv
				left join master_karyawan mk on mr.id_kyw = mk.id_kyw
				left join master_proyek mp on mr.id_proyek = mp.id_proyek where t.trans_id = '".$idPP."'
				group by t.trans_id";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getDetailAp($idPP){
		$sql = "select t.kode_perk,td.kode_cflow,t.debet,t.kredit,p.nama_perk from trans_detail_perk t
				left join trans_detail_cflow td on t.id_seq = td.id_seq_perk
				left join perkiraan p on t.kode_perk = p.kode_perk
				where t.trans_id = '".$idPP."'";
		$query = $this->db->query($sql);
		return $query->result();
	}
	/*End Fungsi cetak*/
	//update saldo
	function getPerkTerpakai15($tahun,$idProyek,$kode_perk){
		$sql = "SELECT SUM(trans_detail_perk.debet) - SUM(trans_detail_perk.kredit) AS jumlah_psv
				FROM trans_detail_perk WHERE tgl_trans <= '".$tahun."' AND id_proyek = '".$idProyek."' AND kode_perk = '".$kode_perk."'";
		$query = $this->db->query($sql)->row()->jumlah_psv;
		return $query;	
	}
	function getPerkTerpakai234($tahun,$idProyek,$kode_perk){
		$sql = "SELECT SUM(trans_detail_perk.kredit) - SUM(trans_detail_perk.debet) AS jumlah_psv
				FROM trans_detail_perk WHERE tgl_trans <= '".$tahun."' AND id_proyek = '".$idProyek."' AND kode_perk = '".$kode_perk."'";
		$query = $this->db->query($sql)->row()->jumlah_psv;
		return $query;	
	}
	function updateBudgetPerk($terpakai,$tahun,$idProyek,$kode_perk){
		$sql = "update budget_perkiraan bp set bp.terpakai = '".$terpakai."' where bp.tahun = '".$tahun."' and bp.kode_perk = '".$kode_perk."' and bp.id_proyek = '".$idProyek."'";
		$query = $this->db->query($sql);
		return $query;	
	}
	
	function getCflowTerpakai15($tahun,$idProyek,$kode_cflow){
		$sql = "SELECT SUM(trans_detail_cflow.debet) - SUM(trans_detail_cflow.kredit) AS jumlah_psv
				FROM trans_detail_cflow WHERE tgl_trans <= '".$tahun."' AND id_proyek = '".$idProyek."' AND kode_cflow = '".$kode_cflow."'";
		$query = $this->db->query($sql)->row()->jumlah_psv;
		return $query;	
	}
	function getCflowTerpakai234($tahun,$idProyek,$kode_cflow){
		$sql = "SELECT SUM(trans_detail_cflow.kredit) - SUM(trans_detail_cflow.debet) AS jumlah_psv
				FROM trans_detail_cflow WHERE tgl_trans <= '".$tahun."' AND id_proyek = '".$idProyek."' AND kode_cflow = '".$kode_cflow."'";
		$query = $this->db->query($sql)->row()->jumlah_psv;
		return $query;	
	}
	function updateBudgetCflow($terpakai,$tahun,$idProyek,$kode_cflow){
		$sql = "update budget_cflow bp set bp.terpakai = '".$terpakai."' where bp.tahun = '".$tahun."' and bp.kode_cflow = '".$kode_cflow."' and bp.id_proyek = '".$idProyek."'";
		$query = $this->db->query($sql);
	}
	//end update saldo
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */