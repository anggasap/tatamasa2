<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_nasabah extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_m');
		$this->load->model('nasabah_m');
		session_start ();
	}
	public function index(){
		if($this->auth->is_logged_in () == false){
			$this->login();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$menuId = $this->home_m->get_menu_id('master_nasabah/index');
			$data['menu_id'] = $menuId[0]->menu_id;
			$data['menu_parent'] = $menuId[0]->parent;
			$this->auth->restrict ($data['menu_id']);
			$this->auth->cek_menu ( $data['menu_id'] );
			
			$this->breadcrumbs->push('Home', 'main/index' );
			$this->breadcrumbs->push('Master', 'master_nasabah' );
			$this->breadcrumbs->push('Nasabah', 'master_nasabah/index' );
			
			$data['breadcrumbs'] = $this->breadcrumbs->show();
			$data['nasabah'] = $this->nasabah_m->get_all_nasabah();
			$this->template->set ( 'title', 'nasabah' );
			$this->template->load ( 'template/template3', 'nasabah/index',$data );
		}
		
	}
	
	public function add(){
		$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
		$menuId = $this->home_m->get_menu_id('master_nasabah/index');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
			
		$this->breadcrumbs->push('Home', 'main/index' );
		$this->breadcrumbs->push('Nasabah', 'master_nasabah' );
		$this->breadcrumbs->push('Tambah', 'master_nasabah/add' );
			
		$data ['breadcrumbs'] = $this->breadcrumbs->show();
		$data ['judul']	= "Buat Nasabah";
		$data ['jenis_gelar']=$this->nasabah_m->get_gelar();
		$data ['jenis_id']=$this->nasabah_m->get_jenis_id();
		$data ['jenis_kota']=$this->nasabah_m->get_jenis_kota();
		$data ['jenis_negara']=$this->nasabah_m->get_jenis_negara();
		$data ['jenis_kerja']=$this->nasabah_m->get_jenis_kerja();
		//$data ['kode_group1']=$this->nasabah_m->get_kode_group1();
		$data ['sid_bidang_usaha']=$this->nasabah_m->get_sid_bidang_usaha();
		$data ['sid_gol_debitur']=$this->nasabah_m->get_sid_gol_debitur();
		$data ['sid_hub_bank']=$this->nasabah_m->get_sid_hub_bank();
		$data ['kode_group4']=$this->nasabah_m->get_kode_group4();
		//$data ['counter_nasabah_id_length']=$this->nasabah_m->get_counter_nasabah_id_length();
		
		$this->template->set ( 'title', 'Tambah nasabah' );
		$this->template->load ( 'template/template3', 'nasabah/add',$data );
	}
	
}

/* End of file akses_user.php */
/* Location: ./application/controllers/akses_user.php */