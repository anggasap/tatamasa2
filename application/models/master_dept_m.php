<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Master_dept_m extends CI_Model {
	public function get_departemen_modal() {
		$this->db->select ( 'id_dept,nama_dept' );
		$this->db->from ( 'master_dept' );
		$this->db->order_by ( "id_dept", "asc" );
		return $this->db->get ();
	}
	public function insert_dept_m($data){
		$model = $this->db->insert('master_dept', $data);
		if ($model){
			return true;
		}else{
			return false;
		}
	}
	public function update_dept_m($id_dept,$data){
		$model1 = $this->db->where('id_dept', $id_dept);
		$model2 = $this->db->update('master_dept', $data);
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	public function delete_dept_m($id_dept){
		$model1 = $this->db->where('id_dept', $id_dept);
		$model2 = $this->db->delete('master_dept');
		if ($model1 && $model2){
			return true;
		}else{
			return false;
		}
	}
	
}

/* End of file sec_dept_m.php */
/* Location: ./application/models/sec_dept.php */