<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kasir extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('master_advance_m');
        $this->load->model('kasir_m');
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
        $menuId = $this->home_m->get_menu_id('kasir/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);
        $data['proyek'] = $this->master_advance_m->getProyek();
        $data['kodebayar'] = $this->kasir_m->getKodeBayar();

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
            $this->template->load('template/template3', 'transaksi/kasir_v', $data);
        }
    }

    public function getAdvAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->kasir_m->getAdvAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $jmlUang = number_format($row->jml_uang, 2);
            $array = array(
                'idPp' => trim($row->id_pp),
                'idAdv' => trim($row->id_advance),
                'namaKyw' => trim($row->nama_kyw),
                'dept' => trim($row->nama_dept),
                'jmlUang' => $jmlUang
            );
            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    function getDescAdv()
    {
        $this->CI =& get_instance();
        $idAdv = $this->input->post('idAdv', TRUE);
        $rows = $this->kasir_m->getDescAdv($idAdv);
        if ($rows) {
            foreach ($rows as $row)
                $jmlUang = number_format($row->jml_uang, 2);
            $tglTrans = date('d-m-Y', strtotime($row->tgl_trans));
            $tglJT = date('d-m-Y', strtotime($row->tgl_jt));
            $array = array(
                'baris' => 1,
                'nama_kyw' => $row->nama_kyw,
                'id_dept' => $row->id_dept,
                'jml_uang' => $jmlUang,
                'id_proyek' => $row->id_proyek,
                'tgl_trans' => $tglTrans,
                'tgl_jt' => $tglJT,
                'kodePerkUM' => $row->kode_perk,
                'namaPerkUM' => $row->nama_perk,
                'keterangan' => $row->keterangan
                //'' => $row->
            );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    function getDescKodeBayar()
    {
        $this->CI =& get_instance();
        $kdBayar = $this->input->post('kdBayar', TRUE);
        $kdBayar = trim($kdBayar);
        $rows = $this->kasir_m->getDescKodeBayar($kdBayar);
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

    function getCflow()
    {
        $this->CI =& get_instance();
        $idAdv = $this->input->post('idAdv', TRUE);
        $idAdv = trim($idAdv);
        $rows = $this->kasir_m->getCflow($idAdv);
        if ($rows) {
            foreach ($rows as $row)
                //$nilai_kurs = number_format($row->nilai_kurs, 2);
                $array = array(
                    'baris' => 1,
                    'kodeCflow' => $row->kode_cflow,
                    'namaCflow' => $row->nama_cflow
                );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    function simpan()
    {
        $jnsReq = trim($this->input->post('jnsReq'));

        $idProyek = trim($this->input->post('proyek'));
        $idDept = trim($this->input->post('dept'));
        $kodePerk = trim($this->input->post('kodePerk'));
        $kodeCflow = trim($this->input->post('kodeCflow'));
        $ket = trim($this->input->post('keterangan'));
        $tglTrans = trim($this->input->post('tgltrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $modelidPemb = $this->kasir_m->getIdPemb($bulan, $tahun);
        //if ($jnsReq == '1') {
            $id_master = trim($this->input->post('idAdvance'));
            $jml_uang = str_replace(',', '', trim($this->input->post('uang')));

            $data_perk = array(
                'trans_id' => $modelidPemb,
                'tgl_trans' => $tglTrans,
                'kode_jurnal' => 'ADV',
                'master_id' => $id_master,
                'id_proyek' => $idProyek,
                'id_dept' => $idDept,
                'kode_perk' => $kodePerk,
                'debet' => $jml_uang,
                'keterangan' => $ket,
                //        		''		        	=>$,
            );
            $model = $this->kasir_m->insertAdvPerk($data_perk);
            $data_perk = array(
                'trans_id' => $modelidPemb,
                'tgl_trans' => $tglTrans,
                'kode_jurnal' => 'ADV',
                'master_id' => $id_master,
                'id_proyek' => $idProyek,
                'id_dept' => $idDept,
                'kode_perk' => $kodePerk,
                'kredit' => $jml_uang,
                'keterangan' => $ket,
                //        		''		        	=>$,
            );
            $model = $this->kasir_m->insertAdvPerk($data_perk);
            $data_cflow = array(
                'trans_id' => $modelidPemb,
                'tgl_trans' => $tglTrans,
                'kode_jurnal' => 'ADV',
                'master_id' => $id_master,
                'id_proyek' => $idProyek,
                'id_dept' => $idDept,
                'kode_cflow' => $kodeCflow,
                'saldo_akhir' => $jml_uang,
                'keterangan' => $ket,
                //        		''		        	=>$,
            );
            $model = $this->kasir_m->insertAdvCflow($data_cflow);
            if ($model) {
                $array = array(
                    'act' => 1,
                    'tipePesan' => 'success',
                    'idPemb' => $modelidPemb,
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
        //}


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


}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */