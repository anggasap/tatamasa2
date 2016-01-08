<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akuntansi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('master_advance_m');
        $this->load->model('akuntansi_m');
        session_start();
    }

    public function index()
    {
        if ($this->auth->is_logged_in() == false) {
            $this->login();
        } else {
            $data['multilevel'] = $this->user_m->get_data(0, $this->session->userdata('usergroup'));

            $this->template->set('title', 'Home');
            $this->template->load('template/template1', 'global/index', $data);
        }

    }

    function home()
    {
        $menuId = $this->home_m->get_menu_id('akuntansi/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);
        $data['proyek'] = $this->master_advance_m->getProyek();
        $data['kurs'] = $this->master_advance_m->getKurs();

        if (isset($_POST["btnSimpan"])) {
            $this->simpan();
        } elseif (isset($_POST["btnUbah"])) {
            $this->ubah();
        } elseif (isset($_POST["btnHapus"])) {
            $this->hapus();
        } else {
            $data['multilevel'] = $this->user_m->get_data(0, $this->session->userdata('usergroup'));
            $data['menu_all'] = $this->user_m->get_menu_all(0);

            $this->template->set('title', $data['menu_nama']);
            $this->template->load('template/template3', 'transaksi/akuntansi_v', $data);
        }
    }
    public function getReqpayAll(){
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_m->getReqpayAll();
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
    function getReimpayAll(){
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_m->getReimpayAll();
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
    public function getSettlement(){
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_m->getSettleAll();
        $data['data'] = array();
        foreach( $rows as $row ) {
            $jmlUangPaid = number_format($row->jml_uang_paid,2);
            $jmlUangAdv = number_format($row->jml_uang,2);
            $array = array(
                'idSettle' => trim($row->id_settle_adv),
                'idAdv'     => trim($row->id_advance),
                'namaReq' => trim($row->nama_kyw),
                'jmlUangAdv' => $jmlUangAdv,
                'jmlUangPaid' =>  $jmlUangPaid,
                'typeAdv'   => $row->type_adv
            );

            array_push($data['data'],$array);
        }
        $this->output->set_output(json_encode($data));
    }
    function getDescUM()
    {
        $this->CI =& get_instance();
        $kdByr = $this->input->post('typeUM', TRUE);

        $rows = $this->akuntansi_m->getDescUM($kdByr);
        $this->output->set_output(json_encode($rows));
    }
    function getDescCpa()
    {
        $this->CI =& get_instance();
        $idAdv = $this->input->post('idAdv', TRUE);
        $crows = $this->master_advance_m->getCDescCpa($idAdv);
        if ($crows <= 0) {
            $array = array('baris' => 0);
            $rows['data_cpa'] = $array;
            $this->output->set_output(json_encode($rows));
        } else {
            $rows = $this->master_advance_m->getDescCpa($idAdv);
            $this->output->set_output(json_encode($rows));
        }
    }

    function simpan()
    {
        $idProyek = trim($this->input->post('proyek'));
        $idDept = trim($this->input->post('dept'));
        $ket = trim($this->input->post('keterangan'));
        $tglTrans = trim($this->input->post('tgltrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");
        $kodeJurnal = trim($this->input->post('kodeJurnal'));
        $jml_uang = str_replace(',', '', trim($this->input->post('uang')));

        $data_model2 = array(
            'status_akuntansi'		      	=> 1
        );
        $modelidAP = $this->akuntansi_m->getIdAP($bulan, $tahun);
        if($kodeJurnal == 'RP'){
            $id_master = trim($this->input->post('idReqpay'));
            $model2 = $this->akuntansi_m->updateReqpay_statusAkuntansi($data_model2,$id_master);
        }else if($kodeJurnal == 'RM'){
            $id_master = trim($this->input->post('idReimpay'));
            $model2 = $this->akuntansi_m->updateReimpay_statusAkuntansi($data_model2,$id_master);
        }else if($kodeJurnal == 'ST'){
            $id_master = trim($this->input->post('idSettle'));
            $model2 = $this->akuntansi_m->updateSettle_statusAkuntansi($data_model2,$id_master);
        }else if($kodeJurnal == 'JU'){
            $id_master = $kodeJurnal;
            $model2 = $this->akuntansi_m->updateSettle_statusAkuntansi($data_model2,$id_master);
        }
        $totJurnal = trim($this->input->post('txtTempLoop'));
        if ($totJurnal > 0) {
            for ($i = 1; $i <= $totJurnal; $i++) {
                $tKodePerk = 'tempKodePerk' . $i;
                $tKodeCflow = 'tempKodeCflow' . $i;
                $tDb = 'tempDb' . $i;
                $tKr = 'tempKr' . $i;
                $tKet = 'tempKet' . $i;

                $tmpKodePerk = trim($this->input->post($tKodePerk));
                $tmpKodeCflow = trim($this->input->post($tKodeCflow));
                $tmpDb = str_replace(',', '', trim($this->input->post($tDb)));
                $tmpKr = str_replace(',', '', trim($this->input->post($tKr)));
                $tmpKet = trim($this->input->post($tKet));

                $jmlCflow = $tmpDb + $tmpKr;

                $data_perk = array(
                    'trans_id' => $modelidAP,
                    'tgl_trans' => $tglTrans,
                    'kode_jurnal' => $kodeJurnal,
                    'master_id' => $id_master,
                    'id_proyek' => $idProyek,
                    'id_dept' => $idDept,
                    'kode_perk' => $tmpKodePerk,
                    'debet' => $tmpDb,
                    'kredit' => $tmpKr,
                    'keterangan' => $tmpKet
                );
                $model = $this->akuntansi_m->insertTDPerk($data_perk);
				//update budget
				$string = $tmpKodePerk;
				if($string[0] == '1' ){
					$terpakai = $this->akuntansi_m->getPerkTerpakai15($tglTrans,$idProyek,$tmpKodePerk);
					$modela = $this->akuntansi_m->updateBudgetPerk($terpakai,$tahun,$idProyek,$tmpKodePerk);	
				}elseif($string[0] == '5'){
					$terpakai = $this->akuntansi_m->getPerkTerpakai15($tglTrans,$idProyek,$tmpKodePerk);
					$model = $this->akuntansi_m->updateBudgetPerk($terpakai,$tahun,$idProyek,$tmpKodePerk);
				}elseif($string[0] == '2'){
					$terpakai = $this->akuntansi_m->getPerkTerpakai234($tglTrans,$idProyek,$tmpKodePerk);
					$model = $this->akuntansi_m->updateBudgetPerk($terpakai,$tahun,$idProyek,$tmpKodePerk);
				}elseif($string[0] == '3'){
					$terpakai = $this->akuntansi_m->getPerkTerpakai234($tglTrans,$idProyek,$tmpKodePerk);
					$model = $this->akuntansi_m->updateBudgetPerk($terpakai,$tahun,$idProyek,$tmpKodePerk);
				}elseif($string[0] == '4'){
					$terpakai = $this->akuntansi_m->getPerkTerpakai234($tglTrans,$idProyek,$tmpKodePerk);
					$model = $this->akuntansi_m->updateBudgetPerk($terpakai,$tahun,$idProyek,$tmpKodePerk);
				}
				//
                if($model){
                    $idTdPerk = $this->akuntansi_m->getIdTDPerk($modelidAP,$tglTrans,$id_master,$idProyek,$idDept,$tmpKodePerk,$tmpDb,$tmpKr);
                    if ($tmpKodeCflow <> '') {
                        $data_cflow = array(
                            'trans_id' => $modelidAP,
                            'id_seq_perk'=>$idTdPerk,
                            'tgl_trans' => $tglTrans,
                            'kode_jurnal' => $kodeJurnal,
                            'master_id' => $id_master,
                            'id_proyek' => $idProyek,
                            'id_dept' => $idDept,
                            'kode_cflow' => $tmpKodeCflow,
                            'saldo_akhir' => $jmlCflow,
                            'keterangan' => $tmpKet
                        );
                        $model = $this->akuntansi_m->insertTDCflow($data_cflow);
						
						$string = $tmpKodeCflow;
						/*if($string[0] == '1' ){
							$terpakai = $this->akuntansi_m->getCflowTerpakai15($tglTrans,$idProyek,$tmpKodeCflow);
							$model = $this->akuntansi_m->updateBudgetCflow($terpakai,$tahun,$idProyek,$tmpKodeCflow);
						}elseif($string[0] == '5'){
							$terpakai = $this->akuntansi_m->getCflowTerpakai15($tglTrans,$idProyek,$tmpKodeCflow);
							$model = $this->akuntansi_m->updateBudgetCflow($terpakai,$tahun,$idProyek,$tmpKodeCflow);
						}elseif($string[0] == '2'){
							$terpakai = $this->akuntansi_m->getCflowTerpakai234($tglTrans,$idProyek,$tmpKodeCflow);
							$model = $this->akuntansi_m->updateBudgetCflow($terpakai,$tahun,$idProyek,$tmpKodeCflow);
						}elseif($string[0] == '3'){
							$terpakai = $this->akuntansi_m->getCflowTerpakai234($tglTrans,$idProyek,$tmpKodeCflow);
							$model = $this->akuntansi_m->updateBudgetCflow($terpakai,$tahun,$idProyek,$tmpKodeCflow);
						}elseif($string[0] == '4'){
							$terpakai = $this->akuntansi_m->getCflowTerpakai234($tglTrans,$idProyek,$tmpKodeCflow);
							$model = $this->akuntansi_m->updateBudgetCflow($terpakai,$tahun,$idProyek,$tmpKodeCflow);
						}*/
                    }
                }

            }
        }

        if ($model) {
            $array = array(
                'act' => 1,
                'idAP' => $modelidAP,
                'kodeJurnal' =>$kodeJurnal,
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

    function ubah()
    {
        $idAdv = trim($this->input->post('idAdvance'));
        $idKyw = trim($this->input->post('kywId'));
        $uangMuka = str_replace(',', '', trim($this->input->post('uangMuka')));
        $idProyek = trim($this->input->post('proyek'));
        $idKurs = trim($this->input->post('kurs'));
        $nilaiKurs = str_replace(',', '', trim($this->input->post('nilaiKurs')));
        $tglTrans = trim($this->input->post('tglTrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $tglJT = trim($this->input->post('tglJT'));
        $tglJT = date('Y-m-d', strtotime($tglJT));
        $payTo = trim($this->input->post('payTo'));
        $namaPemilikAkunBank = trim($this->input->post('namaPemilikAkunBank'));
        $noAkunBank = trim($this->input->post('noAkunBank'));
        $namaBank = trim($this->input->post('namaBank'));
        $ket = trim($this->input->post('keterangan'));
        $dokPO = trim($this->input->post('dokPO_in'));
        $dokSP = trim($this->input->post('dokSP_in'));
        $dokSSP = trim($this->input->post('dokSSP_in'));
        $dokSSPK = trim($this->input->post('dokSSPK_in'));
        $dokSBJ = trim($this->input->post('dokSBJ_in'));

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        //$ket			= trim($this->input->post(''));
        $data = array(
            'id_kyw' => $idKyw,
            'jml_uang' => $uangMuka,
            'id_proyek' => $idProyek,
            'id_kurs' => $idKurs,
            'nilai_kurs' => $nilaiKurs,
            'tgl_jt' => $tglJT,
            'pay_to' => $payTo,
            'nama_akun_bank' => $namaPemilikAkunBank,
            'no_akun_bank' => $noAkunBank,
            'nama_bank' => $namaBank,
            'keterangan' => $ket,
            'dok_po' => $dokPO,
            'dok_sp' => $dokSP,
            'dok_ssp' => $dokSSP,
            'dok_sspk' => $dokSSPK,
            'dok_sbj' => $dokSBJ
            //        		''		        	=>$,
        );
        $model = $this->master_advance_m->updateAdv($data, $idAdv);

        $totJurnal = trim($this->input->post('txtTempLoop'));
        if ($totJurnal > 0) {
            $query = $this->master_advance_m->deleteCpa($idAdv);

            for ($i = 1; $i <= $totJurnal; $i++) {
                $tKodePerk = 'tempKodePerk' . $i;
                $tKodeCflow = 'tempKodeCflow' . $i;
                $tJumlah = 'tempJumlah' . $i;
                $tKet = 'tempKet' . $i;

                $tmpKodePerk = trim($this->input->post($tKodePerk));
                $tmpKodeCflow = trim($this->input->post($tKodeCflow));
                $tmpJumlah = str_replace(',', '', trim($this->input->post($tJumlah)));
                $tmpKet = trim($this->input->post($tKet));

                $data = array(
                    'id_cpa' => 0,
                    'id_master' => $idAdv,
                    'kode_perk' => $tmpKodePerk,
                    'kode_cflow' => $tmpKodeCflow,
                    'keterangan' => $tmpKet,
                    'jumlah' => $tmpJumlah
                );
                $query = $this->master_advance_m->insertCpa($data);
                $dataTerpakai = array(
                    'terpakai' => $tmpJumlah
                );
                $query = $this->master_advance_m->updateBudgetCflowTerpakai($tmpKodeCflow, $tahun, $idProyek, $dataTerpakai);
                $query = $this->master_advance_m->updateBudgetCflowSaldo($tmpKodeCflow, $tahun, $idProyek);
                $query = $this->master_advance_m->updateBudgetKdPerkTerpakai($tmpKodePerk, $tahun, $idProyek, $dataTerpakai);
                $query = $this->master_advance_m->updateBudgetKdPerkSaldo($tmpKodePerk, $tahun, $idProyek);
            }
        } else {
            $query = $this->master_advance_m->deleteCpa($idAdv);
        }

        if ($model) {
            $array = array(
                'act' => 1,
                'tipePesan' => 'success',
                'pesan' => 'Data berhasil diubah.'
            );
        } else {
            $array = array(
                'act' => 0,
                'tipePesan' => 'error',
                'pesan' => 'Data gagal diubah.'
            );
        }
        $this->output->set_output(json_encode($array));
    }

    function hapus()
    {
        $this->CI =& get_instance();
        $idAdvance = trim($this->input->post('idAdvance'));
        $totJurnal = trim($this->input->post('tempLoop'));
        $model = $this->master_advance_m->deleteAdv($idAdvance);


        if ($totJurnal > 0) {
            $query = $this->master_advance_m->deleteCpa($idAdvance);
        }

        if ($model) {
            $array = array(
                'act' => 1,
                'tipePesan' => 'success',
                'pesan' => 'Data berhasil dihapus.'
            );
        } else {
            $array = array(
                'act' => 0,
                'tipePesan' => 'error',
                'pesan' => 'Data gagal dihapus.'
            );
        }
        $this->output->set_output(json_encode($array));
    }

    function sign()
    {
        $this->CI =& get_instance();
        $idAdvance = trim($this->input->post('idAdvance'));
        $flag = $this->session->userdata('id_kyw');
        $data = array(
            'app_user_id' => $flag
        );
        $model = $this->master_advance_m->updateAdv($data, $idAdvance);

        if ($model) {
            $array = array(
                'act' => 1,
                'tipePesan' => 'success',
                'pesan' => 'Data berhasil di Approve.'
            );
        } else {
            $array = array(
                'act' => 0,
                'tipePesan' => 'error',
                'pesan' => 'Data gagal di Approve.'
            );
        }
        $this->output->set_output(json_encode($array));
    }


    function cetak($idJurnal,$type)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{
            if($type == 'RP'){
                $data['all'] = $this->akuntansi_m->getAp($idJurnal);
                $data['detail'] = $this->akuntansi_m->getDetailAp($idJurnal);
                $this->load->view('cetak/cetak_ap', $data);
            }elseif($type == 'RM'){
                $data['all'] = $this->akuntansi_m->getApRp($idJurnal);
                $data['detail'] = $this->akuntansi_m->getDetailAp($idJurnal);
                $this->load->view('cetak/cetak_ap_reimpay', $data);
            }elseif($type == 'ST'){
                $data['all'] = $this->akuntansi_m->getApSt($idJurnal);
                $data['detail'] = $this->akuntansi_m->getDetailAp($idJurnal);
                $this->load->view('cetak/cetak_ap_sp', $data);
            }else{
                $data['all'] = $this->akuntansi_m->getAp($idJurnal);
                $data['detail'] = $this->akuntansi_m->getDetailAp($idJurnal);
                $this->load->view('cetak/cetak_ap', $data);
            }
        }
    }



}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */