<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Jurnal_adv_m extends CI_Model {
	public function get_dept() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_dept order by id_dept asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getJnsAdvanceAll() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from type_advance order by id_account asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getKaryawanAll() {
		$rows 		=	array(); //will hold all results
		$sql		=	"select * from master_karyawan order by id_kyw asc ";
		$query		=	$this->db->query($sql);
		foreach($query->result_array() as $row){
			$rows[] = $row; //add the fetched result to the result array;
		}
		return $rows; // returning rows, not row
	}
	public function getAdvAll()
	{
		$sql="SELECT ma.id_advance,mk.nama_kyw, ma.jml_uang from master_advance ma left join master_karyawan mk on ma.id_kyw = mk.id_kyw";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getPempAll()
	{
		$sql="select p.id_pp,m.id_advance,m.jml_uang,k.nama_kyw,d.nama_dept from perintah_pembayaran p 
				left join master_advance m on p.id_advance = m.id_advance
				left join master_karyawan k on m.id_kyw = k.id_kyw
				left join master_dept d on k.dept_kyw = d.id_dept";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getKywAll()
	{
		$sql="SELECT mk.id_kyw,mk.nama_kyw,md.nama_dept from master_karyawan mk left join master_dept md on mk.dept_kyw = md.id_dept";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getDescAdvCflow($idAdv)
	{
		$sql = "select a.kode_cflow from cpa a where a.id_master = '".$idAdv."' group by a.kode_cflow";
		$query=$this->db->query($sql);
		$hasil=$query->result();
		return $hasil[0]->kode_cflow;
	}
	public function getDescAdv($idAdv)
	{
		$this->db->select ( 'ma.id_kyw, mk.nama_kyw, md.nama_dept, ma.jml_uang, ma.tgl_jt, ma.pay_to, ma.nama_akun_bank, ma.no_akun_bank, ma.nama_bank, ma.keterangan, ma.dok_po, ma.dok_sp, ma.dok_ssp, ma.dok_sspk, ma.dok_sbj, ma.app_keuangan_id, ma.app_hd_id, ma.app_gm_id, ma.app_keuangan_status, ma.app_hd_status, ma.app_gm_status, ma.app_keuangan_tgl, ma.app_hd_tgl, ma.app_gm_tgl, ma.app_keuangan_ket, ma.app_hd_ket, ma.app_gm_ket' );
		$this->db->from('master_advance ma');
		$this->db->join('master_karyawan mk', 'ma.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->where ( 'ma.id_advance', $idAdv );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
		
	}
	public function getDescJadva($idJadv)
	{
		$this->db->select('p.id_pp,p.tgl_trans,p.id_advance,p.jumlah,p.kode_perk,p.kode_cflow,p.type_adv,pk.kode_alt,pk.nama_perk,mc.kode_alt as kode_altCflow,mc.nama_cflow');
		$this->db->from('perintah_pembayaran p');
		$this->db->join('perkiraan pk', 'p.kode_perk=pk.kode_perk', 'LEFT');
		$this->db->join('master_cashflow mc', 'p.kode_cflow=mc.kode_cflow', 'LEFT');
		$this->db->where('id_pp',$idJadv );
		$query = $this->db->get();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}
	function getJadvById($idJadv)
	{
		$sql="select distinct c.kode_cflow, a.id, a.id_pp,a.tgl_pp,a.episodeNo,a.check_giro,a.tanggal,a.amount,a.original_amount,b.jml_uang,b.keterangan,
				c.kode_cflow,f.nama_cflow,d.id_kyw,d.nama_kyw,e.id_dept,e.nama_dept,b.no_akun_bank,b.nama_bank,b.nama_akun_bank
				from perintah_pembayaran a 
				left join master_advance b on a.id_advance = b.id_advance
				left join cpa c on c.id_master = b.id_advance
				left join master_karyawan d on b.id_kyw = d.id_kyw
				left join master_dept e on d.dept_kyw = e.id_dept
				left join master_cashflow f on c.kode_cflow = f.kode_cflow
				where a.id = '".$idJadv."'";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	/*function getIdPp(){
		$sql= "select id from perintah_pembayaran";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "UM";
		$tahun = date('Y');
		$th = substr($tahun,-2);
		$bulan = date('m');
		if($jml == 0){
			$id_adv = "000001";
			return $kode.' '.$id_adv.'-'.$th.$bulan;
		}else{
			$sql= "select max(right(id,6)) as id_pp from perintah_pembayaran";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_pp;
			$id_adv = sprintf('%06u',$id_adv+1);
			return $kode.' '.$id_adv.'-'.$th.$bulan;
		}
	}*/
	public function getIdPp($bulan,$tahun){
		$sql= "select id_pp from perintah_pembayaran where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "ADV";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(id_pp,5,7)) as id_pp from perintah_pembayaran";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pp =  $hasil[0]->id_pp;
			$id_pp = sprintf('%07u',$id_pp+1);
			return $kode."-".$id_pp."-".$bulan.$th;
		}
	}
	public function insertJadv($data){
		
		$this->db->trans_begin();
		$model = $this->db->insert('perintah_pembayaran', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	
	}
	function updateJadv($data,$jadvId){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_pp', $jadvId);
		$query2 = $this->db->update('perintah_pembayaran', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function deleteJadv($jadvId){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_pp',$jadvId);
		$query2	=   $this->db->delete('perintah_pembayaran');
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