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
        $idKyw = trim($this->input->post('kywId'));
        $uangMuka = str_replace(',', '', trim($this->input->post('uangMuka')));
        $idProyek = trim($this->input->post('proyek'));
        $idKurs = trim($this->input->post('kurs'));
        $nilaiKurs = str_replace(',', '', trim($this->input->post('nilaiKurs')));
        $idKyw = trim($this->input->post('kywId'));
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
        //$ket			= trim($this->input->post(''));

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $modelidAdv = $this->master_advance_m->getIdAdv($bulan, $tahun);
        $data = array(
            'id_advance' => $modelidAdv,
            'id_kyw' => $idKyw,
            'jml_uang' => $uangMuka,
            'id_proyek' => $idProyek,
            'id_kurs' => $idKurs,
            'nilai_kurs' => $nilaiKurs,
            'tgl_trans' => $tglTrans,
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
        $model = $this->master_advance_m->insertAdv($data);

        $totJurnal = trim($this->input->post('txtTempLoop'));
        if ($totJurnal > 0) {
            for ($i = 1; $i <= $totJurnal; $i++) {
                $tKodePerk 	= 'tempKodePerk' . $i;
                $tKodeCflow = 'tempKodeCflow' . $i;
                $tJumlah 	= 'tempJumlah' . $i;
                $tKet 		= 'tempKet' . $i;

                $tmpKodePerk 	= trim($this->input->post($tKodePerk));
                $tmpKodeCflow 	= trim($this->input->post($tKodeCflow));
                $tmpJumlah 		= str_replace(',', '', trim($this->input->post($tJumlah)));
                $tmpKet 		= trim($this->input->post($tKet));
                $TotalC 		= $this->master_advance_m->get_terpakai_cflow($tmpKodeCflow);
                $TotalP 		= $this->master_advance_m->get_terpakai_perk($tmpKodePerk);
                $data = array(
                    'id_cpa' => 0,
                    'id_master' 	=> $modelidAdv,
                    'kode_perk' 	=> $tmpKodePerk,
                    'kode_cflow' 	=> $tmpKodeCflow,
                    'keterangan' 	=> $tmpKet,
                    'jumlah' 		=> $tmpJumlah
                );
                $query = $this->master_advance_m->insertCpa($data);
                $totalCflow = $TotalC + $tmpJumlah;
                $totalCPerk = $TotalP + $tmpJumlah;

                $dataTerpakaiCflow  = array(
                    'terpakai' => $totalCflow
                );

                $dataTerpakaiPerk  = array(
                    'terpakai' => $totalCperk
                );
                $query = $this->master_advance_m->updateBudgetCflowTerpakai($tmpKodeCflow,$tahun,$idProyek,$dataTerpakaiCflow);
                $query = $this->master_advance_m->updateBudgetCflowSaldo($tmpKodeCflow,$tahun,$idProyek);
                $query = $this->master_advance_m->updateBudgetKdPerkTerpakai($tmpKodePerk,$tahun,$idProyek,$dataTerpakaiPerk);
                $query = $this->master_advance_m->updateBudgetKdPerkSaldo($tmpKodePerk,$tahun,$idProyek);
            }
            $tmpKodeCflow 	= trim($this->input->post($tKodeCflow));
            $TotalC 		= $this->master_advance_m->get_total_cflow($tmpKodeCflow);
            $total 			= $totalC - $totalCflow;
            $data = array(
                'inout_budget' => '1'
            );
            if ($total <= 0){
                $model 			= $this->master_advance_m->updateAdv($data, $modelidAdv);
            }
        }

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
                $dataTerpakai  = array(
                    'terpakai' => $tmpJumlah
                );
                $query = $this->master_advance_m->updateBudgetCflowTerpakai($tmpKodeCflow,$tahun,$idProyek,$dataTerpakai);
                $query = $this->master_advance_m->updateBudgetCflowSaldo($tmpKodeCflow,$tahun,$idProyek);
                $query = $this->master_advance_m->updateBudgetKdPerkTerpakai($tmpKodePerk,$tahun,$idProyek,$dataTerpakai);
                $query = $this->master_advance_m->updateBudgetKdPerkSaldo($tmpKodePerk,$tahun,$idProyek);
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
    function sign(){
        $this->CI =& get_instance();
        $idAdvance	= trim($this->input->post('idAdvance'));
        $flag  		= $this->session->userdata('id_kyw');
        $data = array(
            'app_user_id' => $flag
        );
        $model 		= $this->master_advance_m->updateAdv($data,$idAdvance);

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
    function cetak($idAdv)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        } else {
            $data['advance'] = $this->master_advance_m->getDescAdv($idAdv);
            $this->load->view('cetak/cetak_advance', $data);
        }
    }

    function cetak_cpa($idAdv)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        } else {
            $data['advance'] = $this->master_advance_m->cetak_cpa($idAdv);
            $data['detail'] = $this->master_advance_m->cetak_cpa_detail($idAdv);
            $this->load->view('cetak/cetak_cpa', $data);
        }
    }

    function cetak_pp($idAdv)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        } else {
            $data['advance'] = $this->master_advance_m->cetak_cpa($idAdv);
            $data['detail'] = $this->master_advance_m->cetak_cpa_detail($idAdv);
            $this->load->view('cetak/cetak_cpa', $data);
        }
    }


}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */