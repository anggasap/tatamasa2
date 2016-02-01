<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_bast_c extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('laporan_bast_m');
		$this->load->model('setting_laporan_m');
		$this->load->model('booking_jual_m');
		$this->load->library('fpdf');
		//$this->load->library('mc_table');
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
		$menuId = $this->home_m->get_menu_id('laporan_bast_c/home');
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
			$this->template->load ( 'template/template3', 'laporan/laporan_bast_v',$data );
		}
	}

	function cetakBast($kodePenj, $idCust, $idRumah)
	{
		if ($this->auth->is_logged_in() == false) {
			redirect('main/index');
		} else {

			$tglTrans = date('d-m-Y');
			$data['penj'] = $this->booking_jual_m->getDescRumahBooked($idRumah);
			$data['tglTrans'] = $this->session->userdata('tgl_y');;
			//$data['rows3'] = $this->booking_jual_m->getAngsInfo($kodePenj);
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');
			$data['nama'] = 'PT BERKAH GRAHA MANDIRI';
			$data['tower'] = 'Beltway Office Park Tower Lt. 5';
			$data['alamat'] = 'Jl. TB Simatupang No. 41 - Pasar Minggu - Jakarta Selatan';
			$data['laporan'] = 'Laporan Penjualan Tanggal ' . $tglTrans;
			$data['user'] = $this->session->userdata('username');
			$this->load->view('cetak/cetak_laporan_bast', $data);
		}
	}
	
}

 

/* End of file main.php */
/* Location: ./application/controllers/kasumum.php */
