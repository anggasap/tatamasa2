<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_budget_realisasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('laporan_budget_realisasi_m');
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
		$menuId = $this->home_m->get_menu_id('laporan_budget_realisasi/home');
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
			$data['proyek'] = $this->laporan_budget_realisasi_m->getProyek();
			$data['tahun'] = $this->laporan_budget_realisasi_m->getTahun();
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'laporan/laporan_budget_realisasi_v',$data );
		}
	}
	
	function cetak()
    {
    	if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$tanggal= $this->uri->segment(3);
			$proyek = $this->uri->segment(4);
			$nol 	= $this->uri->segment(5);
			
			$date1 		= new DateTime($tanggal);
			$tgl_trans 	= $date1->format('Y-m-d');
			$tahun 		= $date1->format('Y');
			$bulan 		= $date1->format('m');
			
			//$tgl_trans  = date('Y-m-d');
			$delete = $this->laporan_budget_realisasi_m->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_aktiva = $this->laporan_budget_realisasi_m->insert_temp_laba_rugi( $tgl_trans,$this->session->userdata('id_user'));
			//$temp_perkiraan_pasiva = $this->laporan_budget_realisasi_m->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			if($bulan == '01'){
				$month = 'jan';
			}elseif($bulan == '02'){
				$month = 'feb';
			}elseif($bulan == '03'){
				$month = 'mar';
			}elseif($bulan == '04'){
				$month = 'apr';
			}elseif($bulan == '05'){
				$month = 'mei';
			}elseif($bulan == '06'){
				$month = 'jun';
			}elseif($bulan == '07'){
				$month = 'jul';
			}elseif($bulan == '08'){
				$month = 'agu';
			}elseif($bulan == '09'){
				$month = 'sep';
			}elseif($bulan == '10'){
				$month = 'okt';
			}elseif($bulan == '11'){
				$month = 'nov';
			}else{
				$month = 'des';
			}
			$saldo_realisasi_a = $this->laporan_budget_realisasi_m->get_saldo_realisasi_a($bulan,$tahun);
			foreach($saldo_realisasi_a->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_realisasi_a($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_realisasi_b = $this->laporan_budget_realisasi_m->get_saldo_realisasi_b($tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_realisasi_b->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_realisasi_b($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_budget_a = $this->laporan_budget_realisasi_m->get_saldo_budget_a($month,$proyek,$tahun);
			foreach($saldo_budget_a->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_budget_a($row->kode_perk,$row->$month,$this->session->userdata('id_user'));
			}
			$saldo_budget_b = $this->laporan_budget_realisasi_m->get_saldo_budget_b($month,$proyek,$tahun);
			foreach($saldo_budget_b->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_budget_b($row->kode_perk,$row->saldo,$this->session->userdata('id_user'));
			}
			$get_kode_induk = $this->laporan_budget_realisasi_m->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$ra = 0;
				$rb = 0;
				$ba = 0;
				$bb = 0;
				$get_saldo_induk = $this->laporan_budget_realisasi_m->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$ra=$ra + $row2->realisasi_a;
					$rb=$rb + $row2->realisasi_b;
					$ba=$ba + $row2->budget_a;
					$bb=$bb + $row2->budget_b;
					$this->laporan_budget_realisasi_m->update_saldo_induk($row1->kode_perk,$jsu,$ra,$rb,$ba,$bb,$this->session->userdata('id_user'));
				}
			}
			if($nol == '1'){
				$data ['all'] = $this->laporan_budget_realisasi_m->get_all_data($tahun,$proyek);	
			}else{
				$data ['all'] = $this->laporan_budget_realisasi_m->get_all_data_bukan_nol($tahun,$proyek);
			}
			$info = $this->setting_laporan_m->getAllSetting();
			foreach($info as $i){
				$nama = $i->pt;
				$kantor = $i->kantor;
				$alamat = $i->alamat;
			}
			$data ['real_a'] = $this->laporan_budget_realisasi_m->get_labarugi_berjalan_realisasi_a();
			$data ['real_b'] = $this->laporan_budget_realisasi_m->get_labarugi_berjalan_realisasi_b();
			$data ['bud_a'] = $this->laporan_budget_realisasi_m->get_labarugi_berjalan_budget_a();
			$data ['bud_b'] = $this->laporan_budget_realisasi_m->get_labarugi_berjalan_budget_b();
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] = trim($nama);
			$data['tower'] = trim($kantor);
			$data['bulan'] = trim($month);
			$data['alamat'] = trim($alamat);
			$data['laporan'] = 'Laporan Arus Kas Perbulan';
			$data['user'] = $this->session->userdata('username');
    		$this->load->view('cetak/cetak_laporan_budget_realisasi',$data);
			//print_r ($data);
    	}
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */