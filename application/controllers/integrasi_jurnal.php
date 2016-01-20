<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Integrasi_jurnal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('integrasi_jurnal_m');
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
		$menuId = $this->home_m->get_menu_id('integrasi_jurnal/home');
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
			$this->template->load ( 'template/template3', 'admin/integrasi_jurnal_v',$data );
		}
	}
	public function getAllJurnal(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->integrasi_jurnal_m->getAllJurnal();
		$data['data'] = array();
		foreach( $rows as $row ) {
		  	$array = array(
					'id_integrasi' => trim($row->id_integrasi),
					'nama_integrasi' => trim($row->nama_integrasi),
                    'kode_perk' => trim($row->kode_perk),
					'nama_perk'=>trim($row->nama_perk),
					'keterangan'=>trim($row->keterangan)
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}

    function simpan(){
        //$idJurnal			= trim($this->input->post('jurnalId'));
        $namaJurnal		    = trim($this->input->post('namaJurnal'));
		$GL		   	 		= trim($this->input->post('GL'));
		$keterangan		    = trim($this->input->post('keterangan'));
               
        //$modelidrumah = $this->integrasi_jurnal_m->getIdRumah($idProyek);
        $data = array(
            //'id_integrasi'		    =>$idJurnal,
            'nama_integrasi'		=>$namaJurnal,
            'kode_perk'		        =>$GL,
			'keterangan'		    =>$keterangan
        );
        $model = $this->integrasi_jurnal_m->simpan($data);
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
		$idJurnal			= trim($this->input->post('jurnalId'));
		$namaJurnal		    = trim($this->input->post('namaJurnal'));
		$GL		   	 		= trim($this->input->post('GL'));
		$keterangan		    = trim($this->input->post('keterangan'));

		$data = array(
				'nama_integrasi'		=>$namaJurnal,
				'kode_perk'		        =>$GL,
				'keterangan'		    =>$keterangan
		);
    	
    	$model = $this->integrasi_jurnal_m->ubah($data,$idJurnal);
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
		$idJurnal			= trim($this->input->post('idJurnal'));
        $model = $this->integrasi_jurnal_m->hapus( $idJurnal);
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
        
    	//$cekMasterAdv	= $this->master_rumah_m->cekMasterAdvance($kywId);
//    	$cekMasterReqpay	= $this->master_rumah_m->cekMasterReqpay($kywId);
//    	$cekMasterReimpay	= $this->master_rumah_m->cekMasterReimpay($kywId);
    	/**
 * if($cekMasterAdv == true && $cekMasterReqpay ==true && $cekMasterReimpay ==true){
 *     		$model = $this->master_rumah_m->deleteProyek( $kywId);
 *     		if($model){
 *     			$array = array(
 *     					'act'	=>1,
 *     					'tipePesan'=>'success',
 *     					'pesan' =>'Data berhasil dihapus.'
 *     			);
 *     		}else{
 *     			$array = array(
 *     					'act'	=>0,
 *     					'tipePesan'=>'error',
 *     					'pesan' =>'Data gagal dihapus.'
 *     			);
 *     		}
 *     	}else{
 *     		$array = array(
 *     				'act'	=>0,
 *     				'tipePesan'=>'error',
 *     				'pesan' =>'Data digunakan pada data master yang lain.</br>Data gagal dihapus.'
 *     		);
 *     	}
 */
    	
    	$this->output->set_output(json_encode($array));
    }
	

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */