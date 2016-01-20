<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kasir_ar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('master_advance_m');
        $this->load->model('kasir_ar_m');
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
        $menuId = $this->home_m->get_menu_id('kasir_ar/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);
        $data['proyek'] = $this->master_advance_m->getProyek();
        $data['kodebayartunai'] = $this->kasir_ar_m->getKodeBayarTunai();
        $data['kodebayarnontunai'] = $this->kasir_ar_m->getKodeBayarNonTunai();
        $data['carabayar'] = $this->kasir_ar_m->getCaraBayar();

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
            $this->template->load('template/template3', 'transaksi/kasir_ar_v', $data);
        }
    }

    public function getBookingAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->kasir_ar_m->getBookingAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $jmlUang = number_format($row->jml_trans, 2);
            $array = array(
                'master_id' => trim($row->master_id),
                'id_rumah' => trim($row->id_rumah),
                'id_cust' => $row->id_cust,
                'nama_rumah' => trim($row->nama_rumah),
                'nama_cust' => trim($row->nama_cust),
                'jml_trans' => $jmlUang
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    function getDescKodeBayar()
    {
        $this->CI =& get_instance();
        $kdBayar = $this->input->post('kdBayar', TRUE);
        $kdBayar = trim($kdBayar);
        $rows = $this->kasir_ar_m->getDescKodeBayar($kdBayar);
        if ($rows) {
            foreach ($rows as $row)
                //$nilai_kurs = number_format($row->nilai_kurs, 2);
                $array = array(
                    'baris' => 1,
                    'kodePerk' => $row->kode_perk,
                    'namaPerk' => $row->nama_perk
                );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }
    function getJurnalKr()
    {
        $this->CI =& get_instance();
        $idMaster = $this->input->post('idMaster', TRUE);

            $rows = $this->kasir_ar_m->getJurnalKr($idMaster);
            $this->output->set_output(json_encode($rows));

    }
    function getJurnalKrSt()
    {
        $this->CI =& get_instance();
        $idMaster = $this->input->post('idMaster', TRUE);
        $jmlPaid = str_replace(',', '', trim($this->input->post('jmlPaid',TRUE)));

        $rows = $this->kasir_ar_m->getJurnalKrSt($idMaster,$jmlPaid);
        $this->output->set_output(json_encode($rows));

    }
    function getJurnalDb()
    {
        $this->CI =& get_instance();
        $idMaster = $this->input->post('idMaster', TRUE);
        $jmlPaid = str_replace(',', '', trim($this->input->post('jmlPaid',TRUE)));
        $rows = $this->kasir_ar_m->getJurnalDb($idMaster,$jmlPaid);
        $this->output->set_output(json_encode($rows));

    }
    function simpan()
    {
        $jnsReq = trim($this->input->post('jnsReq'));

        $idProyek = trim($this->input->post('proyek'));
        $idDept = '';
        $ket = trim($this->input->post('keterangan'));
        $tglTrans = trim($this->input->post('tgltrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $caraBayar = trim($this->input->post('carabayar'));
        if($caraBayar == 5){
            $kodeBayar = trim($this->input->post('kodebayartunai'));
        }else{
            $kodeBayar = trim($this->input->post('kodebayarnontunai'));
        }
        $noCekGiro = trim($this->input->post('noCekGiro'));
        $tglCekGiro = date('Y-m-d', strtotime(trim($this->input->post('tglCekGiro'))));

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $modelidPemb = $this->kasir_ar_m->getIdPemb($bulan, $tahun);
        $modelNoVoucher = $this->kasir_ar_m->getNoVoucher($bulan, $tahun);
        $data_model2 = array(
            'status_kasir'		      	=> 1
        );
        if($jnsReq == 'AV') {
            $id_master = trim($this->input->post('idAdvance'));
            $model2 = $this->kasir_ar_m->updatePP_statuskasir_ar($data_model2,$id_master);
        }else if($jnsReq == 'BK'){
            $id_master = trim($this->input->post('bookingId'));
            $model2 = $this->kasir_ar_m->updateBooking_statuskasir($data_model2,$id_master);
        }else if($jnsReq == 'RM'){
            $id_master = trim($this->input->post('idReimpay'));
            $model2 = $this->kasir_ar_m->updateReimpay_statuskasir_ar($data_model2,$id_master);
        }else if($jnsReq == 'ST'){
            $id_master = trim($this->input->post('idSettle'));
            $model2 = $this->kasir_ar_m->updateSettle_statuskasir_ar($data_model2,$id_master);
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
                    'trans_id' => $modelidPemb,
                    'modul' =>2,
                    'voucher_no'=>$modelNoVoucher,
                    'id_carabayar'=>$caraBayar,
                    'kode_bayar'=>$kodeBayar,
                    'no_cek'=>$noCekGiro,
                    'tgl_cek'=>$tglCekGiro,
                    'tgl_trans' => $tglTrans,
                    'kode_jurnal' => $jnsReq,
                    'master_id' => $id_master,
                    'id_proyek' => $idProyek,
                    'id_dept' => $idDept,
                    'kode_perk' => $tmpKodePerk,
                    'debet' => $tmpDb,
                    'kredit' => $tmpKr,
                    'keterangan' => $tmpKet
                );
                $model = $this->akuntansi_m->insertTDPerk($data_perk);
                if($model){
                    $idTdPerk = $this->akuntansi_m->getIdTDPerk($modelidPemb,$tglTrans,$id_master,$idProyek,$idDept,$tmpKodePerk,$tmpDb,$tmpKr);
                    if ($tmpKodeCflow <> '') {
                        $data_cflow = array(
                            'trans_id' => $modelidPemb,
                            'voucher_no'=>$modelNoVoucher,
                            'id_seq_perk'=>$idTdPerk,
                            'tgl_trans' => $tglTrans,
                            'kode_jurnal' => $jnsReq,
                            'master_id' => $id_master,
                            'id_proyek' => $idProyek,
                            'id_dept' => $idDept,
                            'kode_cflow' => $tmpKodeCflow,
                            'saldo_akhir' => $jmlCflow,
                            'keterangan' => $tmpKet
                        );
                        $model = $this->akuntansi_m->insertTDCflow($data_cflow);
                    }
                }

            }
        }

        if ($model) {
            $array = array(
                'act' => 1,
                'tipePesan' => 'success',
                'idPemb' => $modelidPemb,
                'jnsReq' =>$jnsReq,
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
    function cetak($idJurnal,$type)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{
            if($type == 'AV'){
                $data['all'] = $this->kasir_ar_m->getDataCetak($idJurnal);
                $data['detail'] = $this->kasir_ar_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran', $data);
            }elseif($type == 'RP'){
                $data['all'] = $this->kasir_ar_m->getDataCetakRp($idJurnal);
                $data['detail'] = $this->kasir_ar_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_rp', $data);
            }elseif($type == 'RM'){
                $data['all'] = $this->kasir_ar_m->getDataCetakRm($idJurnal);
                $data['detail'] = $this->kasir_ar_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_rm', $data);
            }else{
                $data['all'] = $this->kasir_ar_m->getDataCetakSt($idJurnal);
                $data['detail'] = $this->kasir_ar_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_st', $data);
            }
        }
    }

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */