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
		$this->db->select ( 'mr.id_kyw, mk.nama_kyw, md.nama_dept, mr.no_invoice, mr.no_po, mr.jml_uang, mr.tgl_jt, mr.pay_to, mr.nama_akun_bank, mr.no_akun_bank, mr.nama_bank, mr.keterangan, mr.dok_fpe, mr.dok_kuitansi, mr.dok_fpa, mr.dok_po, mr.dok_suratjalan,mr.dok_lappenerimaanbrg,mr.dok_bast, mr.dok_bap, mr.dok_cop, mr.dok_ssp, mr.dok_sspk, mr.dok_sbj, mr.app_keuangan_id, mr.app_hd_id, mr.app_gm_id, mr.app_keuangan_status, mr.app_hd_status, mr.app_gm_status, mr.app_keuangan_tgl, mr.app_hd_tgl, mr.app_gm_tgl, mr.app_keuangan_ket, mr.app_hd_ket, mr.app_gm_ket' );
		$this->db->from('master_reqpay mr');
		$this->db->join('master_karyawan mk', 'mr.id_kyw=mk.id_kyw', 'LEFT');
		$this->db->join('master_dept md', 'mk.dept_kyw=md.id_dept', 'LEFT');
		$this->db->where ( 'mr.id_reqpay', $idReqpay );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
		
	}
	public function getIdReqpay(){
		$sql= "select id_reqpay from master_reqpay";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
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
	
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */