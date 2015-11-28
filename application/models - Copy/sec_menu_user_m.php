<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Sec_menu_user_m extends CI_Model {
	public function get_user_group_modal() {
		$this->db->select ( 'usergroup_id,usergroup_desc' );
		$this->db->from ( 'sec_usergroup' );
		$this->db->order_by ( "usergroup_id", "asc" );
		return $this->db->get ();
	}
	public function insert_menu_user_m($data){
		$model = $this->db->insert('sec_menu', $data);
		if ($model){
			return true;
		}else{
			return false;
		}
	}
	public function update_menu_user_m($idMenu,$data){
		$model1 = $this->db->where('menu_id', $idMenu);
		$model2 = $this->db->update('sec_menu', $data);
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	public function delete_menu_user_m($idMenu){
		$model1 = $this->db->where('menu_id', $idMenu);
		$model2 = $this->db->delete('sec_menu');
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	public function cek_menuChild_user_m($idRootMenu){
		$this->db->select ( 'parent' );
		$this->db->from ( 'sec_menu' );
		$this->db->where ( "parent", $idRootMenu );
		$query = $this->db->get ();
		return $query->num_rows(); 
	}
	
}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */