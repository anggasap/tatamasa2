<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('penjualan_m');
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
	function getDescRumah(){
		$this->CI =& get_instance();
		$idRumah = $this->input->post ( 'idRumah', TRUE );
		$rows = $this->penjualan_m->getDescRumah( $idRumah );
		if($rows){
			foreach ( $rows as $row )
				$luas = number_format($row->luas,2);
			$harga = number_format($row->harga,2);
			$array = array (
					'baris'=>1,
				//'id_rumah' => $row->id_rumah,
					'id_proyek' => $row->id_proyek,
					'nama_proyek'=>$row->nama_proyek,
					'nama_rumah'=>$row->nama_rumah,
					'type'=>$row->tipe,
					'blok'=>$row->blok,
					'luas' => $luas,
					'harga' =>$harga,
					'status_jual'=>$row->status_jual
				//'' => $row->
			);
		}else{
			$array=array('baris'=>0);
		}

		$this->output->set_output(json_encode($array));
	}
	function getDescRumahBooked(){
		$this->CI =& get_instance();
		$idRumah = $this->input->post ( 'idRumah', TRUE );
		$rows = $this->penjualan_m->getDescRumahBooked( $idRumah );
		if($rows){
			foreach ( $rows as $row )
				$luas = number_format($row->luas,2);
				$booking = number_format($row->booking,2);
				$harga = number_format($row->harga,2);
			$array = array (
					'baris'=>1,
				//'id_rumah' => $row->id_rumah,
					'id_proyek' => $row->id_proyek,
					'nama_proyek'=>$row->nama_proyek,
					'nama_rumah'=>$row->nama_rumah,
					'type'=>$row->tipe,
					'blok'=>$row->blok,
					'luas' => $luas,
					'booking'	=>$booking,
					'harga' =>$harga,
					'status_jual'=>$row->status_jual,
					'id_cust'=>$row->id_cust,
					'alamat'=>$row->alamat,
					'nama_cust'=>$row->nama_cust,
					'no_id'=>$row->no_id,
					'no_hp'=>$row->no_hp,
					'no_telp' => $row->no_telp
				//'' => $row->
			);
		}else{
			$array=array('baris'=>0);
		}

		$this->output->set_output(json_encode($array));
	}
	public function getRumahAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->penjualan_m->getRumahAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$harga = number_format(trim($row->harga),2);

			if($row->status_jual == '0'){
				$status_jual ="Available";
			}else if($row->status_jual == '1'){
				$status_jual ="Booked";
			}if($row->status_jual == '2'){
				$status_jual ="Terjual";
			}
			$array = array(
					'id_rumah' => trim($row->id_rumah),
					'nama_proyek' => trim($row->nama_proyek),
					'nama_rumah' => trim($row->nama_rumah),
					'luas' => trim($row->luas),
					'harga' => $harga,
					'status_jual'=>$status_jual
			);

			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('penjualan/home');
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
			$this->template->load ( 'template/template3', 'transaksi/penjualan_v',$data );
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

		if($namaRumah =='' || $hargaRumah == 0){
			$array = array(
					'act'	=>0,
					'tipePesan'=>'error',
					'pesan' =>'Rumah gagal dibooking.<br>Silahkan lengkapi data master rumah terlebih dahulu.'
			);
		}else{
			$data_master = array(
					'penjualan'		    =>$hargaBooking,
					'status_jual'		=>'1'
			);

			$model_master = $this->penjualan_m->ubah($data_master,$rumahId);

			$data_trans = array(
					'tgl_trans'		=>$tglTrans,
					'id_cust'		=>$idCustomer,
					'id_rumah'		=>$rumahId,
					'kode_trans'	=>'400',
					'jml_trans'		=>$hargaBooking,
					'keterangan'	=>$keterangan

			);

			$model_trans = $this->penjualan_m->simpan_trans($data_trans);

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