<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jurnal_adv extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_advance_m');
		$this->load->model('jurnal_adv_m');
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
		$menuId = $this->home_m->get_menu_id('jurnal_adv/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
        //$data['id'] = $this->jurnal_adv_m->getIdPp();
		$data['proyek'] = $this->master_advance_m->getProyek();
		$data['jnsadvance'] = $this->jurnal_adv_m->getJnsadvanceAll();
		$data['payto'] = $this->jurnal_adv_m->getKaryawanAll();
       
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
			$this->template->load ( 'template/template3', 'transaksi/jurnal_adv_v',$data );
		}
	}
	
	public function getAdvAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_advance_m->getAdvAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUang = number_format($row->jml_uang,2);
			$array = array(
					'idAdv' => trim($row->id_advance),
					'namaReq' => trim($row->nama_kyw),
					'jmlUang' =>  $jmlUang
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
	function getDescAdvCashFlow(){
		$this->CI =& get_instance();
		$idAdv = $this->input->post ( 'idAdv', TRUE );
		$rows = $this->master_advance_m->getDescAdv( $idAdv );
		if($rows){
			foreach ( $rows as $row )
				//$cflow = $this->jurnal_adv_m->getDescAdvCflow($idAdv);
				$tgl_trans = date ( 'd-m-Y', strtotime ( $row->tgl_trans ) );
				$jml_uang = number_format($row->jml_uang,2);
				$array = array (
						'baris'=>1,
						'id_kyw' => $row->id_kyw,
						'nama_kyw'=>$row->nama_kyw,
						'nama_dept'=>$row->nama_dept,
						'jml_uang' => $jml_uang,
						'tgl_trans' => $tgl_trans,
						'pay_to' => $row->pay_to,
						'nama_akun_bank' => $row->nama_akun_bank,
						'no_akun_bank' => $row->no_akun_bank,
						'nama_bank' => $row->nama_bank,
						'keterangan' => $row->keterangan,
						'id_proyek' => $row->id_proyek

				);
		}else{
			$array=array('baris'=>0);
		}
		$this->output->set_output(json_encode($array));
	}
	public function getPpAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->jurnal_adv_m->getPempAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUang = number_format($row->jml_uang,2);
			$array = array(
					'idPp' 		=> trim($row->id_pp),
					'idAdv' 	=> trim($row->id_advance),
					'namaKyw' 	=> trim($row->nama_kyw),
					'dept' 		=> trim($row->nama_dept),
					'jmlUang' 	=> $jmlUang
			);
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescAdv(){
		$this->CI =& get_instance();
		$idAdv = $this->input->post ( 'idAdv', TRUE );
		$rows = $this->master_advance_m->getDescAdv( $idAdv );
		if($rows){
			foreach ( $rows as $row )
				$tgl_jt = date ( 'd-m-Y', strtotime ( $row->tgl_jt ) );
				$tglTrans = date ( 'd-m-Y', strtotime ( $row->tgl_trans ) );
				$jml_uang = number_format($row->jml_uang,2);
				$array = array (
						'baris'=>1,
						'id_kyw' => $row->id_kyw,
						'nama_kyw'=>$row->nama_kyw,
						'nama_dept'=>$row->nama_dept,
						'jml_uang' => $jml_uang,
                        'id_proyek' => $row->id_proyek,
                        'id_kurs' => $row->id_kurs,
                        'nilai_kurs' => $row->nilai_kurs,
						'tgl_trans'	=>$tglTrans,
						'tgl_jt' => $tgl_jt,
						'pay_to' => $row->pay_to,
						'nama_akun_bank' => $row->nama_akun_bank,
						'no_akun_bank' => $row->no_akun_bank,
						'nama_bank' => $row->nama_bank,
						'keterangan' => $row->keterangan
				);
		}else{
			$array=array('baris'=>0);
		}
		$this->output->set_output(json_encode($array));
	}
	
	function getDescJadv(){
		$this->CI =& get_instance();
		$idJadv = $this->input->post ('idJadv',TRUE);
		$rows = $this->jurnal_adv_m->getDescJadva($idJadv);
		if($rows){
			foreach($rows as $row){
				$tgl = date ( 'd-m-Y',strtotime($row->tgl_trans));
				$amount = number_format($row->jumlah,2);
				$array = array(
						'baris'=>1,
						'id_pp' => $row->id_pp,
						'id_advance' => $row->id_advance,
						'tgl_trans'=>$tgl,
                        'jumlah' => $amount,
						'kodePerk'	=>$row->kode_perk,
						'kodeAlt'	=>$row->kode_alt,
						'namaPerk'	=>$row->nama_perk,
						'kodeCflow'	=>$row->kode_cflow,
						'kodeAltCflow'=>$row->kode_altCflow,
						'namaCflow'	=>$row->nama_cflow,
                        'type_adv' => $row->type_adv
						);
			}			
		}else{
			$array=array('baris'=>0);
		}
		$this->output->set_output(json_encode($array));
	}
	
    function simpan(){

        //$idPp			= trim($this->input->post('idJAdvance'));

		//$episodeNo		= trim($this->input->post('episodeNo'));
		//$cGiro			= trim($this->input->post('checkGiro'));
		//$tglGiro		= trim($this->input->post('tgl'));
		//$tglGiro 		= date('Y-m-d',strtotime($tglGiro));
		$idAdv			= trim($this->input->post('idAdvance'));
		$tglTrans			= trim($this->input->post('tgltrans'));//
		$tglTrans = date('Y-m-d', strtotime($tglTrans));
		$jumlah			= str_replace(',', '', trim($this->input->post('jumlah')));
        $typeAdv		= trim($this->input->post('jnsadvance'));
		$kodePerk		= trim($this->input->post('kodePerk'));
		$kodeCflow		= trim($this->input->post('kodeCflow'));
		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
		$idPp 			= $this->jurnal_adv_m->getIdPp($bulan,$tahun);
        $data = array(
            'id_pp'		      	=> $idPp,
            'tgl_trans'		    => $tglTrans,
            'id_advance'		=> $idAdv,
        	'jumlah'		    => $jumlah,
        	'kode_perk'			=> $kodePerk,
        	'kode_cflow'		=> $kodeCflow,
        	'type_adv'			=> $typeAdv
        );
        $model = $this->jurnal_adv_m->insertJadv($data);
        if($model){
    		$array = array(
    			'act'	=>1,
    			'tipePesan'=>'success',
    			'pesan' =>'Data berhasil disimpan.'
    		);
    	}else{
    		$array = array(
    			'act'	=>0,
    			'tipePesan'=>'error',
    			'pesan' =>'Data gagal disimpan.'
    		);
    	}
        $this->output->set_output(json_encode($array));
    }
	
    function ubah(){
    	/*$idPp				= trim($this->input->post('idJAdvance'));
		$idAdv				= trim($this->input->post('idAdvance'));
        $tglPp				= date('Y-m-d');
		$episodeNo			= trim($this->input->post('episodeNo'));
		$cGiro				= trim($this->input->post('checkGiro'));
		$tglGiro			= trim($this->input->post('tgl'));
		$tglGiro 			= date('Y-m-d',strtotime($tglGiro));
		$amount				= str_replace(',', '', trim($this->input->post('amount')));
        $originalAmount		= str_replace(',', '', trim($this->input->post('originalAmount')));*/

		$idPp				= trim($this->input->post('idJAdvance'));
		$idAdv			= trim($this->input->post('idAdvance'));
		$tglTrans			= trim($this->input->post('tgltrans'));//
		$tglTrans = date('Y-m-d', strtotime($tglTrans));
		$jumlah			= str_replace(',', '', trim($this->input->post('jumlah')));
		$typeAdv		= trim($this->input->post('jnsadvance'));
		$kodePerk		= trim($this->input->post('kodePerk'));
		$kodeCflow		= trim($this->input->post('kodeCflow'));

        $data = array(
				'tgl_trans'		    => $tglTrans,
				'id_advance'		=> $idAdv,
				'jumlah'		    => $jumlah,
				'kode_perk'			=> $kodePerk,
				'kode_cflow'		=> $kodeCflow,
				'type_adv'			=> $typeAdv
        );
    	$model = $this->jurnal_adv_m->updateJadv($data,$idPp);
    	if($model){
    		$array = array(
    			'act'	=>1,
    			'tipePesan'=>'success',
    			'pesan' =>'Data berhasil diubah.'
    		);
    	}else{
    		$array = array(
    			'act'	=>0,
    			'tipePesan'=>'error',
    			'pesan' =>'Data gagal diubah.'
    		);
    	}
    	$this->output->set_output(json_encode($array));
    }
    function hapus(){
    	$this->CI =& get_instance();
    	$idJadvance			= trim($this->input->post('idJAdvance'));
    	$model = $this->jurnal_adv_m->deleteJadv( $idJadvance);
    	if($model){
    		$array = array(
    			'act'	=>1,
    			'tipePesan'=>'success',
    			'pesan' =>'Data berhasil dihapus.'
    		);
    	}else{
    		$array = array(
    			'act'	=>0,
    			'tipePesan'=>'error',
    			'pesan' =>'Data gagal dihapus.'
    		);
    	}
    	$this->output->set_output(json_encode($array));
    }
    function cetak($idJadv)
    {
    	if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
    		$data ['Jadvance'] = $this->jurnal_adv_m->getJadvById($idJadv);
    		$this->load->view('cetak/cetak_perintah_pembayaran_advance',$data);
    	}
    }
	

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */