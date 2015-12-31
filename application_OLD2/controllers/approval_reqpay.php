<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approval_reqpay extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_m');
		$this->load->model('approval_reqpay_m');
		$this->load->model('master_reqpay_m');
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
			$menuId = $this->home_m->get_menu_id('approval_reqpay/home');
			$data['menu_id'] = $menuId[0]->menu_id;
			$data['menu_parent'] = $menuId[0]->parent;
			$data['menu_nama'] = $menuId[0]->menu_nama;
			$this->auth->restrict ($data['menu_id']);
			$this->auth->cek_menu ($data['menu_id']);
        	
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);
			$data['usergroup'] = $this->session->userdata('usergroup');
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'approval/approval_reqpay_v',$data );
	}
	
    function approval(){
        $id	 				= trim($this->input->post('idreqpay'));
		$user 				= $this->session->userdata('id_kyw');
        $keuanganStatus		= trim($this->input->post('appKeuanganStatus'));
		$keuanganKeterangan = trim($this->input->post('appKeuanganKet'));
		$hdStatus			= trim($this->input->post('appHDStatus'));
		$hdKeterangan 		= trim($this->input->post('appHDKet'));
		$gmStatus			= trim($this->input->post('appGMStatus'));
		$gmKeterangan 		= trim($this->input->post('appGMKet'));
        $tanggal 			= $this->session->userdata('tgl_y');
		
        $hak 	= $this->session->userdata('usergroup_desc');
		
		if($hak == 'Head Department'){
			$data = array(
            'id_reqpay'	=> $id,
            'app_hd_id'		=> $user,
            'app_hd_status'	=> $hdStatus,
			'app_hd_tgl'	=> $tanggal,
			'app_hd_ket'	=> $hdKeterangan
			);
			$model = $this->approval_reqpay_m->updateReqpay($data,$id);
		}elseif($hak == 'General Manager'){
			$data = array(
            'id_reqpay'	=> $id,
            'app_gm_id'		=> $user,
            'app_gm_status'	=> $gmStatus,
			'app_gm_tgl'	=> $tanggal,
			'app_gm_ket'	=> $gmKeterangan
			);	
			$model = $this->approval_reqpay_m->updateReqpay($data,$id);
		}elseif($hak == 'Keuangan'){
			$data = array(
            'id_reqpay'			=> $id,
            'app_keuangan_id'		=> $user,
            'app_keuangan_status'	=> $keuanganStatus,
			'app_keuangan_tgl'		=> $tanggal,
			'app_keuangan_ket'		=> $keuanganKeterangan
			);
			$model = $this->approval_reqpay_m->updateReqpay($data,$id);
		}else{
			$model = false;
		}

        if($model){
            $array = array(
                'act'	=>1,
                'tipePesan'=>'success',
                'pesan' =>'Data appoval berhasil disimpan.'
            );
        }else{
            $array = array(
                'act'	=>0,
                'tipePesan'=>'error',
                'pesan' =>'Data approval gagal disimpan.'
            );
        }
        $this->output->set_output(json_encode($array));
    }
	
	public function getAllRp(){
		$this->CI =& get_instance();
		$rows = $this->approval_reqpay_m->getRpAll();
		$data['data'] = array();
		foreach( $rows as $row ){
			$query = $this->db->query("select nama_dept as nama from master_dept where id_dept=".$row->dept_kyw."");
			$g = $query->row()->nama;

            if($row->app_keuangan_status == '1'){
                    $keuanganStatus = 'Approve';
                }elseif($row->app_keuangan_status == '2'){
                    $keuanganStatus = 'Rejected';
                }elseif($row->app_keuangan_status == '3'){
                    $keuanganStatus = 'Paid';
                }else{
                    $keuanganStatus = '';
            }
            if($row->app_hd_status == '1'){
                $hdStatus = 'Approve';
            }elseif($row->app_hd_status == '2'){
                $hdStatus = 'Rejected';
            }elseif($row->app_hd_status == '3'){
                $hdStatus = 'Paid';
            }else{
                $hdStatus = '';
            }
            if($row->app_gm_status == '1'){
                $gmStatus = 'Approve';
            }elseif($row->app_gm_status == '2'){
                $gmStatus = 'Rejected';
            }elseif($row->app_gm_status == '3'){
                $gmStatus = 'Paid';
            }else{
                $gmStatus = '';
            }
			$array = array(
					'idRp' 	=> trim($row->id_reqpay),
					'namaKyw' 	=> trim($row->nama_kyw),
					'deptKyw' 	=> trim($g),
					'jumlah' 	=> trim(number_format($row->jml_uang, 2, ',', '.')),
					'nama_supplier'=>trim($row->nama_spl),
					'namaAcc' 	=> trim($row->nama_akun_bank),
					'namaBank' 	=> trim($row->nama_bank),
                    'appKeuangan' 	=> $keuanganStatus,
                    'appHD' 	=> $hdStatus,
                    'appGM' 	=> $gmStatus
			);
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
	function getDescRp(){
		$this->CI =& get_instance();
		$idRp = $this->input->post ( 'idRp', TRUE );
		$rows = $this->approval_reqpay_m->getDescRp($idRp);
		if($rows){
			foreach ( $rows as $row )
				$tgl_jt = date('d-m-Y',strtotime($row->tgl_jt));
				$tgl_trans = date('d-m-Y',strtotime($row->tgl_trans));
				$jml_uang = number_format($row->jml_uang,2);
				//$nama_pay_to = $this->master_reqpay_m->getPayTo($row->pay_to);
				
				$hd = $row->app_hd_id;
				if($hd == 0){
					$hdid = '';
				}else{
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=".$hd."");
					$hdid = $query->row()->nama;
				}
				
				$keuangan = $row->app_keuangan_id;
				if($keuangan == 0){
					$keuanganid = '';
				}else{
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=".$keuangan."");
					$keuanganid = $query->row()->nama;
				}
				
				$gm = $row->app_gm_id;
				if($gm == 0){
					$gmid = '';
				}else{
					$query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw=".$gm."");
					$gmid = $query->row()->nama;
				}
				
				$keutgl = $row->app_keuangan_tgl;
				if($keutgl == '0000-00-00'){
					$keuangantgl = '';
				}else{
					$keuangantgl = date('d-m-Y',strtotime($row->app_keuangan_tgl));	
				}
				$hedtgl = $row->app_hd_tgl;
				if($hedtgl == '0000-00-00'){
					$hdtgl = '';
				}else{
					$hdtgl = date('d-m-Y',strtotime($row->app_keuangan_tgl));	
				}
				$gemtgl = $row->app_gm_tgl;
				if($gemtgl == '0000-00-00'){
					$gmtgl = '';
				}else{
					$gmtgl = date('d-m-Y',strtotime($row->app_gm_tgl));	
				}

                $keuanganStatus = $row->app_keuangan_status;

				$hdStatus = $row->app_hd_status;

				$gmStatus = $row->app_gm_status;
				$array = array(
						'baris'=>1,
						'id_kyw' => $row->id_kyw,
						'nama_kyw'=>$row->nama_kyw,
						'nama_dept'=>$row->nama_dept,
						'no_invoice'=>$row->no_invoice,
						'no_po'=>$row->no_po,
						'jml_uang' => $jml_uang,
						'nama_proyek' => $row->nama_proyek,
						'id_kurs' => $row->id_kurs,
						'nilai_kurs' => $row->nilai_kurs,
						'tgl_trans' => $tgl_trans,
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
						'dok_sbj'		        	=>$row->dok_sbj,
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
						'inout_budget' => $row->inout_budget
				//        	''		        	=>$,
				);

		}else{
			$array=array('baris'=>0);
		}
		$this->output->set_output(json_encode($array));
	}
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */