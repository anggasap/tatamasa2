<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_jnsbayar_m extends CI_Model {
	
	public function getJnsbayarAll()
	{
		$sql="SELECT * from type_bayar ";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getIdJnsbyr(){
		$sql= "select kode_bayar from type_bayar";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		if($jml == 0){
			$id_account = "001";
			return $id_account;
		}else{
			$sql= "select max(right(kode_bayar,3)) as kode_bayar from type_bayar";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_account =  $hasil[0]->kode_bayar;
			$id_account = sprintf('%03u',$id_account+1);
			return $id_account;
		}
	}
    public function getDescGL($idGL)
	{
		$this->db->select ( 'nama_perk' );
		$this->db->from('perkiraan');
		$this->db->where ( 'kode_perk', $idGL );
		$query = $this->db->get ();
		if($query->num_rows()== '1'){
			return $query->result ();
		}else{
			return false;
		}	
	}
	public function simpan($data){
		
		$this->db->trans_begin();
		$model = $this->db->insert('type_bayar', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	
	}
	function ubah($data,$jnsbyrId){
		$this->db->trans_begin();
		$query1 = $this->db->where('kode_bayar', $jnsbyrId);
		$query2 = $this->db->update('type_bayar', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	function hapus($idAcc){
		$this->db->trans_begin();
		$query1	=	$this->db->where('kode_bayar',$idAcc);
		$query2	=   $this->db->delete('type_bayar');
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