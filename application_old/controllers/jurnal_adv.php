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
		$rows = $this->jurnal_adv_m->getAdvAll();
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
	
	function getCashFlow(){
		$this->CI =& get_instance();
		$idAdv = $this->input->post ( 'idAdv', TRUE );
		$rows = $this->jurnal_adv_m->getIdCf($idAdv);
		if($rows){
			foreach ( $rows as $row )
				$array = array (
						'baris'=>1,
						'id_cf' => $row->kode_cflow
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
						'baris'			=>1,
						'id_pp' 		=> $row->id_pp,
						'id_advance' 	=> $row->id_advance,
						'tgl_trans'		=> $tgl,
                        'jumlah' 		=> $amount,
						'id_account' 	=> $row->type_adv,
						'nama_account' 	=> $row->nama_account,
						'kode_bayar' 	=> $row->kode_bayar,
						'nama_kdbayar'	=> $row->nama_kdbayar
						);
			}			
		}else{
			$array=array('baris'=>0);
		}
		$this->output->set_output(json_encode($array));
	}
	
	function getTypeAdv(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->jurnal_adv_m->getTypeAdv();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$array = array(
					'id_account' => trim($row->id_account),
					'nama' => trim($row->nama_account),
					'norek' =>  trim($row->nama_account),
					'kode_perk' => trim($row->kode_perk),
			);
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
    function simpan(){
        $idAdv			= trim($this->input->post('idAdvance'));
		$tglTrans		= trim($this->input->post('tgltrans'));//
		$tglTrans 		= date('Y-m-d', strtotime($tglTrans));
		$jumlah			= str_replace(',', '', trim($this->input->post('jumlah')));
        $typeAdv		= trim($this->input->post('idUm'));
		$kodeBayar		= trim($this->input->post('kodeBayar'));
		$bulan 			= date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun 			= date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
		$idPp 			= $this->jurnal_adv_m->getIdPp($bulan,$tahun);
        $data_model1 = array(
            'id_pp'		      	=> $idPp,
            'tgl_trans'		    => $tglTrans,
            'id_advance'		=> $idAdv,
        	'jumlah'		    => $jumlah,
        	'type_adv'			=> $typeAdv,
			'kode_bayar'		=> $kodeBayar
        );
        $model1 = $this->jurnal_adv_m->insertJadv($data_model1);
		/*Update status pp di master advance*/
		if($model1){
			$data_model2 = array(
					'status_pp'		      	=> 1
			);
			$model2 = $this->jurnal_adv_m->updateAdv_statusPP($data_model2,$idAdv);
		}
        if($model1 && $model2){
    		$array = array(
    			'act'	=>1,
				'id' 	=>$idPp,
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
    	$idPp			= trim($this->input->post('idJAdvance'));
		$idAdv			= trim($this->input->post('idAdvance'));
		$tglTrans		= trim($this->input->post('tgltrans'));//
		$tglTrans 		= date('Y-m-d', strtotime($tglTrans));
		$jumlah			= str_replace(',', '', trim($this->input->post('jumlah')));
        $typeAdv		= trim($this->input->post('idUm'));
		$kodeBayar		= trim($this->input->post('kodeBayar'));
		$bulan 			= date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun 			= date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
		
		$data = array(
            'id_pp'		      	=> $idPp,
            'tgl_trans'		    => $tglTrans,
            'id_advance'		=> $idAdv,
        	'jumlah'		    => $jumlah,
        	'type_adv'			=> $typeAdv,
			'kode_bayar'		=> $kodeBayar
        );
    	$model = $this->jurnal_adv_m->updateJadv($data,$idPp);
    	if($model){
    		$array = array(
    			'act'	=>1,
				'id'	=> $idPp,
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