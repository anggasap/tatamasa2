<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sec_group_user extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('sec_group_user_m');
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
		$menuId = $this->home_m->get_menu_id('sec_group_user/home');
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
			$data['data_user_group'] = $this->sec_group_user_m->get_user_group_modal();
			
			$this->template->set ( 'title', 'home' );
			$this->template->load ( 'template/template3', 'admin/sec_group_user_v',$data );
		}
	}
	
	function simpan(){  
	 	$desc_group_user = trim($this->input->post('descUsergroup'));
		 $data = array(
		 	'usergroup_id'      		=>'0',
		 	'usergroup_desc'        	=>$desc_group_user
		 );
			$model = $this->sec_group_user_m->insert_group_user_m($data);
			if($model){
				$this->session->set_flashdata('success', 'Simpan group user berhasil !');
				redirect('sec_group_user/home');	
			}else{
				$this->session->set_flashdata('error','Simpan group user gagal !');
				redirect('sec_group_user/home');	
			}
	}
	function ubah(){  
	 	$id_group_user = trim($this->input->post('idUsergroup'));
		$desc_group_user = trim($this->input->post('descUsergroup'));
		 $data = array(
		 	'usergroup_desc'        	=>$desc_group_user
		 );
			$model = $this->sec_group_user_m->update_group_user_m($id_group_user,$data);
			if($model){
				$this->session->set_flashdata('success', 'Ubah group user berhasil !');
				redirect('sec_group_user/home');	
			}else{
				$this->session->set_flashdata('error','Ubah group user gagal !');
				redirect('sec_group_user/home');	
			}
	}
	function hapus(){  
	 	$id_group_user = trim($this->input->post('idUsergroup'));
			$model = $this->sec_group_user_m->delete_group_user_m($id_group_user);
			if($model){
				$this->session->set_flashdata('success', 'Hapus group user berhasil !');
				redirect('sec_group_user/home');	
			}else{
				$this->session->set_flashdata('error','Hapus group user gagal !');
				redirect('sec_group_user/home');	
			}
	}

}

/* End of file sec_group_user.php */
/* Location: ./application/controllers/sec_group_user.php */