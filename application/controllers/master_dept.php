<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_dept extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_dept_m');
		session_start ();
	}
	public function index(){
		if($this->auth->is_logged_in () == false){
			$this->login();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			
			//$data ['nama'] = $this->home_m->get_nama_kantor ();
			$this->template->set ( 'title', 'home' );
			$this->template->load ( 'template/template1', 'global/index',$data );
		}
		
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('master_dept/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		
		if(isset($_POST["btnSimpan"])){
			$this->simpan();
		}elseif(isset($_POST["btnUbah"])){
			$this->ubah();
		}elseif(isset($_POST["btnHapus"])){
			$this->hapus();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['data_dept'] = $this->master_dept_m->get_departemen_modal();
			
			$this->template->set ( 'title', 'home' );
			$this->template->load ( 'template/template3', 'master/master_dept_v',$data );
		}
	}
	
	function simpan(){  
	 	$desc_group_user = trim($this->input->post('descDept'));
		 $data = array(
		 	'dept_id'      		=>'0',
		 	'dept_desc'        	=>$desc_group_user
		 );
			$model = $this->master_dept_m->insert_group_user_m($data);
			if($model){
				$this->session->set_flashdata('success', 'Simpan group user berhasil !');
				redirect('master_dept/home');
			}else{
				$this->session->set_flashdata('error','Simpan group user gagal !');
				redirect('master_dept/home');
			}
	}
	function ubah(){  
	 	$id_group_user = trim($this->input->post('idDept'));
		$desc_group_user = trim($this->input->post('descDept'));
		 $data = array(
		 	'dept_desc'        	=>$desc_group_user
		 );
			$model = $this->master_dept_m->update_group_user_m($id_group_user,$data);
			if($model){
				$this->session->set_flashdata('success', 'Ubah group user berhasil !');
				redirect('master_dept/home');
			}else{
				$this->session->set_flashdata('error','Ubah group user gagal !');
				redirect('master_dept/home');
			}
	}
	function hapus(){  
	 	$id_group_user = trim($this->input->post('idDept'));
			$model = $this->master_dept_m->delete_group_user_m($id_group_user);
			if($model){
				$this->session->set_flashdata('success', 'Hapus group user berhasil !');
				redirect('master_dept/home');
			}else{
				$this->session->set_flashdata('error','Hapus group user gagal !');
				redirect('master_dept/home');
			}
	}

}

/* End of file master_dept.php */
/* Location: ./application/controllers/master_dept.php */