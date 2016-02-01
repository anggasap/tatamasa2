<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Grafik_penj extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('budgetc_cflow_m');
        $this->load->model('grafik_penj_m');
        
		session_start ();
	}
	public function index(){
		if($this->auth->is_logged_in () == false){
			$this->login();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			
			$this->template->set ( 'title', 'Home' );
			$this->template->load ( 'template/template1', 'global/index',$data );
		}
		
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('grafik_penj/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
        //$data['proyek'] = $this->budgetc_perk_m->getProyek();
        //$data['dept'] = $this->master_advance_m->get_dept();
       
		if(isset($_POST["btnSimpan"])){
			$this->simpan();
		}elseif(isset($_POST["btnUbah"])){
			$this->ubah();
		}elseif(isset($_POST["btnHapus"])){
			$this->hapus();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'grafik/grafik_penj_v',$data );
		}
	}
	
	
    function show(){
        $bulan1			= trim($this->input->post('bulan1'));
        $bulan2			= trim($this->input->post('bulan2'));
		$a = explode('-',$bulan1);
		$bulan1 = $a[1].'-'.$a[0].'-'.'01';
		$b = explode('-',$bulan2);
		$bulan2 = $b[1].'-'.$b[0].'-'.'31';

		$data['graph8'] = $this->grafik_penj_m->get_penj($bulan1,$bulan2);

		$menuId = $this->home_m->get_menu_id('grafik_penj/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
		$data['menu_all'] = $this->user_m->get_menu_all(0);

		$this->template->set ( 'title', $data['menu_nama'] );
		$this->template->load ( 'template/template3', 'grafik/grafikshow_penj_v',$data );
        
    }
    
	

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */