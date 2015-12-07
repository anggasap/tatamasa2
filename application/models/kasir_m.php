<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Kasir_m extends CI_Model {
	public function getAdvAll()
	{
		$sql="select p.id_pp,m.id_advance,m.jml_uang,k.nama_kyw,d.nama_dept from perintah_pembayaran p
				left join master_advance m on p.id_advance = m.id_advance
				left join master_karyawan k on m.id_kyw = k.id_kyw
				left join master_dept d on k.dept_kyw = d.id_dept";
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
	public function getDescAdv($idAdv)
	{
		$this->db->select ( 'ma.keterangan,mk.nama_kyw, md.nama_dept, ma.jml_uang, ma.id_proyek, ma.tgl_trans,
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

	
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */