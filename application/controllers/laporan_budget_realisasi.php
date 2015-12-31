<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_budget_realisasi extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('laporan_budget_realisasi_m');
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
			$tahun 	= $this->uri->segment(3);
			$proyek = $this->uri->segment(4);
			$nol 	= $this->uri->segment(5);
			
			$tgl_trans  = date('Y-m-d');
			$delete = $this->laporan_budget_realisasi_m->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_aktiva = $this->laporan_budget_realisasi_m->insert_temp_perkiraan_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->laporan_budget_realisasi_m->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->laporan_budget_realisasi_m->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_aktiva->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_pasiva = $this->laporan_budget_realisasi_m->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->laporan_budget_realisasi_m->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			$get_kode_induk = $this->laporan_budget_realisasi_m->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->laporan_budget_realisasi_m->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->laporan_budget_realisasi_m->update_saldo_induk($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			if($nol == '1'){
				$data ['br'] = $this->laporan_budget_realisasi_m->get_all_data($tahun,$proyek);	
			}else{
				$data ['br'] = $this->laporan_budget_realisasi_m->get_all_data_bukan_nol($tahun,$proyek);
			}
			$data ['all'] = 
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] = 'PT BERKAH GRAHA MANDIRI';
			$data['tower'] = 'Beltway Office Park Tower Lt. 5';
			$data['alamat'] = 'Jl. TB Simatung No. 41 - Pasar Minggu - Jakarta Selatan';
			$data['laporan'] = 'Laporan Budget vs Realisasi';
			$data['user'] = $this->session->userdata('username');
    		$this->load->view('cetak/cetak_laporan_budget_realisasi',$data);
    	}
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */