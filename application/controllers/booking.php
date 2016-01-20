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
		$this->load->model('master_rumah_m');
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
	public function getBookingAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->booking_m->getBookingAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$harga = number_format(trim($row->harga),2);
			$booking = number_format(trim($row->booking),2);
			$tgl = date('d-m-Y', strtotime($row->tgl_trans));
			$array = array(
					'kode_booking' => trim($row->master_id),
					'nama_proyek' => trim($row->nama_proyek),
					'nama_rumah' => trim($row->nama_rumah),
					'nama_customer' => trim($row->nama_cust),
					'harga' => $harga,
					'booking' => $booking
			);
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescBooking()
	{
		$this->CI =& get_instance();
		$kodeBooking = $this->input->post('kodeBooking', TRUE);
		$kodeBooking = trim($kodeBooking);
		$rows = $this->booking_m->getDescBooking($kodeBooking);
		if ($rows) {
			foreach ($rows as $row)
				$booking = number_format($row->booking,2,".",",");
			$tgl = date('d-m-Y', strtotime($row->tgl_trans));
			$array = array(
					'baris' => 1,
					'idRumah' => $row->id_rumah,
					'idCustomer' => $row->id_cust,
					'namaCustomer' => $row->nama_cust,
					'noId' => $row->no_id,
					'alamat' => $row->alamat,
					'noHp' => $row->no_hp,
					'noTelp' => $row->no_telp,
					'tglTrans' => $tgl,
					'kode_transaksi' => $row->kode_transaksi,
					'hargaBooking' => $booking,
					'keterangan' => $row->keterangan
			);
		} else {
			$array = array('baris' => 0);
		}

		$this->output->set_output(json_encode($array));
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
	function booked($idRumah){
		$menuId = $this->home_m->get_menu_id('booking/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['info_rumah'] = $this->master_rumah_m->getDescRumah( $idRumah );

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
			$this->template->load ( 'template/template3', 'transaksi/booking_seat_selected_home_v',$data );
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

		$nominalPpn		= str_replace(',', '', trim($this->input->post('nominalPpn')));
		$no_faktur		    = trim($this->input->post('nofaktur'));

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
			$modelidTrans = $this->booking_m->getKodeTrans();

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
					'kode_transaksi'=>$modelidTrans,
					'master_id'		=>$modelidPenj,
					'tgl_trans'		=>$tglTrans,
					'kode_trans'	=>'100',
					'ppn'			=>$nominalPpn,
					'no_faktur'		=>$no_faktur,
					'jml_trans'		=>$hargaBooking,
					'keterangan'	=>$keterangan

			);

			$model_transJual = $this->booking_m->simpan_transJual($data_trans_jual);


			if($model_master){
				$array = array(
						'act'	=>1,
						'kode_penjualan' 	=> $modelidPenj,
						'kode_transaksi' 	=> $modelidTrans,
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
	function cetak($kodeBooking,$kodetr)
	{
		if ($this->auth->is_logged_in() == false) {
			redirect('main/index');
		}else{
			$tglTrans = date('d-m-Y');
			$bulan = date('m', strtotime($tglTrans));
			$tahun = date('Y', strtotime($tglTrans));
			$data['invoice'] = $this->booking_m->getKodeInvoice($bulan,$tahun);
			$data = array(
					'invoice'		=>$data['invoice']
			);
			$update 		= $this->booking_m->updateTransJual($data,$kodetr);
			$data['all'] 	= $this->booking_m->getDataCetak($kodeBooking);
			$this->load->view('cetak/cetak_invoice_booking', $data);
		}
	}


}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */