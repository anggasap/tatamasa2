<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Booking_jual_m extends CI_Model {
	public function getDescRumah($idRumah)
	{
		$this->db->select ( 'r.*,p.nama_proyek' );
		$this->db->from('master_rumah r');
		$this->db->join('master_proyek p', 'r.id_proyek=p.id_proyek', 'LEFT');
		$this->db->where ( 'r.id_rumah', $idRumah );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	function getAngsInfo($idPenj)
	{
		//$sql ="select * from trans_jual tj where tj.master_id = 'BG-0000001-0216' and tj.kode_trans = '200'";
		$this->db->select('r.*');
		$this->db->from('trans_jual r');
		$this->db->where ( 'r.master_id', $idPenj );
		$this->db->where ( 'r.kode_trans', 200);
		$query = $this->db->get();
		return $query->result ();		
	}
	public function getCostumer($idcust)
	{
		$this->db->select('r.*');
		$this->db->from('master_customer r');
		$this->db->where ( 'r.id_cust', $idcust );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}

	}
	public function getDescRumahBooked($idRumah)
	{
		$this->db->select ( 'r.*,c.*, p.nama_proyek,mj.master_id,mj.no_spr,mj.tipe_bayar,mj.dp,mj.jkw_kpr,mj.kesepakatan, mj.tgl_trans,mj.booking,mj.harga_jadi,mj.diskon,mj.harga as hargamj,mj.dp,mj.sisa_dp' );
		$this->db->from('master_rumah r');
		$this->db->join('master_proyek p', 'r.id_proyek=p.id_proyek', 'LEFT');
		$this->db->join('master_jual mj', 'r.id_rumah=mj.id_rumah', 'LEFT');
		$this->db->join('master_customer c', 'mj.id_cust=c.id_cust', 'LEFT');
		$this->db->where ( 'r.id_rumah', $idRumah );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}

	public function getRumahAll()
	{
		$sql="SELECT r.*,p.nama_proyek from master_rumah r left join master_proyek p on r.id_proyek = p.id_proyek where status_jual = 0 or status_jual = 1 order by r.harga desc";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getPenjAll()
	{
		$sql="select mj.master_id,mr.id_rumah,mc.id_cust,mj.tgl_trans,mj.harga,mj.booking,mj.status_jual,mj.keterangan,mc.nama_cust,
			  mr.nama_rumah,mp.nama_proyek from master_jual mj left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah left join master_proyek mp on mr.id_proyek = mp.id_proyek
			  where mj.status_jual = '1'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
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
	function getNoSPR($bulan,$tahun){
		$sql= "select master_id from master_jual where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "Sales";//bg
		$th = substr($tahun,-2);
		if($bulan == 1){
			$romawi = 'I';
		}else if($bulan == 2){
			$romawi = 'II';
		}else if($bulan == 3){
			$romawi = 'III';
		}else if($bulan == 4){
			$romawi = 'IV';
		}else if($bulan == 5){
			$romawi = 'V';
		}else if($bulan == 6){
			$romawi = 'VI';
		}else if($bulan == 7){
			$romawi = 'VII';
		}else if($bulan == 8){
			$romawi = 'VIII';
		}else if($bulan == 9){
			$romawi = 'IX';
		}else if($bulan == 10){
			$romawi = 'X';
		}else if($bulan == 11){
			$romawi = 'XI';
		}else if($bulan == 12){
			$romawi = 'XII';
		}
		if($jml == 0){
			$id_adv = "001";
			return $kode."-".$id_adv."-".$romawi.'-'.$th;
		}else{
			$sql= "select max(substring(no_spr,7,3)) as id_adv from master_jual";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_adv;
			$id_adv = sprintf('%03u',$id_adv+1);
			return $kode."-".$id_adv."-".$romawi.'-'.$th;
		}
	}

	function getDataCetak($kodeBooking){
		$sql="select mj.master_id,mj.tgl_trans,mj.harga,mj.booking,mj.status_jual,mc.nama_cust,
			  mr.nama_rumah,mp.nama_proyek,mc.id_cust,mr.id_rumah,mc.no_id,mc.alamat,mc.no_hp,mc.no_telp,mc.alamat,
			  mc.email,mc.no_npwp,mc.no_va,mc.nama_va,mc.bank_va
			  from master_jual mj
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_proyek mp on mr.id_proyek = mp.id_proyek where mj.status_jual = '1' and mj.master_id = '".$kodeBooking."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	function ubahMasterJual($data,$idPenj){
		$this->db->trans_begin();
		$query1 = $this->db->where('master_id', $idPenj);
		$query2 = $this->db->update('master_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
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
	public function simpan_trans($data){

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