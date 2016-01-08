<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_reimpay extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_reimpay_m');
		$this->load->model('master_advance_m');
		session_start ();
	}
	function index(){
		if($this->auth->is_logged_in () == false){
			$this->login();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			
			$this->template->set ( 'title', 'Home' );
			$this->template->load ( 'template/template1', 'global/index',$data );
		}
		
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('master_reimpay/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['proyek'] = $this->master_advance_m->getProyek();
		$data['kurs'] = $this->master_advance_m->getKurs();
        //$data['dept'] = $this->master_advance_m->get_dept();
       
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
			$this->template->load ( 'template/template3', 'master/master_reimpay_v',$data );
		}
	}
	function getReimpayAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_reimpay_m->getReimpayAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUang = number_format($row->jml_uang,2);
			$array = array(
					'idReimpay' => trim($row->id_reimpay),
					'namaReq' => trim($row->nama_kyw),
					'jmlUang' =>  $jmlUang
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getReimpayReq(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$requester = $this->session->userdata('id_kyw');
		$rows = $this->master_reimpay_m->getReimpayReq($requester);
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUang = number_format($row->jml_uang,2);
			$array = array(
					'idReimpay' => trim($row->id_reimpay),
					'namaReq' => trim($row->nama_kyw),
					'jmlUang' =>  $jmlUang
			);

			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescReimpay(){
		$this->CI =& get_instance();
		$idReimpay = $this->input->post('idReimpay', TRUE );
		$rows = $this->master_reimpay_m->getDescReimpay($idReimpay);
		if($rows){
			foreach($rows as $row){
				$tgl_jt = date('d-m-Y',strtotime($row->tgl_jt));
				$jml_uang = number_format($row->jml_uang,2);
				$tglTrans = date('d-m-Y', strtotime($row->tgl_trans));
				$nama_pay_to = $this->master_advance_m->getPayTo($row->pay_to);

				$hd = $row->app_hd_id;
				if ($hd == 0) {
					$hdid = '';
				} else {
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=" . $hd . "");
					$hdid = $query->row()->nama;
				}

				$keuangan = $row->app_keuangan_id;
				if ($keuangan == 0) {
					$keuanganid = '';
				} else {
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=" . $keuangan . "");
					$keuanganid = $query->row()->nama;
				}

				$gm = $row->app_gm_id;
				if ($gm == 0) {
					$gmid = '';
				} else {
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=" . $gm . "");
					$gmid = $query->row()->nama;
				}

				$keutgl = $row->app_keuangan_tgl;
				if ($keutgl == '0000-00-00') {
					$keuangantgl = '';
				} else {
					$keuangantgl = date('d-m-Y', strtotime($row->app_keuangan_tgl));
				}
				$hedtgl = $row->app_hd_tgl;
				if ($hedtgl == '0000-00-00') {
					$hdtgl = '';
				} else {
					$hdtgl = date('d-m-Y', strtotime($row->app_keuangan_tgl));
				}
				$gemtgl = $row->app_gm_tgl;
				if ($gemtgl == '0000-00-00') {
					$gmtgl = '';
				} else {
					$gmtgl = date('d-m-Y', strtotime($row->app_gm_tgl));
				}

				if ($row->app_keuangan_status == '1') {
					$keuanganStatus = 'Approve';
				} elseif ($row->app_keuangan_status == '2') {
					$keuanganStatus = 'Rejected';
				} elseif ($row->app_keuangan_status == '3') {
					$keuanganStatus = 'Paid';
				} else {
					$keuanganStatus = '';
				}
				if ($row->app_hd_status == '1') {
					$hdStatus = 'Approve';
				} elseif ($row->app_hd_status == '2') {
					$hdStatus = 'Rejected';
				} elseif ($row->app_hd_status == '3') {
					$hdStatus = 'Paid';
				} else {
					$hdStatus = '';
				}
				if ($row->app_gm_status == '1') {
					$gmStatus = 'Approve';
				} elseif ($row->app_gm_status == '2') {
					$gmStatus = 'Rejected';
				} elseif ($row->app_gm_status == '3') {
					$gmStatus = 'Paid';
				} else {
					$gmStatus = '';
				}

				$array = array(
						'baris'						=> 1,
						'id_kyw' 					=> $row->id_kyw,
						'nama_kyw'					=> $row->nama_kyw,
						'id_dept'					=> $row->id_dept,
						'nama_dept'					=> $row->nama_dept,
						'no_invoice'				=> $row->no_invoice,
						'jml_uang' 					=> $jml_uang,
						'id_proyek' => $row->id_proyek,
						'id_kurs' => $row->id_kurs,
						'nilai_kurs' => $row->nilai_kurs,
						'tgl_trans' => $tglTrans,
						'tgl_jt' 					=> $tgl_jt,
						'pay_to' 					=> $row->pay_to,
						'nama_pay_to' => $nama_pay_to[0]->nama_kyw,
						'nama_akun_bank' 			=> $row->nama_akun_bank,
						'no_akun_bank' 				=> $row->no_akun_bank,
						'nama_bank' 				=> $row->nama_bank,
						'keterangan' 				=> $row->keterangan,
						'dok_fpe'		        	=> $row->dok_fpe,
						'dok_kuitansi'		        => $row->dok_kuitansi,
						'dok_fpa'		        	=> $row->dok_fpa,
						'dok_po'		        	=> $row->dok_po,
						'dok_suratjalan'		    => $row->dok_suratjalan,
						'dok_lappenerimaanbrg'		=> $row->dok_lappenerimaanbrg,
						'dok_bast'		        	=> $row->dok_bast,
						'dok_pc'		        	=> $row->dok_pc,
						'dok_lpkk'		        	=> $row->dok_lpkk,
						'app_keuangan_id' => $keuanganid,
						'app_hd_id' => $hdid,
						'app_gm_id' => $gmid,
						'app_keuangan_status' => $keuanganStatus,
						'app_hd_status' => $hdStatus,
						'app_gm_status' => $gmStatus,
						'app_keuangan_tgl' => $keuangantgl,
						'app_hd_tgl' => $hdtgl,
						'app_gm_tgl' => $gmtgl,
						'app_keuangan_ket' => $row->app_keuangan_ket,
						'app_hd_ket' => $row->app_hd_ket,
						'app_gm_ket' => $row->app_gm_ket,
						'app_user_id'=>$row->app_user_id,
						'inout_budget' => $row->inout_budget
				);
			}	
		}else{
			$array=array('baris'=>0);
		}
	
		$this->output->set_output(json_encode($array));
	}
	function getDescCpa()
	{
		$this->CI =& get_instance();
		$idReimpay = $this->input->post('idReimpay', TRUE);
		$crows = $this->master_reimpay_m->getCDescCpa($idReimpay);
		if ($crows <= 0) {
			$array = array('baris' => 0);
			$rows['data_cpa'] = $array;
			$this->output->set_output(json_encode($rows));
		} else {
			$rows = $this->master_reimpay_m->getDescCpa($idReimpay);
			$this->output->set_output(json_encode($rows));
		}


	}
    function simpan(){
        $idKyw			= trim($this->input->post('kywId'));
        $noInv			= trim($this->input->post('noInvoice'));
        $uang			= str_replace(',', '', trim($this->input->post('uang')));
		$idProyek 	= trim($this->input->post('proyek'));
		$idKurs 	= trim($this->input->post('kurs'));
		$nilaiKurs 	= str_replace(',', '', trim($this->input->post('nilaiKurs')));
		$tglTrans 	= trim($this->input->post('tglTrans'));
		$tglTrans 	= date('Y-m-d', strtotime($tglTrans));
        $tglJT			= trim($this->input->post('tglJT'));
        $tglJT 			= date ( 'Y-m-d', strtotime ( $tglJT ) );
        $payTo			= trim($this->input->post('payTo'));
		$namaPemilikAkunBank = trim($this->input->post('namaPemilikAkunBank'));
		$noAkunBank = trim($this->input->post('noAkunBank'));
		$namaBank 	= trim($this->input->post('namaBank'));
		$ket 		= trim($this->input->post('keterangan'));

		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
                
        $modelidReimpay = $this->master_reimpay_m->getIdReimpay($bulan, $tahun);
        $data = array(
            'id_reimpay'		      	=> $modelidReimpay,
            'id_kyw'		        	=> $idKyw,
        	'no_invoice'		        => $noInv,
        	'jml_uang'		        	=> $uang,
				'id_proyek' => $idProyek,
				'id_kurs' => $idKurs,
				'nilai_kurs' => $nilaiKurs,
				'tgl_trans' => $tglTrans,
        	'tgl_jt'		        	=> $tglJT,
        	'pay_to'		        	=> $payTo,
				'nama_akun_bank' => $namaPemilikAkunBank,
				'no_akun_bank' => $noAkunBank,
				'nama_bank' => $namaBank,
        	'keterangan'		        => $ket,
        	'dok_fpe'		        	=> trim($this->input->post('dokFPe_in')),
        	'dok_kuitansi'		        => trim($this->input->post('dokKuitansi_in')),
        	'dok_fpa'		        	=> trim($this->input->post('dokPa_in')),
        	'dok_po'		        	=> trim($this->input->post('dokPO_in')),
        	'dok_suratjalan'		    => trim($this->input->post('dokSuratJalan_in')),
        	'dok_lappenerimaanbrg'		=> trim($this->input->post('dokPenBrg_in')),
        	'dok_bast'		        	=> trim($this->input->post('dokBAST_in')),
        	'dok_pc'		        	=> trim($this->input->post('dokPC_in')),
        	'dok_lpkk'		        	=> trim($this->input->post('dokLapPKK_in'))
        );
        $model = $this->master_reimpay_m->insertReimpay($data);
		
		$totJurnal = trim($this->input->post('txtTempLoop'));
		if($totJurnal > 0){
			for($i=1;$i<=$totJurnal;$i++){
				$tKodePerk          = 'tempKodePerk'.$i;
				$tKodeCflow         = 'tempKodeCflow'.$i;
				$tJumlah            = 'tempJumlah'.$i;
				$tKet               = 'tempKet'.$i;

				$tmpKodePerk        = trim($this->input->post($tKodePerk ));
				$tmpKodeCflow       = trim($this->input->post($tKodeCflow ));
				$tmpJumlah          = str_replace(',', '', trim($this->input->post($tJumlah )));
				$tmpKet             = trim($this->input->post($tKet ));

				$data = array(
						'id_cpa'         => 0,
						'id_master'      => $modelidReimpay,
						'kode_perk'      => $tmpKodePerk,
						'kode_cflow'     => $tmpKodeCflow,
						'keterangan'     => $tmpKet,
						'jumlah'        => $tmpJumlah
				);
				$query=$this->master_reimpay_m->insertCpa($data);
			}
		}
		
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
    	$idReimpay		= trim($this->input->post('idReimpay'));
    	$idKyw			= trim($this->input->post('kywId'));
        $noInv			= trim($this->input->post('noInvoice'));
        $uang			= str_replace(',', '', trim($this->input->post('uang')));
		$tglTrans 	= trim($this->input->post('tglTrans'));
		$tglTrans 	= date('Y-m-d', strtotime($tglTrans));
		$tglJT			= trim($this->input->post('tglJT'));
        $tglJT 			= date ( 'Y-m-d', strtotime ( $tglJT ) );
        $payTo			= trim($this->input->post('payTo'));
        $ket			= trim($this->input->post('keterangan'));

		$idProyek 	= trim($this->input->post('proyek'));
		$idKurs 	= trim($this->input->post('kurs'));
		$nilaiKurs 	= str_replace(',', '', trim($this->input->post('nilaiKurs')));
		$namaPemilikAkunBank = trim($this->input->post('namaPemilikAkunBank'));
		$noAkunBank = trim($this->input->post('noAkunBank'));
		$namaBank 	= trim($this->input->post('namaBank'));

		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
		$tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $data = array(
            'id_kyw'		        	=>$idKyw,
        	'no_invoice'		        =>$noInv,
        	'jml_uang'		        	=>$uang,
				'id_proyek' => $idProyek,
				'id_kurs' => $idKurs,
				'nilai_kurs' => $nilaiKurs,
        	'tgl_jt'		        	=>$tglJT,
        	'pay_to'		        	=>$payTo,
				'nama_akun_bank' => $namaPemilikAkunBank,
				'no_akun_bank' => $noAkunBank,
				'nama_bank' => $namaBank,
        	'keterangan'		        =>$ket,
        	'dok_fpe'		        	=>trim($this->input->post('dokFPe_in')),
        	'dok_kuitansi'		        =>trim($this->input->post('dokKuitansi_in')),
        	'dok_fpa'		        	=>trim($this->input->post('dokPa_in')),
        	'dok_po'		        	=>trim($this->input->post('dokPO_in')),
        	'dok_suratjalan'		    =>trim($this->input->post('dokSuratJalan_in')),
        	'dok_lappenerimaanbrg'		=>trim($this->input->post('dokPenBrg_in')),
        	'dok_bast'		        	=>trim($this->input->post('dokBAST_in')),
        	'dok_pc'		        	=>trim($this->input->post('dokPC_in')),
        	'dok_lpkk'		        	=>trim($this->input->post('dokLapPKK_in'))
		);
    	$model = $this->master_reimpay_m->updateReimpay($data,$idReimpay);
		$model = $this->master_advance_m->deleteCpa($idReimpay);

		$totJurnal = trim($this->input->post('txtTempLoop'));
		if($totJurnal > 0){
			$query=$this->master_reimpay_m->deleteCpa($idReimpay);

			for($i=1;$i<=$totJurnal;$i++){
				$tKodePerk          = 'tempKodePerk'.$i;
				$tKodeCflow         = 'tempKodeCflow'.$i;
				$tJumlah            = 'tempJumlah'.$i;
				$tKet               = 'tempKet'.$i;

				$tmpKodePerk        = trim($this->input->post($tKodePerk ));
				$tmpKodeCflow       = trim($this->input->post($tKodeCflow ));
				$tmpJumlah          = str_replace(',', '', trim($this->input->post($tJumlah )));
				$tmpKet             = trim($this->input->post($tKet ));

				$data = array(
						'id_cpa'         => 0,
						'id_master'      => $idReimpay,
						'kode_perk'      => $tmpKodePerk,
						'kode_cflow'     => $tmpKodeCflow,
						'keterangan'     => $tmpKet,
						'jumlah'        => $tmpJumlah
				);
				$query=$this->master_reimpay_m->insertCpa($data);
			}
		}else{
			$query=$this->master_reimpay_m->deleteCpa($idReimpay);
		}
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
    	$idReimpay			= trim($this->input->post('idReimpay'));
		$totJurnal = trim($this->input->post('tempLoop'));

    	$model = $this->master_reimpay_m->deleteReimpay( $idReimpay);
		if ($totJurnal > 0) {
			$query = $this->master_reimpay_m->deleteCpa($idReimpay);
		}
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
	function cetak($idReimPay)
    {
    	if($this->auth->is_logged_in() == false){
    		redirect('main/index');
    	}else{
    		$data['reimpay'] = $this->master_reimpay_m->getDescReimpay($idReimPay);
    		$this->load->view('cetak/reimbursment',$data);
    	}
    }
	function sign(){
        $this->CI 	=& get_instance();
        $idReimpay	= trim($this->input->post('idReimpay'));
        $flag  		= $this->session->userdata('id_kyw');
        $data 		= array(
						'app_user_id' => $flag
					  );
        $model 		= $this->master_reimpay_m->updateReimpay($data,$idReimpay);

        if($model){
            $array = array(
                'act'	=>1,
                'tipePesan'=>'success',
                'pesan' =>'Data berhasil di Sign.'
            );
        }else{
            $array = array(
                'act'	=>0,
                'tipePesan'=>'error',
                'pesan' =>'Data gagal di Sign.'
            );
        }
        $this->output->set_output(json_encode($array));
    }
	function cetak_cpa($idReimPay)
    {
        if($this->auth->is_logged_in() == false){
            redirect('main/index');
        }else{
            $data['advance'] = $this->master_reimpay_m->cetak_cpa($idReimPay);
            $data['detail'] = $this->master_reimpay_m->cetak_cpa_detail($idReimPay);
            $this->load->view('cetak/cetak_cpa_reimpay', $data);
        }
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */