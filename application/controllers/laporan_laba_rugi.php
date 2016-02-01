<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_laba_rugi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('lap_laba_rugi_m');
		$this->load->model('setting_laporan_m');
		$this->load->library('fpdf');
		session_start();
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
		$menuId = $this->home_m->get_menu_id('laporan_laba_rugi/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
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
			$data['menu_all'] = $this->user_m->get_menu_all(0);
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'laporan/laporan_labarugi_v',$data );
		}
	}

	function cetak(){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$tgl 		= $this->uri->segment(3);
			$nol 		= $this->uri->segment(4);
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			$info = $this->setting_laporan_m->getAllSetting();
			foreach($info as $i){
				$nama = $i->pt;
				$kantor = $i->kantor;
				$alamat = $i->alamat;
			}
			
			$data ['total_pendapatan'] = $this->lap_laba_rugi_m->get_total_pendapatan($tgl_trans,$this->session->userdata('id_user'));
			$data ['total_biaya'] = $this->lap_laba_rugi_m->get_total_biaya($tgl_trans,$this->session->userdata('id_user'));
			if($nol == '1'){
				$data ['pendapatan'] = $this->lap_laba_rugi_m->get_data_laba_rugi_pendapatan($tgl_trans,$this->session->userdata('id_user'));
			}else{
				$data ['pendapatan'] = $this->lap_laba_rugi_m->get_data_laba_rugi_pendapatan_bukan_nol($tgl_trans,$this->session->userdata('id_user'));
			}
			if($nol == '1'){
				$data ['biaya'] = $this->lap_laba_rugi_m->get_data_laba_rugi_biaya($tgl_trans,$this->session->userdata('id_user'));	
			}else{
				$data ['biaya'] = $this->lap_laba_rugi_m->get_data_laba_rugi_biaya_bukan_nol($tgl_trans,$this->session->userdata('id_user'));
			}	
			
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1']  = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] 	 = trim($nama);
			$data['tower'] 	 = trim($kantor);
			$data['alamat']  = trim($alamat);
			$data['laporan'] = 'Laporan Laba Rugi komprehensif per ';
			$data['user'] 	 = $this->session->userdata('username');
			$data['tgl'] 	 = $tgl_trans;
    		$this->load->view('cetak/cetak_laporan_laba_rugi',$data);
		}
	}
	
	
}

 

/* End of file main.php */
/* Location: ./application/controllers/kasumum.php */
