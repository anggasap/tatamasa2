<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Booking_m extends CI_Model {
	
	public function getCustomerAll()
	{
		$sql="SELECT r.* from master_customer r ";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getIdCustomer(){
		$sql= "select id_cust from master_customer";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		if($jml == 0){
			$id_rumah = "0000001";
			return $id_rumah;
		}else{
			$sql= "select max(right(id_cust,7)) as id_cust from master_customer";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_rumah =  $hasil[0]->id_cust;
			$id_rumah = sprintf('%07u',$id_rumah+1);
			return $id_rumah;
		}
	}


	public function simpan($data){
		
		$this->db->trans_begin();
		$model = $this->db->insert('master_customer', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	
	}
	function ubah($data,$idCustomer){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_cust', $idCustomer);
		$query2 = $this->db->update('master_customer', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	
	function hapus($idCust){
		$this->db->trans_begin();
		$query1	=	$this->db->where('id_cust',$idCust);
		$query2	=   $this->db->delete('master_customer');
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