<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accrue_jadwal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('accrue_jadwal_m');
		$this->load->model('akuntansi_m');
		$this->load->model('booking_m');
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
		$menuId = $this->home_m->get_menu_id('accrue_jadwal/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
               
		if(isset($_POST["btnProses"])){
			$this->proses();
		}elseif(isset($_POST["btnUbah"])){
			$this->ubah();
		}elseif(isset($_POST["btnHapus"])){
			$this->hapus();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);

			$data['jadwalJT'] = $this->accrue_jadwal_m->getJadwalJT($this->session->userdata('tgl_y'));
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'laporan/accrue_jadwal_v',$data );
		}
	}
	function getJadwalJT()
	{
		$this->CI =& get_instance();
		//$idReqpay = $this->input->post('idReqpay', TRUE);
		$crows = $this->accrue_jadwal_m->getCJadwalJT($this->session->userdata('tgl_y'));
		if ($crows <= 0) {
			$array = array('baris' => 0);
			$rows['data_cpa'] = $array;
			$this->output->set_output(json_encode($rows));
		} else {
			$rows = $this->accrue_jadwal_m->getJadwalJT($this->session->userdata('tgl_y'));
			$this->output->set_output(json_encode($rows));
		}
	}
	function proses()
	{
		$tglTrans = $this->session->userdata('tgl_y');
		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

		$totJurnal = trim($this->input->post('txtTempLoop'));
		if ($totJurnal > 0) {
			for ($i = 1; $i <= $totJurnal; $i++) {
				$tIdPenj = 'tempIdPenj' . $i;
				$tIdProyek = 'tempIdProyek' . $i;
				$tKodePerk = 'tempKodePerk' . $i;
				$tJmlTrans = 'tempJmlTrans' . $i;


				$tmpIdPenj = trim($this->input->post($tIdPenj));
				$tmpIdProyek = trim($this->input->post($tIdProyek));
				$tmpKodePerk = trim($this->input->post($tKodePerk));
				$tmpJmlTrans = str_replace(',', '', trim($this->input->post($tJmlTrans)));


				$modelidJrAR = $this->booking_m->getIdJrAR($bulan, $tahun);
				//$modelNoVoucher = $this->kasir_m->getNoVoucher($bulan, $tahun);
				//$tmpKodePerk = '1010201';
				$data_perk = array(
						'trans_id' => $modelidJrAR,
						'voucher_no'=>'',
						'tgl_trans' => $tglTrans,
						'modul'		=>2,
						'kode_jurnal' => 'AR',
						'master_id' => $tmpIdPenj,
						'id_proyek' => $tmpIdProyek,
						'id_dept' => '',
						'kode_perk' => $tmpKodePerk,
						'debet' => $tmpJmlTrans,
						'kredit' => 0,
						'keterangan' => '--Accrue--'
				);
				$model = $this->akuntansi_m->insertTDPerk($data_perk);

				$tmpKodePerk = $this->accrue_jadwal_m->getJurnalPend('7');
				$tmpKodePerk = $tmpKodePerk[0]->kode_perk;
				$data_perk = array(
						'trans_id' => $modelidJrAR,
						'voucher_no'=>'',
						'tgl_trans' => $tglTrans,
						'modul'		=>2,
						'kode_jurnal' => 'AR',
						'master_id' => $tmpIdPenj,
						'id_proyek' => $tmpIdProyek,
						'id_dept' => '',
						'kode_perk' => $tmpKodePerk,
						'debet' => 0,
						'kredit' => $tmpJmlTrans,
						'keterangan' => '--Accrue--'
				);
				$model = $this->akuntansi_m->insertTDPerk($data_perk);
				$data_accr = array(
						'accr'	=> 1
				);

				$model = $this->accrue_jadwal_m->updateAccrStatus($data_accr,$tmpIdPenj,$tglTrans);

			}
		}
		if($model){
			$array = array(
					'act'	=>1,
					'tipePesan'=>'success',
					'pesan' =>'Accrue sukses.'
			);
		}else{
			$array = array(
					'act'	=>0,
					'tipePesan'=>'error',
					'pesan' =>'Accrue gagal.'
			);
		}
		$this->output->set_output(json_encode($array));
	}
	

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */