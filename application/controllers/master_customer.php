<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_customer_m');
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
		$menuId = $this->home_m->get_menu_id('master_customer/home');
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
			$this->template->load ( 'template/template3', 'master/master_customer_v',$data );
		}
	}
	public function getCustomerAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_customer_m->getCustomerAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
		  //$harga = number_format(trim($row->harga),2);
			$array = array(
					'id_cust' => trim($row->id_cust),
					'nama_cust' => trim($row->nama_cust),
                    'alamat' => trim($row->alamat),
                    'no_id' => trim($row->no_id),
                    'no_hp' => trim($row->no_hp),
					'no_telp'=>trim($row->no_telp)
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}

    function simpan(){

        $namaCustomer	= trim($this->input->post('namaCustomer'));
		$alamat		    = trim($this->input->post('alamat'));
		$noId		    = trim($this->input->post('noId'));
        $noHp		    = trim($this->input->post('noHp'));
        $noTelp		    = trim($this->input->post('noTelp'));
               
        $modelidcust = $this->master_customer_m->getIdCustomer();

        $data = array(
            'id_cust'		    =>$modelidcust,
            'nama_cust'		    =>$namaCustomer,
            'alamat'		    =>$alamat,
			'no_id'		        =>$noId,
			'no_hp'		        =>$noHp,
            'no_telp'		    =>$noTelp
        );
        $model = $this->master_customer_m->simpan($data);
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
		$idCustomer	= trim($this->input->post('customerId'));
		$namaCustomer	= trim($this->input->post('namaCustomer'));
		$alamat		    = trim($this->input->post('alamat'));
		$noId		    = trim($this->input->post('noId'));
		$noHp		    = trim($this->input->post('noHp'));
		$noTelp		    = trim($this->input->post('noTelp'));

		$data = array(
				'nama_cust'		    =>$namaCustomer,
				'alamat'		    =>$alamat,
				'no_id'		        =>$noId,
				'no_hp'		        =>$noHp,
				'no_telp'		    =>$noTelp
		);
    	
    	$model = $this->master_customer_m->ubah($data,$idCustomer);
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
    	$idCustomer			= trim($this->input->post('idCustomer'));
        $model = $this->master_customer_m->hapus( $idCustomer);
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
        
    	//$cekMasterAdv	= $this->master_customer_m->cekMasterAdvance($kywId);
//    	$cekMasterReqpay	= $this->master_customer_m->cekMasterReqpay($kywId);
//    	$cekMasterReimpay	= $this->master_customer_m->cekMasterReimpay($kywId);
    	/**
 * if($cekMasterAdv == true && $cekMasterReqpay ==true && $cekMasterReimpay ==true){
 *     		$model = $this->master_customer_m->deleteProyek( $kywId);
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