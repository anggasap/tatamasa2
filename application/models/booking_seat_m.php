<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Booking_seat_m extends CI_Model {
	public function getBookingAll()
	{
		$sql="select mj.master_id,mj.tgl_trans,mj.harga,mj.booking,mj.status_jual,mj.keterangan,mc.nama_cust,
			  mr.nama_rumah,mp.nama_proyek from master_jual mj left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where mj.status_jual = '1'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getRumahAll($proyek)
	{
		$sql="SELECT r.id_rumah,r.id_proyek,r.nama_rumah,r.tipe,r.blok,r.luas,r.harga,p.nama_proyek,r.status_jual from master_rumah r
			  left join master_proyek p on r.id_proyek = p.id_proyek
			  where r.id_proyek = '$proyek' order by r.id_rumah asc";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getDescBooking($kodeBooking){
		$sql="select mj.master_id,mj.tgl_trans,mj.harga,mj.booking,mj.status_jual,tj.kode_transaksi,tj.keterangan,mc.nama_cust,
			  mr.nama_rumah,mp.nama_proyek,mc.id_cust,mr.id_rumah,mc.no_id,mc.alamat,mc.no_hp,mc.no_telp
			  from master_jual mj left join trans_jual tj on mj.master_id = tj.master_id
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek where mj.status_jual = '1' and mj.master_id = '".$kodeBooking."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getDataCetak($kodeBooking){
		$sql="select mj.master_id,mj.tgl_trans,mj.harga,mj.booking,mj.status_jual,tj.keterangan,mc.nama_cust,
			  mr.nama_rumah,mp.nama_proyek,mc.id_cust,mr.id_rumah,mc.no_id,mc.alamat,mc.no_hp,mc.no_telp,mc.alamat,
			  mc.email,mc.no_npwp,mc.no_va,mc.nama_va,mc.bank_va
			  from master_jual mj left join trans_jual tj on mj.master_id = tj.master_id
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek where mj.status_jual = '1' and mj.master_id = '".$kodeBooking."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function getKodeInvoice($bulan,$tahun){
		$sql= "select invoice from trans_jual where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "INV";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(invoice,4,4)) as id_inv from trans_jual";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_inv;
			$id_adv = sprintf('%04u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
	function getKodeTrans(){
		$sql= "select kode_transaksi from trans_jual";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "TR";
		if($jml == 0){
			$id_adv = "0001";
			return $kode."-".$id_adv;
		}else{
			$sql= "select max(substring(kode_transaksi,4,4)) as id_tr from trans_jual";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_tr;
			$id_adv = sprintf('%04u',$id_adv+1);
			return $kode."-".$id_adv;
		}
	}
	function getBulan($bln){
		switch ($bln){
			case 1: return "I"; break;
			case 2: return "II"; break;
			case 3: return "III"; break;
			case 4: return "IV"; break;
			case 5: return "V"; break;
			case 6: return "VI"; break;
			case 7: return "VII"; break;
			case 8: return "VIII"; break;
			case 9: return "IX"; break;
			case 10: return "X"; break;
			case 11: return "XI"; break;
			case 12: return "XII"; break;
		}
	}
	function getIdPenj($bulan,$tahun){
		$sql= "select master_id from master_jual where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "BG";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(master_id,4,7)) as id_adv from master_jual";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_adv;
			$id_adv = sprintf('%07u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
	function ubahRumah($data,$idRumah){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_rumah', $idRumah);
		$query2 = $this->db->update('master_rumah', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function simpan_masterJual($data){

		$this->db->trans_begin();
		$model = $this->db->insert('master_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}

	}
	public function simpan_transJual($data){

		$this->db->trans_begin();
		$model = $this->db->insert('trans_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}

	}

	function getIdJrAR($bulan,$tahun){
		$sql= "select trans_id from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2 and left(trans_id,2)='AR'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "AR";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(trans_id,4,7)) as id_pemb from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='AR'";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function getNoVoucher($bulan,$tahun){
		$sql= "select voucher_no from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='BR'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "BR";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(voucher_no,4,7)) as id_pemb from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='BR'";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function getIdTDPerk($modelidAP,$tglTrans,$id_master,$idProyek,$tmpKodePerk,$tmpDb,$tmpKr){
		$sql= "select id_seq from trans_detail_perk where trans_id ='$modelidAP' and tgl_trans = '$tglTrans'
				and master_id = '$id_master' and  id_proyek ='$idProyek'
				and kode_perk = '$tmpKodePerk' and debet = '$tmpDb' and kredit = '$tmpKr'";
		$query = $this->db->query($sql);
		$hasil = $query->result();
		return $hasil[0]->id_seq;
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
	function updateTransJual($data,$Id){
		$this->db->trans_begin();
		$query1 = $this->db->where('kode_transaksi', $Id);
		$query2 = $this->db->update('trans_jual', $data);
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