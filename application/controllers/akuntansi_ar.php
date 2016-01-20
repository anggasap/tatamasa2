<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Akuntansi_ar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('master_advance_m');
        $this->load->model('akuntansi_m');
        $this->load->model('akuntansi_ar_m');
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
        $menuId = $this->home_m->get_menu_id('akuntansi_ar/home');
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
            $this->template->load('template/template3', 'transaksi/akuntansi_ar_v', $data);
        }
    }

    public function getBookingAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_ar_m->getBookingAll();
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

    function getReimpayAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_ar_m->getReimpayAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $jmlUang = number_format($row->jml_uang, 2);
            $array = array(
                'idReimpay' => trim($row->id_reimpay),
                'namaReq' => trim($row->nama_kyw),
                'jmlUang' => $jmlUang,
                'kodePerk' => trim($row->kode_perk),
                'namaPerk' => trim($row->nama_perk)
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    public function getSettlement()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->akuntansi_ar_m->getSettleAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $jmlUangPaid = number_format($row->jml_uang_paid, 2);
            $jmlUangAdv = number_format($row->jml_uang, 2);
            $array = array(
                'idSettle' => trim($row->id_settle_adv),
                'idAdv' => trim($row->id_advance),
                'namaReq' => trim($row->nama_kyw),
                'jmlUangAdv' => $jmlUangAdv,
                'jmlUangPaid' => $jmlUangPaid,
                'typeAdv' => $row->type_adv
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    function getJurnalPend()
    {
        $this->CI =& get_instance();
        $idJurnalPend = $this->input->post('idJurnalPend', TRUE);

        $rows = $this->akuntansi_ar_m->getJurnalPend($idJurnalPend);
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
        $masterId = trim($this->input->post('masterId'));

        //$ket = trim($this->input->post('keterangan'));
        $tglTrans = trim($this->input->post('tgltrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        //$kodeJurnal = trim($this->input->post('kodeJurnal'));
        // $jml_uang = str_replace(',', '', trim($this->input->post('uang')));

        $data_model2 = array(
            'status_akuntansi' => 1
        );
        $model2 = $this->akuntansi_ar_m->updateBooking_statusAkuntansi($data_model2,$masterId);
        $modelidJrAR = $this->akuntansi_ar_m->getIdJrAR($bulan, $tahun);
        $modelNoVoucher = '';
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
                    'trans_id' => $modelidJrAR,
                    'voucher_no' => $modelNoVoucher,
                    'tgl_trans' => $tglTrans,
                    'modul' => 2,
                    'kode_jurnal' => 'AR',
                    'master_id' => $masterId,
                    'id_proyek' => $idProyek,
                    'id_dept' => '',
                    'kode_perk' => $tmpKodePerk,
                    'debet' => $tmpDb,
                    'kredit' => $tmpKr,
                    'keterangan' => $tmpKet
                );
                $model = $this->akuntansi_m->insertTDPerk($data_perk);
                if ($model) {
                    $idTdPerk = $this->akuntansi_ar_m->getIdTDPerk($modelidJrAR, $tglTrans, $masterId, $idProyek, $tmpKodePerk, $tmpDb, $tmpKr);
                    if ($tmpKodeCflow <> '') {
                        $data_cflow = array(
                            'trans_id' => $modelidJrAR,
                            'voucher_no' => $modelNoVoucher,
                            'id_seq_perk' => $idTdPerk,
                            'tgl_trans' => $tglTrans,
                            'modul' => 2,
                            'kode_jurnal' => 'AR',
                            'master_id' => $masterId,
                            'id_proyek' => $idProyek,
                            'id_dept' => '',
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
                'idAR' => $modelidJrAR,
                'tipePesan' => 'success',
                'pesan' => 'Jurnal berhasil disimpan.'
            );
        } else {
            $array = array(
                'act' => 0,
                'tipePesan' => 'error',
                'pesan' => 'Jurnal gagal disimpan.'
            );
        }

        $this->output->set_output(json_encode($array));


    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */