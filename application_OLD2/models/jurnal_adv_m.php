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
	function getIdCf($idAdv){
		$sql="select distinct a.kode_cflow from cpa a where a.id_master = '".$idAdv."'";
		$query=$this->db->query($sql);
		return $query->result();	
	}
	public function getAdvAll()
	{
		$sql="SELECT ma.id_advance,mk.nama_kyw, ma.jml_uang
			  from master_advance ma
			  left join master_karyawan mk on ma.id_kyw = mk.id_kyw
			  where ma.status_pp = 0";
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
	function getTypeAdv(){
		$sql="SELECT * FROM type_advance";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function getKywAll()
	{
		$sql="SELECT mk.id_kyw,mk.nama_kyw,md.nama_dept from master_karyawan mk left join master_dept md on mk.dept_kyw = md.id_dept";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getDescAdvCflow($idAdv)
	{
		$sql = "select a.kode_cflow from cpa a where a.id_master = '".$idAdv."' group by a.id_master";
		$query=$this->db->query($sql);
		$hasil=$query->result();
		return $hasil[0]->kode_cflow;
	}
	public function getDescAdv($idAdv)
	{
		$this->db->select('ma.id_kyw, mk.nama_kyw, md.nama_dept, ma.jml_uang, ma.tgl_jt, ma.pay_to, ma.nama_akun_bank, ma.no_akun_bank, 
		ma.nama_bank, ma.keterangan, ma.dok_po, ma.dok_sp, ma.dok_ssp, ma.dok_sspk, ma.dok_sbj, ma.app_keuangan_id, ma.app_hd_id, ma.app_gm_id, 
		ma.app_keuangan_status, ma.app_hd_status, ma.app_gm_status, ma.app_keuangan_tgl, ma.app_hd_tgl, ma.app_gm_tgl, ma.app_keuangan_ket, 
		ma.app_hd_ket, ma.app_gm_ket');
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
		$sql="select p.id_pp,p.tgl_trans,p.id_advance,p.jumlah,p.type_adv,p.kode_bayar,t.nama_kdbayar,mk.nama_kyw,md.nama_dept,
				(select m.nama_kyw from master_karyawan m where m.id_kyw=ma.pay_to) as pay,ma.nama_akun_bank,ma.no_akun_bank,
				ma.nama_bank,mp.id_proyek,mp.nama_proyek,ta.id_account,ta.nama_account,ma.id_kyw
				from perintah_pembayaran p
				left join master_advance ma on p.id_advance = ma.id_advance
				left join master_karyawan mk on ma.id_kyw = mk.id_kyw
				left join master_dept md on mk.dept_kyw = md.id_dept
				left join master_proyek mp on mp.id_proyek = ma.id_proyek
				left join type_bayar t on p.kode_bayar = t.kode_perk
				left join type_advance ta on p.type_adv = ta.id_account
				where p.id_pp = '".$idJadv."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	
	function getJadvById($idJadv)
	{
		$sql = "select p.id_pp,p.tgl_trans,p.id_advance,p.jumlah,p.type_adv,ta.nama_account,ma.jml_uang,ma.keterangan, p.kode_bayar,t.nama_kdbayar,
				mk.nama_kyw,md.nama_dept,(select m.nama_kyw from master_karyawan m where m.id_kyw=ma.pay_to) as pay,ma.nama_akun_bank,ma.no_akun_bank,
				ma.nama_bank,mp.id_proyek,mp.nama_proyek,ma.id_kyw,cc.kode_cflow,mc.nama_cflow,ma.app_user_id,ma.app_keuangan_status, ma.app_hd_status,
				ma.app_gm_status,ma.app_keuangan_id, ma.app_hd_id,ma.app_gm_id,ma.app_keuangan_tgl, ma.app_hd_tgl,ma.app_gm_tgl,t.norek_bank
				from perintah_pembayaran p
				left join master_advance ma on p.id_advance = ma.id_advance
				left join master_karyawan mk on ma.id_kyw = mk.id_kyw
				left join master_dept md on mk.dept_kyw = md.id_dept
				left join master_proyek mp on mp.id_proyek = ma.id_proyek
				left join type_bayar t on p.kode_bayar = t.kode_perk
				left join type_advance ta on p.type_adv = ta.id_account
				left join cpa cc on p.id_advance = cc.id_master
				left join master_cashflow mc on mc.kode_cflow = cc.kode_cflow
				where p.id_pp = '".$idJadv."' group by cc.kode_cflow ";
		$query = $this->db->query($sql);
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
	function updateAdv_statusPP($data_model2,$idAdv){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_advance', $idAdv);
		$query2 = $this->db->update('master_advance', $data_model2);
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