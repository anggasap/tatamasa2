<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_reqpay extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_reqpay_m');
		$this->load->model('master_advance_m');
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
		$menuId = $this->home_m->get_menu_id('master_reqpay/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
        //$data['dept'] = $this->master_advance_m->get_dept();
		$data['proyek'] = $this->master_advance_m->getProyek();
		$data['kurs'] = $this->master_advance_m->getKurs();
       
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
			$this->template->load ( 'template/template3', 'master/master_reqpay_v',$data );
		}
	}
	/* public function getKywAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_advance_m->getKywAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$array = array(
					'idKyw' => trim($row->id_kyw),
					'namaKyw' => trim($row->nama_kyw),
					'deptKyw' =>  trim($row->nama_dept)
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	} */
	public function getReqpayAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_reqpay_m->getReqpayAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUang = number_format($row->jml_uang,2);
			$array = array(
					'idReqpay' => trim($row->id_reqpay),
					'namaReq' => trim($row->nama_kyw),
					'jmlUang' =>  $jmlUang
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescReqpay(){
		$this->CI =& get_instance();
		$idReqpay = $this->input->post ( 'idReqpay', TRUE );
		$rows = $this->master_reqpay_m->getDescReqpay( $idReqpay );
		if($rows){
			foreach ( $rows as $row )
				$tgl_jt = date ( 'd-m-Y', strtotime ( $row->tgl_jt ) );
				$jml_uang = number_format($row->jml_uang,2);
				$array = array (
						'baris'=>1,
						'id_kyw' => $row->id_kyw,
						'nama_kyw'=>$row->nama_kyw,
						'nama_dept'=>$row->nama_dept,
						'no_invoice'=>$row->no_invoice,
						'no_po'=>$row->no_po,
						'jml_uang' => $jml_uang,
						'id_proyek' => $row->id_proyek,
						'id_kurs' => $row->id_kurs,
						'nilai_kurs' => $row->nilai_kurs,
						'tgl_jt' => $tgl_jt,
						'pay_to' => $row->pay_to,
						'nama_spl' => $row->nama_spl,
						'nama_akun_bank' => $row->nama_akun_bank,
						'no_akun_bank' => $row->no_akun_bank,
						'nama_bank' => $row->nama_bank,
						'keterangan' => $row->keterangan,
						'dok_fpe'		        	=>$row->dok_fpe,
						'dok_kuitansi'		        =>$row->dok_kuitansi,
						'dok_fpa'		        	=>$row->dok_fpa,
						'dok_po'		        	=>$row->dok_po,
						'dok_suratjalan'		    =>$row->dok_suratjalan,
						'dok_lappenerimaanbrg'		=>$row->dok_lappenerimaanbrg,
						'dok_bast'		        	=>$row->dok_bast,
						'dok_bap'		        	=>$row->dok_bap,
						'dok_cop'		        	=>$row->dok_cop,
						'dok_ssp'		        	=>$row->dok_ssp,
						'dok_sspk'		        	=>$row->dok_sspk,
						'dok_sbj'		        	=>$row->dok_sbj
						/* 'app_keuangan_id' => $row->app_keuangan_id,
						'app_hd_id' => $row->app_hd_id,
						'app_gm_id' => $row->app_gm_id,
						'app_keuangan_status' => $row->app_keuangan_status,
						'app_hd_status' => $row->app_hd_status,
						'app_gm_status' => $row->app_gm_status,
						'app_keuangan_tgl' => $row->app_keuangan_tgl,
						'app_hd_tgl' => $row->app_hd_tgl,
						'app_gm_tgl' => $row->app_gm_tgl,
						'app_keuangan_ket' => $row->app_keuangan_ket,
						'app_hd_ket' => $row->app_hd_ket,
						'app_gm_ket' => $row->app_gm_ket */
						//'' => $row->
						
				);
		}else{
			$array=array('baris'=>0);
		}
	
		$this->output->set_output(json_encode($array));
	}
	
    function simpan(){
        $idKyw			= trim($this->input->post('kywId'));
        $noInv			= trim($this->input->post('noInvoice'));
        $noPO			= trim($this->input->post('noPO'));
        $uang			= str_replace(',', '', trim($this->input->post('uang')));
		$idProyek = trim($this->input->post('proyek'));
		$idKurs = trim($this->input->post('kurs'));
		$nilaiKurs = str_replace(',', '', trim($this->input->post('nilaiKurs')));
		$tglTrans = trim($this->input->post('tglTrans'));
		$tglTrans = date('Y-m-d', strtotime($tglTrans));
        $tglJT			= trim($this->input->post('tglJT'));
        $tglJT 			= date ( 'Y-m-d', strtotime ( $tglJT ) );
        $payTo			= trim($this->input->post('splId'));
        $namaPemilikAkunBank			= trim($this->input->post('namaPemilikAkunBank'));
        $noAkunBank			= trim($this->input->post('noAkunBank'));
        $namaBank			= trim($this->input->post('namaBank'));
        $ket			= trim($this->input->post('keterangan'));

		$dokFPE			= trim($this->input->post('dokFPe_in'));
		$dokKuitansi	= trim($this->input->post('dokKuitansi_in'));
		$dokPA			= trim($this->input->post('dokPa_in'));
		$dokPO 			= trim($this->input->post('dokPO_in'));
		$dokSuratJalan	= trim($this->input->post('dokSuratJalan_in'));
		$dokPB			= trim($this->input->post('dokPenBrg_in'));
		$dokBAST		= trim($this->input->post('dokBAST_in'));
		$dokBAP			= trim($this->input->post('dokBAP_in'));
		$dokCOP			= trim($this->input->post('dokCOP_in'));
		$dokSSP			= trim($this->input->post('dokSSP_in'));
		$dokSSPK		= trim($this->input->post('dokSSPK_in'));
		$dokSBJ			= trim($this->input->post('dokSBJ_in'));

        //$ket			= trim($this->input->post(''));

		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");


		$modelidReqpay = $this->master_reqpay_m->getIdReqpay($bulan,$tahun);
        $data = array(
            'id_reqpay'		      		=>$modelidReqpay,
            'id_kyw'		        	=>$idKyw,
        	'no_invoice'		        =>$noInv,
        	'no_po'		        		=>$noPO,
            'jml_uang'		        	=>$uang,
			'id_proyek' 				=> $idProyek,
			'id_kurs' 					=> $idKurs,
			'nilai_kurs' 				=> $nilaiKurs,
			'tgl_trans'					=>$tglTrans,
        	'tgl_jt'		        	=>$tglJT,
        	'pay_to'		        	=>$payTo,
        	'nama_akun_bank'		    =>$namaPemilikAkunBank,
        	'no_akun_bank'				=>$noAkunBank,
        	'nama_bank'		        	=>$namaBank,
        	'keterangan'		        =>$ket,
        	'dok_fpe'		        	=>trim($this->input->post('dokFPe_in')),
        	'dok_kuitansi'		        =>trim($this->input->post('dokKuitansi_in')),
        	'dok_fpa'		        	=>trim($this->input->post('dokPa_in')),
        	'dok_po'		        	=>trim($this->input->post('dokPO_in')),
        	'dok_suratjalan'		    =>trim($this->input->post('dokSuratJalan_in')),
        	'dok_lappenerimaanbrg'		=>trim($this->input->post('dokPenBrg_in')),
        	'dok_bast'		        	=>trim($this->input->post('dokBAST_in')),
        	'dok_bap'		        	=>trim($this->input->post('dokBAP_in')),
        	'dok_cop'		        	=>trim($this->input->post('dokCOP_in')),
        	'dok_ssp'		        	=>trim($this->input->post('dokSSP_in')),
        	'dok_sspk'		        	=>trim($this->input->post('dokSSPK_in')),
        	'dok_sbj'		        	=>trim($this->input->post('dokSSPK_in'))
//        	''		        	=>$,
        );
        $model = $this->master_reqpay_m->insertReqpay($data);
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
    	$idReqpay			= trim($this->input->post('idReqpay'));
    	$idKyw			= trim($this->input->post('kywId'));
        $noInv			= trim($this->input->post('noInvoice'));
        $noPO			= trim($this->input->post('noPO'));
        $uang			= str_replace(',', '', trim($this->input->post('uang')));
		$idProyek = trim($this->input->post('proyek'));
		$idKurs = trim($this->input->post('kurs'));
		$nilaiKurs = str_replace(',', '', trim($this->input->post('nilaiKurs')));
		$tglTrans 		= trim($this->input->post('tglTrans'));
		$tglTrans 		= date('Y-m-d', strtotime($tglTrans));
        $tglJT			= trim($this->input->post('tglJT'));
        $tglJT 			= date ( 'Y-m-d', strtotime ( $tglJT ) );
		$payTo			= trim($this->input->post('splId'));
        $namaPemilikAkunBank			= trim($this->input->post('namaPemilikAkunBank'));
        $noAkunBank			= trim($this->input->post('noAkunBank'));
        $namaBank			= trim($this->input->post('namaBank'));
        $ket			= trim($this->input->post('keterangan'));
    	//$ket			= trim($this->input->post(''));
        $data = array(
        		'id_kyw'		        	=>$idKyw,
        		'no_invoice'		        =>$noInv,
        		'no_po'		        		=>$noPO,
        		'jml_uang'		        	=>$uang,
				'id_proyek' 				=> $idProyek,
				'id_kurs' 					=> $idKurs,
				'nilai_kurs'				=> $nilaiKurs,
				'tgl_trans'					=>$tglTrans,
        		'tgl_jt'		        	=>$tglJT,
        		'pay_to'		        	=>$payTo,
        		'nama_akun_bank'		    =>$namaPemilikAkunBank,
        		'no_akun_bank'				=>$noAkunBank,
        		'nama_bank'		        	=>$namaBank,
        		'keterangan'		        =>$ket,
        		'dok_fpe'		        	=>trim($this->input->post('dokFPe_in')),
        		'dok_kuitansi'		        =>trim($this->input->post('dokKuitansi_in')),
        		'dok_fpa'		        	=>trim($this->input->post('dokPa_in')),
        		'dok_po'		        	=>trim($this->input->post('dokPO_in')),
        		'dok_suratjalan'		    =>trim($this->input->post('dokSuratJalan_in')),
        		'dok_lappenerimaanbrg'		=>trim($this->input->post('dokPenBrg_in')),
        		'dok_bast'		        	=>trim($this->input->post('dokBAST_in')),
        		'dok_bap'		        	=>trim($this->input->post('dokBAP_in')),
        		'dok_cop'		        	=>trim($this->input->post('dokCOP_in')),
        		'dok_ssp'		        	=>trim($this->input->post('dokSSP_in')),
        		'dok_sspk'		        	=>trim($this->input->post('dokSSPK_in')),
        		'dok_sbj'		        	=>trim($this->input->post('dokSSPK_in'))
        		//        	''		        	=>$,
        );
    	
    	$model = $this->master_reqpay_m->updateReqpay($data,$idReqpay);
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
    	$idReqpay			= trim($this->input->post('idReqpay'));
    	$model = $this->master_reqpay_m->deleteReqpay( $idReqpay);
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
	function cetak($idReqPay)
    {
    	if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
    		$data['reqpay'] = $this->master_reqpay_m->getDescReqpay($idReqPay);
    		$this->load->view('cetak/request_for_payment',$data);
    	}
    }

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */