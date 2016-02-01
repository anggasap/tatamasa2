<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_neraca_c_baru extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('lapneracamodel_baru');
		$this->load->model('setting_laporan_m');
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
		$menuId = $this->home_m->get_menu_id('laporan_neraca_c_baru/home');
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
			
			$this->template->set ('title',$data['menu_nama']);
			$this->template->load ('template/template3','laporan/laporan_neraca_baru_v',$data);
		}
	}

	function cetak($tgl,$nol,$tipe){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			/*============= DEBET + ====================*/
			$delete = $this->lapneracamodel_baru->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_aktiva = $this->lapneracamodel_baru->insert_temp_perkiraan_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel_baru->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel_baru->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_pasiva = $this->lapneracamodel_baru->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			$get_kode_induk = $this->lapneracamodel_baru->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel_baru->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel_baru->update_saldo_induk($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			
		}
	}
	function cetak2($tgl,$nol,$tipe){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			/*============= DEBET + ====================*/
			$delete = $this->lapneracamodel_baru->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_aktiva = $this->lapneracamodel_baru->insert_temp_perkiraan_aktiva2( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel_baru->insert_temp_perkiraan_pasiva2( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel_baru->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan2($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			$saldo_pasiva = $this->lapneracamodel_baru->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan2($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			$get_kode_induk = $this->lapneracamodel_baru->get_kode_induk2( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel_baru->get_saldo_induk2($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel_baru->update_saldo_induk2($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			
		}
	}
	
	function print_neraca($tgl,$nol,$tipe){
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			$delete = $this->lapneracamodel_baru->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			
			$tgl2 = date('Y-m-t', strtotime('-1 month', strtotime($tgl_trans)));
			$this->cetak($tgl2,$nol,$tipe);
			
			$data ['total_aktiva'] = $this->lapneracamodel_baru->get_total_aktiva($tgl2);
			$data ['total_pasiva'] = $this->lapneracamodel_baru->get_total_pasiva($tgl2);
			$data ['total_modal']  = $this->lapneracamodel_baru->get_total_modal($tgl2);
			$data ['laba_rugi_berjalan'] = $this->lapneracamodel_baru->get_labarugi_berjalan();
			
			$delete2 = $this->lapneracamodel_baru->deleteTempPerk2($tgl_trans,$this->session->userdata('id_user'));
			$this->cetak2($tgl_trans,$nol,$tipe);
			
			$data ['total_aktiva2'] = $this->lapneracamodel_baru->get_total_aktiva2($tgl_trans);
			$data ['total_pasiva2'] = $this->lapneracamodel_baru->get_total_pasiva2($tgl_trans);
			$data ['total_modal2']  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
			$data ['laba_rugi_berjalan2'] = $this->lapneracamodel_baru->get_labarugi_berjalan2();
			
			if($nol == '1'){
				if($tipe == '1'){
					$data ['neraca'] = $this->lapneracamodel_baru->get_data_neraca_hanya_header($tgl_trans,$this->session->userdata('id_user'));
				}else{
					$data ['neraca'] = $this->lapneracamodel_baru->get_data_neraca($tgl_trans,$this->session->userdata('id_user'));	
				}
			}else{
				if($tipe == '1'){
					$data ['neraca'] = $this->lapneracamodel_baru->get_data_neraca_bukan_nol_hanya_header($tgl_trans,$this->session->userdata('id_user'));
				}else{
					$data ['neraca'] = $this->lapneracamodel_baru->get_data_neraca_bukan_nol($tgl_trans,$this->session->userdata('id_user'));	
				}
			}
			$info = $this->setting_laporan_m->getAllSetting();
			foreach($info as $i){
				$nama = $i->pt;
				$kantor = $i->kantor;
				$alamat = $i->alamat;
			}
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] = trim($nama);
			$data['tower'] = trim($kantor);
			$data['alamat'] = trim($alamat);
			$data['laporan']= 'Laporan Posisi Keuangan per ';
			$data['user'] 	= $this->session->userdata('username');
			$data['tgl'] 	= $tgl2;
			$data['tgl2'] 	= $tgl_trans;
    		$this->load->view('cetak/cetak_laporan_neraca_baru',$data);
	}
	
	function cetak_t($tgl,$nol,$tipe){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			/*============= DEBET + ====================*/
			
			$temp_perkiraan_aktiva = $this->lapneracamodel_baru->insert_temp_perkiraan_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel_baru->insert_temp_perkiraan_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel_baru->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			
			$saldo_pasiva = $this->lapneracamodel_baru->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			
			$get_kode_induk = $this->lapneracamodel_baru->get_kode_induk( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel_baru->get_saldo_induk($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel_baru->update_saldo_induk($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			if($nol == '1'){
				if($tipe == '1'){
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_hanya_header($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_hanya_header($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
							$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_hanya_header( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
							$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_hanya_header();
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
								$update_temp = $this->lapneracamodel_baru->update_temp($dataPasiva,$id);
								$id++;	
							}
							$idT = $id+1;
							$dataTM = array(
								'nama_perk_psv' => 'Total Modal',
								'saldo_akhir_psv' => $total_modal
							);
							$update_temp = $this->lapneracamodel_baru->update_temp($dataTM,$idT);
							$idlr = $idT+1;
							$datalr = array(
								'nama_perk_psv' => 'Laba Rugi Berjalan',
								'saldo_akhir_psv' => $laba_rugi_berjalan
							);
							$update_temp = $this->lapneracamodel_baru->update_temp($datalr,$idlr);				
						}else{
							$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_hanya_header( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
							$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_hanya_header();
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
								$update_temp = $this->lapneracamodel_baru->update_temp($dataAktiva,$id);
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
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
							$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
							$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva();
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
								$update_temp = $this->lapneracamodel_baru->update_temp($dataPasiva,$id);
								$id++;	
							}
							$idT = $id+1;
							$dataTM = array(
								'nama_perk_psv' => 'Total Modal',
								'saldo_akhir_psv' => $total_modal
							);
							$update_temp = $this->lapneracamodel_baru->update_temp($dataTM,$idT);
							$idlr = $idT+1;
							$datalr = array(
								'nama_perk_psv' => 'Laba Rugi Berjalan',
								'saldo_akhir_psv' => $laba_rugi_berjalan
							);
							$update_temp = $this->lapneracamodel_baru->update_temp($datalr,$idlr);				
						}else{
							$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
							$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva();
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
								$update_temp = $this->lapneracamodel_baru->update_temp($dataAktiva,$id);
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
			}else{
				if($tipe == '1'){
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_tanpa_0_hanya_header($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_tanpa_0_hanya_header($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
						$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_tanpa_0_hanya_header( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
						$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_tanpa_0_hanya_header();
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
							$update_temp = $this->lapneracamodel_baru->update_temp($dataPasiva,$id);
							$id++;	
						}
						$idT = $id+1;
						$dataTM = array(
							'nama_perk_psv' => 'Total Modal',
							'saldo_akhir_psv' => $total_modal
						);
						$update_temp = $this->lapneracamodel_baru->update_temp($dataTM,$idT);
						$idlr = $idT+1;
						$datalr = array(
							'nama_perk_psv' => 'Laba Rugi Berjalan',
							'saldo_akhir_psv' => $laba_rugi_berjalan
						);
						$update_temp = $this->lapneracamodel_baru->update_temp($datalr,$idlr);				
					}else{
						$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_tanpa_0_hanya_header( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
						$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_tanpa_0_hanya_header();
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
							$update_temp = $this->lapneracamodel_baru->update_temp($dataAktiva,$id);
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
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_tanpa_0($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_tanpa_0($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
						$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_tanpa_0( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
						$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_tanpa_0();
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
							$update_temp = $this->lapneracamodel_baru->update_temp($dataPasiva,$id);
							$id++;	
						}
						$idT = $id+1;
						$dataTM = array(
							'nama_perk_psv' => 'Total Modal',
							'saldo_akhir_psv' => $total_modal
						);
						$update_temp = $this->lapneracamodel_baru->update_temp($dataTM,$idT);
						$idlr = $idT+1;
						$datalr = array(
							'nama_perk_psv' => 'Laba Rugi Berjalan',
							'saldo_akhir_psv' => $laba_rugi_berjalan
						);
						$update_temp = $this->lapneracamodel_baru->update_temp($datalr,$idlr);				
					}else{
						$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_tanpa_0( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan();
						$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_tanpa_0();
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
							$update_temp = $this->lapneracamodel_baru->update_temp($dataAktiva,$id);
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
			}
		}
	}
	
	function cetak_t2($tgl,$nol,$tipe){
		if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			
			/*============= DEBET + ====================*/
			
			$temp_perkiraan_aktiva = $this->lapneracamodel_baru->insert_temp_perkiraan_aktiva2( $tgl_trans,$this->session->userdata('id_user'));
			$temp_perkiraan_pasiva = $this->lapneracamodel_baru->insert_temp_perkiraan_pasiva2( $tgl_trans,$this->session->userdata('id_user'));
			$saldo_aktiva = $this->lapneracamodel_baru->get_saldo_aktiva( $tgl_trans,$this->session->userdata('id_user'));
			
			foreach($saldo_aktiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan2($row->kode_perk,$row->jumlah_ak,$this->session->userdata('id_user'));
			}
			
			$saldo_pasiva = $this->lapneracamodel_baru->get_saldo_pasiva( $tgl_trans,$this->session->userdata('id_user'));
			foreach($saldo_pasiva->result() as $row){
				$this->lapneracamodel_baru->update_saldo_temp_perkiraan2($row->kode_perk,$row->jumlah_psv,$this->session->userdata('id_user'));
			}
			
			$get_kode_induk = $this->lapneracamodel_baru->get_kode_induk2( $tgl_trans,$this->session->userdata('id_user'));
			foreach($get_kode_induk->result() as $row1){
				$jsu = 0;
				$get_saldo_induk = $this->lapneracamodel_baru->get_saldo_induk2($row1->kode_perk,$this->session->userdata('id_user'));
				foreach($get_saldo_induk->result() as $row2){
					$jsu=$jsu + $row2->saldo_akhir;
					$this->lapneracamodel_baru->update_saldo_induk2($row1->kode_perk,$jsu,$this->session->userdata('id_user'));
				}
			}
			/*============= END DEBET + ====================*/
			if($nol == '1'){
				if($tipe == '1'){
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_hanya_header2($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_hanya_header2($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
							$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_hanya_header2( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
							$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_hanya_header2();
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
								$update_temp = $this->lapneracamodel_baru->update_temp2($dataPasiva,$id);
								$id++;	
							}
							$idT = $id+1;
							$dataTM = array(
								'nama_perk_psv' => 'Total Modal',
								'saldo_akhir_psv' => $total_modal
							);
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataTM,$idT);
							$idlr = $idT+1;
							$datalr = array(
								'nama_perk_psv' => 'Laba Rugi Berjalan',
								'saldo_akhir_psv' => $laba_rugi_berjalan
							);
							$update_temp = $this->lapneracamodel_baru->update_temp2($datalr,$idlr);				
						}else{
							$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_hanya_header2( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
							$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_hanya_header2();
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
								$update_temp = $this->lapneracamodel_baru->update_temp2($dataAktiva,$id);
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
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva2($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva2($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
							$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva2( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
							$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva2();
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
								$update_temp = $this->lapneracamodel_baru->update_temp2($dataPasiva,$id);
								$id++;	
							}
							$idT = $id+1;
							$dataTM = array(
								'nama_perk_psv' => 'Total Modal',
								'saldo_akhir_psv' => $total_modal
							);
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataTM,$idT);
							$idlr = $idT+1;
							$datalr = array(
								'nama_perk_psv' => 'Laba Rugi Berjalan',
								'saldo_akhir_psv' => $laba_rugi_berjalan
							);
							$update_temp = $this->lapneracamodel_baru->update_temp2($datalr,$idlr);				
						}else{
							$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva2( $tgl_trans,$this->session->userdata('id_user'));
							$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
							$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
							$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva2();
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
								$update_temp = $this->lapneracamodel_baru->update_temp2($dataAktiva,$id);
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
							$this->db->insert('web_temp2', $dataTM);
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
							$this->db->insert('web_temp2', $datalr); 
						}
				}	
			}else{
				if($tipe == '1'){
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_tanpa_0_hanya_header2($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_tanpa_0_hanya_header2($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
						$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_tanpa_0_hanya_header2( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
						$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_tanpa_0_hanya_header2();
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
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataPasiva,$id);
							$id++;	
						}
						$idT = $id+1;
						$dataTM = array(
							'nama_perk_psv' => 'Total Modal',
							'saldo_akhir_psv' => $total_modal
						);
						$update_temp = $this->lapneracamodel_baru->update_temp2($dataTM,$idT);
						$idlr = $idT+1;
						$datalr = array(
							'nama_perk_psv' => 'Laba Rugi Berjalan',
							'saldo_akhir_psv' => $laba_rugi_berjalan
						);
						$update_temp = $this->lapneracamodel_baru->update_temp2($datalr,$idlr);				
					}else{
						$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_tanpa_0_hanya_header2( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
						$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_tanpa_0_hanya_header2();
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
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataAktiva,$id);
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
						$this->db->insert('web_temp2', $dataTM);
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
						$this->db->insert('web_temp2', $datalr); 
					}
				
				}else{	
					$total_aktiva = $this->lapneracamodel_baru->get_total_neraca_aktiva_tanpa_02($tgl_trans,$this->session->userdata('id_user'));
					$total_pasiva = $this->lapneracamodel_baru->get_total_neraca_pasiva_tanpa_02($tgl_trans,$this->session->userdata('id_user'));
					if($total_aktiva > $total_pasiva){
						$temp_aktiva = $this->lapneracamodel_baru->insert_temp_aktiva_tanpa_02( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
						$data_pasiva = $this->lapneracamodel_baru->get_data_pasiva_tanpa_02();
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
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataPasiva,$id);
							$id++;	
						}
						$idT = $id+1;
						$dataTM = array(
							'nama_perk_psv' => 'Total Modal',
							'saldo_akhir_psv' => $total_modal
						);
						$update_temp = $this->lapneracamodel_baru->update_temp2($dataTM,$idT);
						$idlr = $idT+1;
						$datalr = array(
							'nama_perk_psv' => 'Laba Rugi Berjalan',
							'saldo_akhir_psv' => $laba_rugi_berjalan
						);
						$update_temp = $this->lapneracamodel_baru->update_temp2($datalr,$idlr);				
					}else{
						$temp_pasiva = $this->lapneracamodel_baru->insert_temp_pasiva_tanpa_02( $tgl_trans,$this->session->userdata('id_user'));
						$total_modal  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
						$laba_rugi_berjalan = $this->lapneracamodel_baru->get_labarugi_berjalan2();
						$data_aktiva = $this->lapneracamodel_baru->get_data_aktiva_tanpa_02();
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
							$update_temp = $this->lapneracamodel_baru->update_temp2($dataAktiva,$id);
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
						$this->db->insert('web_temp2', $dataTM);
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
						$this->db->insert('web_temp2', $datalr); 
					}
				}	
			}
		}
	}
	
	function print_neraca_t($tgl,$nol,$tipe){
			$timestamp  = strtotime($tgl);
			$tgl_trans  = date('Y-m-d', $timestamp);
			$delete = $this->lapneracamodel_baru->deleteTempPerk($tgl_trans,$this->session->userdata('id_user'));
			$deleteTemp = $this->lapneracamodel_baru->deleteTemp($tgl_trans,$this->session->userdata('id_user'));
			$this->db->query("ALTER TABLE web_temp AUTO_INCREMENT 1");
			
			$tgl2 = date('Y-m-t', strtotime('-1 month', strtotime($tgl_trans)));
			$this->cetak_t($tgl2,$nol,$tipe);
			
			$data ['total_aktiva'] = $this->lapneracamodel_baru->get_total_aktiva($tgl2);
			$data ['total_pasiva'] = $this->lapneracamodel_baru->get_total_pasiva($tgl2);
			$data ['total_modal']  = $this->lapneracamodel_baru->get_total_modal($tgl2);
			$data ['laba_rugi_berjalan'] = $this->lapneracamodel_baru->get_labarugi_berjalan();
			
			$delete2 = $this->lapneracamodel_baru->deleteTempPerk2($tgl_trans,$this->session->userdata('id_user'));
			$deleteTemp2 = $this->lapneracamodel_baru->deleteTemp2($tgl_trans,$this->session->userdata('id_user'));
			$this->db->query("ALTER TABLE web_temp2 AUTO_INCREMENT 1");
			$this->cetak_t2($tgl_trans,$nol,$tipe);
			
			$data ['neraca'] = $this->lapneracamodel_baru->get_data_neraca_t($tgl_trans,$this->session->userdata('id_user'));
			
			$data ['total_aktiva2'] = $this->lapneracamodel_baru->get_total_aktiva2($tgl_trans);
			$data ['total_pasiva2'] = $this->lapneracamodel_baru->get_total_pasiva2($tgl_trans);
			$data ['total_modal2']  = $this->lapneracamodel_baru->get_total_modal2($tgl_trans);
			$data ['laba_rugi_berjalan2'] = $this->lapneracamodel_baru->get_labarugi_berjalan2();
			
			$info = $this->setting_laporan_m->getAllSetting();
			foreach($info as $i){
				$nama = $i->pt;
				$kantor = $i->kantor;
				$alamat = $i->alamat;
			}
			
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] = trim($nama);
			$data['tower'] = trim($kantor);
			$data['alamat'] = trim($alamat);
			$data['laporan']= 'Laporan Posisi Keuangan per ';
			$data['user'] 	= $this->session->userdata('username');
			$data['tgl'] 	= $tgl2;
			$data['tgl2'] 	= $tgl_trans;
			//echo json_encode($data['neraca']);
			$this->load->view('cetak/cetak_laporan_neraca_t_baru',$data);
	}
}

 

/* End of file main.php */
/* Location: ./application/controllers/kasumum.php */
