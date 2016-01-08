<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_kontrak_m extends CI_Model {
	public function getKontrakAll()
	{
		$sql="SELECT * from master_kontrak ";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getIdKontrak($bulan,$tahun){
		$sql= "select no_kontrak from master_kontrak where MONTH(tgl_kontrak)='$bulan' and YEAR(tgl_kontrak)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
        $kode = "PO";
        $th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(no_kontrak,4,7)) as id_kontrak from master_kontrak";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_kontrak =  $hasil[0]->id_kontrak;
			$id_kontrak = sprintf('%07u',$id_kontrak+1);
			return $kode."-".$id_kontrak."-".$bulan.$th;
		}
	}
	public function getDescKontrak($idKontrak)
	{
		$this->db->select('no_kontrak, tgl_kontrak, tgl_awal, tgl_selesai, pasal, nilai, pekerjaan, nama1, jabatan1, perusahaan, alamat, kota, kodepos, nama2, jabatan2' );
		$this->db->from('master_kontrak');
		$this->db->where ('no_kontrak', $idKontrak);
		$query = $this->db->get();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}
	}
	public function insert($data){
		
		$this->db->trans_begin();
		$model = $this->db->insert('master_kontrak', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	
	}
	function update($data,$idKontrak){
		$this->db->trans_begin();
		$query1 = $this->db->where('no_kontrak', $idKontrak);
		$query2 = $this->db->update('master_kontrak', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function delete($idKontrak){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_kontrak',$idKontrak);
		$query2	=   $this->db->delete('master_kontrak');
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