<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_settle_adv extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_settle_adv_m');
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
		$menuId = $this->home_m->get_menu_id('master_settle_adv/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
		$data['proyek'] = $this->master_advance_m->getProyek();
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
			$this->template->load ( 'template/template3', 'master/master_settle_adv_v',$data );
		}
	}
	public function getAdvAll()
	{
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_settle_adv_m->getAdvAll();
		$data['data'] = array();
		foreach ($rows as $row) {
			$jmlUang = number_format($row->jml_uang, 2);
			$array = array(
					'idAdv' => trim($row->id_advance),
					'namaReq' => trim($row->nama_kyw),
					'jmlUang' => $jmlUang
			);
			array_push($data['data'], $array);
		}
		$this->output->set_output(json_encode($data));
	}
	public function getSettlement(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_settle_adv_m->getSettleAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$jmlUangPaid = number_format($row->jml_uang_paid,2);
			$jmlUangAdv = number_format($row->jml_uang,2);
			$array = array(
					'idSettle' => trim($row->id_settle_adv),
					'namaReq' => trim($row->nama_kyw),
					'jmlUangAdv' => $jmlUangAdv,
					'jmlUangPaid' =>  $jmlUangPaid
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function getDescCpa()
    {
        $this->CI =& get_instance();
        $idSettle = $this->input->post('idSettle', TRUE);
        $crows = $this->master_settle_adv_m->getCDescCpa($idSettle);
        if ($crows <= 0) {
            $array = array('baris' => 0);
            $rows['data_cpa'] = $array;
            $this->output->set_output(json_encode($rows));
        } else {
            $rows = $this->master_settle_adv_m->getDescCpa($idSettle);
            $this->output->set_output(json_encode($rows));
        }


    }
	function getDescSettle(){
		$this->CI =& get_instance();
		$idSettle = $this->input->post('idSettle',TRUE);
		$rows = $this->master_settle_adv_m->getDescSettle( $idSettle );
		if($rows){
			foreach ( $rows as $row )
			$tgl_jt = date('d-m-Y', strtotime($row->tgl_jt));
            $jml_uang = number_format($row->jml_uang, 2);
			$jml_uang_paid = number_format($row->jml_uang_paid, 2);
			$jml_uang_oupaid = $row->jml_uang_oupaid;
            $nama_pay_to = $this->master_settle_adv_m->getPayTo($row->pay_to);
			/*if($jml_uang_oupaid <= 0){
				$jml_uang_oupaid = str_replace('-','',$jml_uang_oupaid);
			}*/
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
				
				$array = array (
						'baris'					=> 1,
						'id_kyw' 				=> $row->id_kyw,
						'nama_kyw'				=> $row->nama_kyw,
						'id_dept'				=> $row->id_dept,
						'nama_dept'				=> $row->nama_dept,
						'idAdvance'				=> $row->id_adv,
						'advAmount'				=> $jml_uang,
						'paid' 					=> $jml_uang_paid,
						'paidou'				=> $jml_uang_oupaid,
						'tgl_jt' 				=> $tgl_jt,
						'id_pay_to'				=> $row->pay_to,
						'id_proyek'				=> $row->id_proyek,
						'pay_to' 				=> $nama_pay_to,
						'nama_akun_bank' 		=> $row->nama_akun_bank,
						'no_akun_bank' 			=> $row->no_akun_bank,
						'tglTransAdv'			=> date('d-m-Y', strtotime($row->tglTransAdv)),
						'tglTransSt'			=> date('d-m-Y', strtotime($row->tglTransSt)),
						'nama_bank' 			=> $row->nama_bank,
						'keterangan' 			=> $row->keterangan,
						'ketadv'				=> $row->ketadv,
						'dok_fpe'		        => $row->dok_fpe,
						'dok_kuitansi'		    => $row->dok_kuitansi,
						'dok_fpa'		        => $row->dok_fpa,
						'dok_po'		        => $row->dok_po,
						'dok_suratjalan'		=> $row->dok_suratjalan,
						'dok_lappenerimaanbrg'	=> $row->dok_lappenerimaanbrg,
						'dok_bast'		        => $row->dok_bast,
						'dok_bap'		        => $row->dok_bap,
						'dok_ssp'		        => $row->dok_ssp,
						'dok_sspk'		        => $row->dok_sspk,
						'dok_lpjum'		        => $row->dok_lpjum,
						'app_keuangan_id' 		=> $keuanganid,
						'app_hd_id' 			=> $hdid,
						'app_gm_id' 			=> $gmid,
						'app_keuangan_status' 	=> $keuanganStatus,
						'app_hd_status' 		=> $hdStatus,
						'app_gm_status' 		=> $gmStatus,
						'app_keuangan_tgl' 		=> $keuangantgl,
						'app_hd_tgl' 			=> $hdtgl,
						'app_gm_tgl' 			=> $gmtgl,
						'app_keuangan_ket' 		=> $row->app_keuangan_ket,
						'app_hd_ket' 			=> $row->app_hd_ket,
						'app_gm_ket' 			=> $row->app_gm_ket,
						'app_user_id'			=> $row->app_user_id,
						'inout_budget' 			=> $row->inout_budget
						);
		}else{
			$array=array('baris'=>0);
		}
	
		$this->output->set_output(json_encode($array));
	}
	
    function simpan(){
        $idKyw					= trim($this->input->post('idKyw'));
        $idAdvance				= trim($this->input->post('idAdvance'));
        $paid					= str_replace(',', '', trim($this->input->post('paid')));
        $uangPaidou				= str_replace(',', '', trim($this->input->post('uangPaidou')));
		$tglJT					= trim($this->input->post('tglJT'));
        $tglJT 					= date('Y-m-d', strtotime($tglJT));
        $payTo					= trim($this->input->post('payTo'));
        $namaPemilikAkunBank	= trim($this->input->post('namaPemilikAkunBank'));
        $noAkunBank				= trim($this->input->post('noAkunBank'));
        $namaBank				= trim($this->input->post('namaBank'));
        $ket					= trim($this->input->post('keterangan'));
		$tglTrans 				= $this->session->userdata('tgl_y');
		$idProyek 	= trim($this->input->post('proyek'));
		
		$sld = str_replace('.00','',trim($this->input->post('advAmount')));
		$slda = str_replace(',','', $sld);
		$pd  = str_replace('.00','',$paid);
		$akhir = $slda - $pd;
		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
		
        $modelidSettle = $this->master_settle_adv_m->getIdSettle($bulan,$tahun);
        $data = array(
            'id_settle_adv'		      	=>$modelidSettle,
            'id_kyw'		        	=>$idKyw,
        	'id_adv'		        	=>$idAdvance,
        	'jml_uang_paid'		        =>$paid,
            'jml_uang_oupaid'		    =>$akhir,
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
        	'dok_ssp'		        	=>trim($this->input->post('dokSSP_in')),
        	'dok_sspk'		        	=>trim($this->input->post('dokSSPK_in')),
        	'dok_lpjum'		        	=>trim($this->input->post('dokLPJUM_in'))
        );
        $model = $this->master_settle_adv_m->insertSettle($data);
		
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
                    'id_master'      => $modelidSettle,
                    'kode_perk'      => $tmpKodePerk,
                    'kode_cflow'     => $tmpKodeCflow,
                    'keterangan'     => $tmpKet,
                    'jumlah'        => $tmpJumlah
                );
                $query=$this->master_settle_adv_m->insertCpa($data);
            }
        }
		$data_model2 = array(
				'status_settle'		      	=> 1
		);
		$model2 = $this->master_settle_adv_m->updateAdv_statusSettle($data_model2,$idAdvance);
		if ($model) {
			$array = array(
					'act' => 1,
					'tipePesan' => 'success',
					'pesan' => 'Data berhasil disimpan.'
			);
		} else {
			$array = array(
					'act' => 0,
					'tipePesan' => 'error',
					'pesan' => 'Data gagal disimpan.'
			);
		}
        $this->output->set_output(json_encode($array));
    }
    function ubah(){
    	$idSettle				= trim($this->input->post('idSettle'));
    	$idKyw					= trim($this->input->post('idKyw'));
		$idProyek				= trim($this->input->post('proyek'));
        $idAdvance				= trim($this->input->post('idAdvance'));
        $paid					= str_replace(',', '', trim($this->input->post('paid')));
        $uangPaidou				= str_replace(',', '', trim($this->input->post('uangPaidou')));
		$tglJT					= trim($this->input->post('tglJT'));
        $tglJT 					= date('Y-m-d', strtotime($tglJT));
        $payTo					= trim($this->input->post('payTo'));
        $namaPemilikAkunBank	= trim($this->input->post('namaPemilikAkunBank'));
        $noAkunBank				= trim($this->input->post('noAkunBank'));
        $namaBank				= trim($this->input->post('namaBank'));
        $ket					= trim($this->input->post('keterangan'));
		$tglTrans 				= $this->session->userdata('tgl_y');
		
		$bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans));
		
		$sld = str_replace('.00','',trim($this->input->post('advAmount')));
		$slda = str_replace(',','', $sld);
		$pd  = str_replace('.00','',$paid);
		$akhir = $slda - $pd;
		
		$data = array(
            'id_settle_adv'		      	=>$idSettle,
            'id_kyw'		        	=>$idKyw,
        	'id_adv'		        	=>$idAdvance,
        	'jml_uang_paid'		        =>$paid,
            'jml_uang_oupaid'		    =>$akhir,
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
        	'dok_ssp'		        	=>trim($this->input->post('dokSSP_in')),
        	'dok_sspk'		        	=>trim($this->input->post('dokSSPK_in')),
        	'dok_lpjum'		        	=>trim($this->input->post('dokLPJUM_in'))
        );
    	
    	$model = $this->master_settle_adv_m->updateSettle($data,$idSettle);
    	
		$this->master_settle_adv_m->deleteCpa($idSettle);
        $totJurnal = trim($this->input->post('txtTempLoop'));
        if($totJurnal > 0){
            $query=$this->master_settle_adv_m->deleteCpa($idSettle);

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
                    'id_master'      => $idSettle,
                    'kode_perk'      => $tmpKodePerk,
                    'kode_cflow'     => $tmpKodeCflow,
                    'keterangan'     => $tmpKet,
                    'jumlah'        => $tmpJumlah
                );
                $query=$this->master_settle_adv_m->insertCpa($data);
            }
        }else{
            $query=$this->master_settle_adv_m->deleteCpa($idSettle);
        }
		
		if($model){
    		$array = array(
    				'act'	=>1,
    				'tipePesan'=>'success',
					'pesan' =>'Data berhasil di Ubah.'
    		);
    	}else{
    		$array = array(
    				'act'	=>0,
    				'tipePesan'=>'error',
					'pesan' =>'Data Gagal di Ubah.'
    		);
    	}
		$this->output->set_output(json_encode($array));
    }
    function hapus(){
    	$this->CI =& get_instance();
    	$idSettle			= trim($this->input->post('idSettle'));
    	$model = $this->master_settle_adv_m->deleteSettle( $idSettle);
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
					'pesan' =>'Data Gagal dihapus.'
			);
		}
    	$this->output->set_output(json_encode($array));
    }
	function sign(){
        $this->CI =& get_instance();
        $idSettle	= trim($this->input->post('idSettle'));
        $flag  		= $this->session->userdata('id_kyw');
        $data = array(
            'app_user_id' => $flag
        );
        $model 		= $this->master_settle_adv_m->updateSettle($data,$idSettle);

        if($model){
            $array = array(
                'act'	=>1,
                'tipePesan'=>'success',
                'pesan' =>'Data berhasil di Approve.'
            );
        }else{
            $array = array(
                'act'	=>0,
                'tipePesan'=>'error',
                'pesan' =>'Data gagal di Approve.'
            );
        }
        $this->output->set_output(json_encode($array));
    }
	function cetak($idSettle)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        } else {
            $data['settle'] = $this->master_settle_adv_m->getDescSettle($idSettle);
            $this->load->view('cetak/cetak_settlement', $data);
        }
    }
	function cetak_cpa($idSettle)
    {
        if($this->auth->is_logged_in() == false){
            redirect('main/index');
        }else{
            $data['settle'] = $this->master_settle_adv_m->cetak_cpa($idSettle);
            $data['detail'] = $this->master_settle_adv_m->cetak_cpa_detail($idSettle);
            $this->load->view('cetak/cetak_cpa_settle', $data);
        }
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */