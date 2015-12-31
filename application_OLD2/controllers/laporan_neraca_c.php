<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_neraca_c extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('lapneracamodel');
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
		$menuId = $this->home_m->get_menu_id('laporan_neraca_c/home');
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
			$this->template->load ( 'template/template3', 'laporan/laporan_neraca_v',$data );
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
			
			/*============= DEBET + ====================*/
			$delete = $this->lapneracamodel->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_aktiva = $this->lapneracamodel->insert_temp_perkiraan_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_pasiva = $this->lapneracamodel->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			$get_kode_induk = $this->lapneracamodel->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel->update_saldo_induk($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			$data ['total_aktiva'] = $this->lapneracamodel->get_total_aktiva($tgl_trans);
			$data ['total_pasiva'] = $this->lapneracamodel->get_total_pasiva($tgl_trans);
			$data ['total_modal']  = $this->lapneracamodel->get_total_modal($tgl_trans);
			$data ['laba_rugi_berjalan'] = $this->lapneracamodel->get_labarugi_berjalan();
			if($nol == '1'){
				$data ['neraca'] = $this->lapneracamodel->get_data_neraca($tgl_trans,$this->session->userdata('id_user'));	
			}else{
				$data ['neraca'] = $this->lapneracamodel->get_data_neraca_bukan_nol($tgl_trans,$this->session->userdata('id_user'));
			}
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] 	= 'PT BERKAH GRAHA MANDIRI';
			$data['tower'] 	= 'Beltway Office Park Tower Lt. 5';
			$data['alamat'] = 'Jl. TB Simatung No. 41 - Pasar Minggu - Jakarta Selatan';
			$data['laporan']= 'Laporan Neraca per .';
			$data['user'] 	= $this->session->userdata('username');
			$data['tgl'] 	= $tgl_trans;
    		$this->load->view('cetak/cetak_laporan_neraca',$data);
		}
	}
	
	function cetak_t(){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$tgl 		= $this->uri->segment(3);
			$nol 		= $this->uri->segment(4);
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			/*============= DEBET + ====================*/
			$delete = $this->lapneracamodel->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$deleteTemp = $this->lapneracamodel->deleteTemp($tgl_trans,$this->session->userdata('id_user'));
			$this->db->query("ALTER TABLE web_temp AUTO_INCREMENT 1");
			
			$temp_perkiraan_aktiva = $this->lapneracamodel->insert_temp_perkiraan_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			
			$saldo_pasiva = $this->lapneracamodel->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			
			$get_kode_induk = $this->lapneracamodel->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel->update_saldo_induk($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			$data ['total_aktiva'] = $this->lapneracamodel->get_total_aktiva($tgl_trans);
			$data ['total_pasiva'] = $this->lapneracamodel->get_total_pasiva($tgl_trans);
			$data ['total_modal']  = $this->lapneracamodel->get_total_modal($tgl_trans);
			$data ['laba_rugi_berjalan'] = $this->lapneracamodel->get_labarugi_berjalan();
			
			if($nol == '1'){
				$total_aktiva = $this->lapneracamodel->get_total_neraca_aktiva($tgl_trans,$this->session->userdata('id_user'));
				$total_pasiva = $this->lapneracamodel->get_total_neraca_pasiva($tgl_trans,$this->session->userdata('id_user'));
				if($total_aktiva > $total_pasiva){
					$temp_aktiva = $this->lapneracamodel->insert_temp_aktiva( $tgl_trans,$this->session->userdata('id_user'));
					$total_modal  = $this->lapneracamodel->get_total_modal($tgl_trans);
					$laba_rugi_berjalan = $this->lapneracamodel->get_labarugi_berjalan();
					$data_pasiva = $this->lapneracamodel->get_data_pasiva();
					$id = 1;
					foreach($data_pasiva as $rows){
						$dataPasiva = array(
							'kode_perk_psv'  => $rows->kode_perk,
							'kode_alt_psv' => $rows->kode_alt,
							'nama_perk_psv' => $rows->nama_perk,
							'type_psv' => $rows->type,
							'level_psv' => $rows->level,
							'kode_induk_psv' => $rows->kode_induk,
							'saldo_akhir_psv' => $rows->saldo_akhir
						);
						$update_temp = $this->lapneracamodel->update_temp($dataPasiva,$id);
						$id++;	
					}
					$idT = $id+1;
					$dataTM = array(
						'nama_perk_psv' => 'Total Modal',
						'saldo_akhir_psv' => $total_modal
					);
					$update_temp = $this->lapneracamodel->update_temp($dataTM,$idT);
					$idlr = $idT+1;
					$datalr = array(
						'nama_perk_psv' => 'Laba Rugi Berjalan',
						'saldo_akhir_psv' => $laba_rugi_berjalan
					);
					$update_temp = $this->lapneracamodel->update_temp($datalr,$idlr);				
				}else{
					$temp_pasiva = $this->lapneracamodel->insert_temp_pasiva( $tgl_trans,$this->session->userdata('id_user'));
					$total_modal  = $this->lapneracamodel->get_total_modal($tgl_trans);
					$laba_rugi_berjalan = $this->lapneracamodel->get_labarugi_berjalan();
					$data_aktiva = $this->lapneracamodel->get_data_aktiva();
					$id = 1;
					foreach($data_aktiva as $rows){
						$dataAktiva = array(
							'kode_perk'  => $rows->kode_perk,
							'kode_alt' => $rows->kode_alt,
							'nama_perk' => $rows->nama_perk,
							'type' => $rows->type,
							'level' => $rows->level,
							'kode_induk' => $rows->kode_induk,
							'saldo_akhir' => $rows->saldo_akhir
						);
						$update_temp = $this->lapneracamodel->update_temp($dataAktiva,$id);
						$id++;	
					}
					$idT = $id+1;
					$dataTM = array(
						'kode_perk'  => '',
						'kode_alt' => '',
						'nama_perk' => '',
						'type' => '',
						'level' => '0',
						'kode_induk' => '',
						'saldo_akhir' => '0',
						'kode_perk_psv'  => '',
						'kode_alt_psv' => '',
						'nama_perk_psv' => 'Total Modal',
						'type_psv' => '',
						'level_psv' => '0',
						'kode_induk_psv' => '',	
						'saldo_akhir_psv' => $total_modal
					);
					$this->db->insert('web_temp', $dataTM);
					$idlr = $idT+1;
					$datalr = array(
						'kode_perk'  => '',
						'kode_alt' => '',
						'nama_perk' => '',
						'type' => '',
						'level' => '0',
						'kode_induk' => '',
						'saldo_akhir' => '0',
						'kode_perk_psv'  => '',
						'kode_alt_psv' => '',
						'nama_perk_psv' => 'Laba Rugi Berjalan',
						'type_psv' => '',
						'level_psv' => '0',
						'kode_induk_psv' => '',	
						'saldo_akhir_psv' => $laba_rugi_berjalan
					);
					$this->db->insert('web_temp', $datalr); 
				}
			}else{
				$total_aktiva = $this->lapneracamodel->get_total_neraca_aktiva_tanpa_0($tgl_trans,$this->session->userdata('id_user'));
				$total_pasiva = $this->lapneracamodel->get_total_neraca_pasiva_tanpa_0($tgl_trans,$this->session->userdata('id_user'));
				if($total_aktiva > $total_pasiva){
					$temp_aktiva = $this->lapneracamodel->insert_temp_aktiva_tanpa_0( $tgl_trans,$this->session->userdata('id_user'));
					$total_modal  = $this->lapneracamodel->get_total_modal($tgl_trans);
					$laba_rugi_berjalan = $this->lapneracamodel->get_labarugi_berjalan();
					$data_pasiva = $this->lapneracamodel->get_data_pasiva_tanpa_0();
					$id = 1;
					foreach($data_pasiva as $rows){
						$dataPasiva = array(
							'kode_perk_psv'  => $rows->kode_perk,
							'kode_alt_psv' => $rows->kode_alt,
							'nama_perk_psv' => $rows->nama_perk,
							'type_psv' => $rows->type,
							'level_psv' => $rows->level,
							'kode_induk_psv' => $rows->kode_induk,
							'saldo_akhir_psv' => $rows->saldo_akhir
						);
						$update_temp = $this->lapneracamodel->update_temp($dataPasiva,$id);
						$id++;	
					}
					$idT = $id+1;
					$dataTM = array(
						'nama_perk_psv' => 'Total Modal',
						'saldo_akhir_psv' => $total_modal
					);
					$update_temp = $this->lapneracamodel->update_temp($dataTM,$idT);
					$idlr = $idT+1;
					$datalr = array(
						'nama_perk_psv' => 'Laba Rugi Berjalan',
						'saldo_akhir_psv' => $laba_rugi_berjalan
					);
					$update_temp = $this->lapneracamodel->update_temp($datalr,$idlr);				
				}else{
					$temp_pasiva = $this->lapneracamodel->insert_temp_pasiva_tanpa_0( $tgl_trans,$this->session->userdata('id_user'));
					$total_modal  = $this->lapneracamodel->get_total_modal($tgl_trans);
					$laba_rugi_berjalan = $this->lapneracamodel->get_labarugi_berjalan();
					$data_aktiva = $this->lapneracamodel->get_data_aktiva_tanpa_0();
					$id = 1;
					foreach($data_aktiva as $rows){
						$dataAktiva = array(
							'kode_perk'  => $rows->kode_perk,
							'kode_alt' => $rows->kode_alt,
							'nama_perk' => $rows->nama_perk,
							'type' => $rows->type,
							'level' => $rows->level,
							'kode_induk' => $rows->kode_induk,
							'saldo_akhir' => $rows->saldo_akhir
						);
						$update_temp = $this->lapneracamodel->update_temp($dataAktiva,$id);
						$id++;	
					}
					$idT = $id+1;
					$dataTM = array(
						'kode_perk'  => '',
						'kode_alt' => '',
						'nama_perk' => '',
						'type' => '',
						'level' => '0',
						'kode_induk' => '',
						'saldo_akhir' => '0',
						'kode_perk_psv'  => '',
						'kode_alt_psv' => '',
						'nama_perk_psv' => 'Total Modal',
						'type_psv' => '',
						'level_psv' => '0',
						'kode_induk_psv' => '',	
						'saldo_akhir_psv' => $total_modal
					);
					$this->db->insert('web_temp', $dataTM);
					$idlr = $idT+1;
					$datalr = array(
						'kode_perk'  => '',
						'kode_alt' => '',
						'nama_perk' => '',
						'type' => '',
						'level' => '0',
						'kode_induk' => '',
						'saldo_akhir' => '0',
						'kode_perk_psv'  => '',
						'kode_alt_psv' => '',
						'nama_perk_psv' => 'Laba Rugi Berjalan',
						'type_psv' => '',
						'level_psv' => '0',
						'kode_induk_psv' => '',	
						'saldo_akhir_psv' => $laba_rugi_berjalan
					);
					$this->db->insert('web_temp', $datalr); 
				}
				
			}
			
			$data ['neraca'] = $this->lapneracamodel->get_data_neraca_t($tgl_trans,$this->session->userdata('id_user'));
			/*if($nol == '1'){
				$data ['neraca'] = $this->lapneracamodel->get_data_neraca($tgl_trans,$this->session->userdata('id_user'));	
			}else{
				$data ['neraca'] = $this->lapneracamodel->get_data_neraca_bukan_nol($tgl_trans,$this->session->userdata('id_user'));
			}*/
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] 	= 'PT BERKAH GRAHA MANDIRI';
			$data['tower'] 	= 'Beltway Office Park Tower Lt. 5';
			$data['alamat'] = 'Jl. TB Simatung No. 41 - Pasar Minggu - Jakarta Selatan';
			$data['laporan']= 'Laporan Neraca per .';
			$data['user'] 	= $this->session->userdata('username');
			$data['tgl'] 	= $tgl_trans;
			//echo json_encode($data);
    		$this->load->view('cetak/cetak_laporan_neraca_t',$data);
		}
	}
	
}

 

/* End of file main.php */
/* Location: ./application/controllers/kasumum.php */
