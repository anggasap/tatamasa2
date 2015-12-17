<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('booking_m');
		$this->load->model('kasir_m');
		$this->load->model('akuntansi_m');
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
	public function getRumahAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->booking_m->getRumahAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$harga = number_format(trim($row->harga),2);
			$array = array(
					'id_rumah' => trim($row->id_rumah),
					'nama_proyek' => trim($row->nama_proyek),
					'nama_rumah' => trim($row->nama_rumah),
					'tipe'=>trim($row->tipe),
					'blok'=>trim($row->blok),
					'luas' => trim($row->luas),
					'harga' => $harga
			);
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('booking/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['kodebayar'] = $this->kasir_m->getKodeBayar();

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
			$this->template->load ( 'template/template3', 'transaksi/booking_v',$data );
		}
	}

	function ubah(){
		$idCustomer			= trim($this->input->post('customerId'));
		$rumahId			= trim($this->input->post('rumahId'));

		$hargaBooking		= str_replace(',', '', trim($this->input->post('hargaBooking')));
		$tglTrans 			= trim($this->input->post('tglTrans'));
		$tglTrans 			= date('Y-m-d', strtotime($tglTrans));
		$keterangan 			= trim($this->input->post('keterangan'));

		$namaRumah		    = trim($this->input->post('namaRumah'));
		/*$typeRumah		    = trim($this->input->post('typeRumah'));
		$blokRumah		    = trim($this->input->post('blokRumah'));
		$luasRumah		    = str_replace(',', '', trim($this->input->post('luasRumah')));*/
		$hargaRumah		    = str_replace(',', '', trim($this->input->post('hargaRumah')));
		$hargaStlBooking 	= $hargaRumah - $hargaBooking;

		if($namaRumah =='' || $hargaRumah <= 0){
			$array = array(
					'act'	=>0,
					'tipePesan'=>'error',
					'pesan' =>'Rumah gagal dibooking.<br>Silahkan lengkapi data master rumah terlebih dahulu.'
			);
		}else{
			// 1. Ubah status master Rumah
			$data_master_rumah = array(
					//'booking'		    =>$hargaBooking,
					'status_jual'		=>'1'
					/*
					 * 0 default non aktif
					 * 1 booking
					 * 2 aktif
					 * 3 lunas
					 * 4 batal
					 * */
			);

			$model_master = $this->booking_m->ubahRumah($data_master_rumah,$rumahId);
			/*-------------------------------------------------------------------*/
			// 2. Insert master jual status booking
			$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
			$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
			$modelidPenj = $this->booking_m->getIdPenj($bulan, $tahun);

			$data_master_jual = array(
					'master_id'		=>$modelidPenj,
					'id_rumah'		=>$rumahId,
					'id_cust'		=>$idCustomer,
					'tgl_trans'		=>$tglTrans,
					'harga'			=>$hargaStlBooking,
					'booking'		=>$hargaBooking,
					'status_jual'		=>'1'

			);

			$model_masterJual = $this->booking_m->simpan_masterJual($data_master_jual);
			/*-------------------------------------------------------------------*/
			// 3. Insert to trans jual booking
			$data_trans_jual = array(
					'master_id'		=>$modelidPenj,
					'tgl_trans'		=>$tglTrans,
					'kode_trans'	=>'100',
					'jml_trans'		=>$hargaBooking,
					'keterangan'	=>$keterangan

			);

			$model_transJual = $this->booking_m->simpan_transJual($data_trans_jual);

			$idProyek = trim($this->input->post('proyek'));
			$modelidJrAR = $this->booking_m->getIdJrAR($bulan, $tahun);
			$modelNoVoucher = $this->kasir_m->getNoVoucher($bulan, $tahun);
			$totJurnal = trim($this->input->post('txtTempLoop'));
			if ($totJurnal > 0) {
				for ($i = 1; $i <= $totJurnal; $i++) {
					$tKodePerk = 'tempKodePerk' . $i;
					$tKodeCflow = 'tempKodeCflow' . $i;
					$tDb = 'tempDb' . $i;
					$tKr = 'tempKr' . $i;
					$tKet = 'tempKet' . $i;

					$tmpKodePerk = trim($this->input->post($tKodePerk));
					$tmpKodeCflow = trim($this->input->post($tKodeCflow));
					$tmpDb = str_replace(',', '', trim($this->input->post($tDb)));
					$tmpKr = str_replace(',', '', trim($this->input->post($tKr)));
					$tmpKet = trim($this->input->post($tKet));

					$jmlCflow = $tmpDb + $tmpKr;

					$data_perk = array(
							'trans_id' => $modelidJrAR,
							'voucher_no'=>$modelNoVoucher,
							'tgl_trans' => $tglTrans,
							'modul'		=>2,
							'kode_jurnal' => 'AR',
							'master_id' => $modelidPenj,
							'id_proyek' => $idProyek,
							'id_dept' => '',
							'kode_perk' => $tmpKodePerk,
							'debet' => $tmpDb,
							'kredit' => $tmpKr,
							'keterangan' => $tmpKet
					);
					$model = $this->akuntansi_m->insertTDPerk($data_perk);
					if($model){
						$idTdPerk = $this->booking_m->getIdTDPerk($modelidJrAR,$tglTrans,$modelidPenj,$idProyek,$tmpKodePerk,$tmpDb,$tmpKr);
						if ($tmpKodeCflow <> '') {
							$data_cflow = array(
									'trans_id' => $modelidJrAR,
									'voucher_no'=>$modelNoVoucher,
									'id_seq_perk'=>$idTdPerk,
									'tgl_trans' => $tglTrans,
									'modul'		=>2,
									'kode_jurnal' => 'AR',
									'master_id' => $modelidPenj,
									'id_proyek' => $idProyek,
									'id_dept' => '',
									'kode_cflow' => $tmpKodeCflow,
									'saldo_akhir' => $jmlCflow,
									'keterangan' => $tmpKet
							);
							$model = $this->akuntansi_m->insertTDCflow($data_cflow);
						}
					}

				}
			}
			if($model_master){
				$array = array(
						'act'	=>1,
						'tipePesan'=>'success',
						'pesan' =>'Rumah berhasil dibooking.'
				);
			}else{
				$array = array(
						'act'	=>0,
						'tipePesan'=>'error',
						'pesan' =>'Rumah gagal dibooking.'
				);
			}
		}

		$this->output->set_output(json_encode($array));
	}


}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */