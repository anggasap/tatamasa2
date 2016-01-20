<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_seat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('booking_m');
		$this->load->model('kasir_m');
		$this->load->model('booking_seat_m');
		$this->load->model('master_advance_m');
		$this->load->model('budgeti_perk_m');
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
		$menuId = $this->home_m->get_menu_id('booking_seat/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['proyek'] = $this->master_advance_m->getProyek();

		if(isset($_POST["btnSimpan"])){
			$this->pilih_rumah();
		}elseif(isset($_POST["btnUbah"])){
			$this->ubah();
		}elseif(isset($_POST["btnHapus"])){
			$this->hapus();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);

			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'transaksi/booking_seat_select_proyek_v',$data );
		}
	}

	function pilih_rumah(){
		$menuId = $this->home_m->get_menu_id('booking_seat/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );

		$proyek			= trim($this->input->post('proyek'));
		$modelNamaProyek =$this->budgeti_perk_m->getNamaProyek($proyek);
		$data['nama_proyek'] = $modelNamaProyek[0]->nama_proyek;


		$data['rumah'] = $this->booking_seat_m->getRumahAll($proyek);

		$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
		$data['menu_all'] = $this->user_m->get_menu_all(0);

		$this->template->set ( 'title', $data['menu_nama'] );
		$this->template->load ( 'template/template3', 'transaksi/booking_seat_select_home_v',$data );

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