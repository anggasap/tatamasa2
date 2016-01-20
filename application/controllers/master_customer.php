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
					'no_id' => trim($row->no_id),
					'nama_cust' => trim($row->nama_cust),
                    'alamat' => trim($row->alamat),
					'email' => trim($row->email),
                    'no_hp' => trim($row->no_hp),
					'no_telp'=>trim($row->no_telp),
					'no_npwp'=>trim($row->no_npwp),
					'nama_npwp'=>trim($row->nama_npwp),
					'alamat_npwp'=>trim($row->alamat_npwp),
					'no_akun_bank'=>trim($row->no_akun_bank),
					'bank_akun_bank'=>trim($row->bank_akun_bank),
					'kode_perk'=>trim($row->kode_perk),
					'no_va'=>trim($row->no_va),
					'nama_va'=>trim($row->nama_va),
					'bank_va'=>trim($row->bank_va)
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescCust()
	{
		$this->CI =& get_instance();
		$idCust = $this->input->post('idCust', TRUE);
		$rows = $this->master_customer_m->getDescCust($idCust);
		if ($rows) {
			foreach ($rows as $row)
			$array = array(
					'baris' => 1,
					'id_cust' => trim($row->id_cust),
					'no_id' => trim($row->no_id),
					'nama_cust' => trim($row->nama_cust),
					'alamat' => trim($row->alamat),
					'email' => trim($row->email),
					'no_hp' => trim($row->no_hp),
					'no_telp'=>trim($row->no_telp),
					'no_npwp'=>trim($row->no_npwp),
					'nama_npwp'=>trim($row->nama_npwp),
					'alamat_npwp'=>trim($row->alamat_npwp),
					'no_akun_bank'=>trim($row->no_akun_bank),
					'bank_akun_bank'=>trim($row->bank_akun_bank),
					'kode_perk'=>trim($row->kode_perk),
					'nama_perk'=>trim($row->nama_perk),
					'no_va'=>trim($row->no_va),
					'nama_va'=>trim($row->nama_va),
					'bank_va'=>trim($row->bank_va)
			);
		} else {
			$array = array('baris' => 0);
		}

		$this->output->set_output(json_encode($array));
	}

    function simpan(){
		$noId		    = trim($this->input->post('noId'));
        $namaCustomer	= trim($this->input->post('namaCustomer'));
		$alamat		    = trim($this->input->post('alamat'));
		$email		    = trim($this->input->post('email'));
        $noHp		    = trim($this->input->post('noHp'));
        $noTelp		    = trim($this->input->post('noTelp'));
		$noNpwp		    = trim($this->input->post('noNpwp'));
		$namaNpwp		    = trim($this->input->post('namaNpwp'));
		$alamatNpwp		    = trim($this->input->post('alamatNpwp'));
		$kodePerk		    = trim($this->input->post('GL'));
		$noRek		    = trim($this->input->post('noRek'));
		$bankRek		    = trim($this->input->post('bankRek'));
		$noVA		    = trim($this->input->post('noVA'));
		$namaVA		    = trim($this->input->post('namaVA'));
		$bankVA		    = trim($this->input->post('bankVA'));
               
        $modelidcust = $this->master_customer_m->getIdCustomer();

        $data = array(
            'id_cust'		    =>$modelidcust,
			'no_id'		        =>$noId,
			'nama_cust'		    =>$namaCustomer,
            'alamat'		    =>$alamat,
			'email'		        =>$email,
			'no_hp'		        =>$noHp,
            'no_telp'		    =>$noTelp,
			'no_npwp'		    =>$noNpwp,
			'nama_npwp'		    =>$namaNpwp,
			'alamat_npwp'		=>$alamatNpwp,
			'kode_perk'			=>$kodePerk,
			'no_akun_bank'		=>$noRek,
			'bank_akun_bank'	=>$bankRek,
			'no_va'				=>$noVA,
			'nama_va'			=>$namaVA,
			'bank_va'			=>$bankVA
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
		$idCustomer		= trim($this->input->post('customerId'));
		$noId		    = trim($this->input->post('noId'));
		$namaCustomer	= trim($this->input->post('namaCustomer'));
		$alamat		    = trim($this->input->post('alamat'));
		$email		    = trim($this->input->post('email'));
		$noHp		    = trim($this->input->post('noHp'));
		$noTelp		    = trim($this->input->post('noTelp'));
		$noNpwp		    = trim($this->input->post('noNpwp'));
		$namaNpwp		    = trim($this->input->post('namaNpwp'));
		$alamatNpwp		    = trim($this->input->post('alamatNpwp'));
		$kodePerk		    = trim($this->input->post('GL'));
		$noRek		    = trim($this->input->post('noRek'));
		$bankRek		    = trim($this->input->post('bankRek'));
		$noVA		    = trim($this->input->post('noVA'));
		$namaVA		    = trim($this->input->post('namaVA'));
		$bankVA		    = trim($this->input->post('bankVA'));

		$data = array(
				'no_id'		        =>$noId,
				'nama_cust'		    =>$namaCustomer,
				'alamat'		    =>$alamat,
				'email'		        =>$email,
				'no_hp'		        =>$noHp,
				'no_telp'		    =>$noTelp,
				'no_npwp'		    =>$noNpwp,
				'nama_npwp'		    =>$namaNpwp,
				'alamat_npwp'		=>$alamatNpwp,
				'kode_perk'			=>$kodePerk,
				'no_akun_bank'		=>$noRek,
				'bank_akun_bank'	=>$bankRek,
				'no_va'				=>$noVA,
				'nama_va'			=>$namaVA,
				'bank_va'			=>$bankVA
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