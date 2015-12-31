<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Sec_group_user_m extends CI_Model {
	public function get_user_group_modal() {
		$this->db->select ( 'usergroup_id,usergroup_desc' );
		$this->db->from ( 'sec_usergroup' );
		$this->db->order_by ( "usergroup_id", "asc" );
		return $this->db->get ();
	}
	public function insert_group_user_m($data){
		$model = $this->db->insert('sec_usergroup', $data);
		if ($model){
			return true;
		}else{
			return false;
		}
	}
	public function update_group_user_m($id_group_user,$data){
		$model1 = $this->db->where('usergroup_id', $id_group_user);
		$model2 = $this->db->update('sec_usergroup', $data);
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	public function delete_group_user_m($id_group_user){
		$model1 = $this->db->where('usergroup_id', $id_group_user);
		$model2 = $this->db->delete('sec_usergroup');
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	
}

/* End of file sec_group_user_m.php */
/* Location: ./application/models/sec_group_user.php */