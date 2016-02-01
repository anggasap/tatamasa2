<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembatalan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('master_advance_m');
        $this->load->model('pembatalan_m');
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
        $menuId = $this->home_m->get_menu_id('pembatalan/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);
       // $data['proyek'] = $this->master_advance_m->getProyek();


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
            $this->template->load('template/template3', 'transaksi/pembatalan_v', $data);
        }
    }

    public function getPenjualanAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->pembatalan_m->getPenjualanAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $status_jual_no = trim($row->status_jual);
            if($status_jual_no == '1'){
                $status_jual = 'Booked';
            }elseif($status_jual_no == '2'){
                $status_jual = 'Terjual';
            }
            $array = array(
                'master_id' => trim($row->master_id),
                'id_rumah' => trim($row->id_rumah),
                'id_cust' => $row->id_cust,
                'nama_rumah' => trim($row->nama_rumah),
                'nama_cust' => trim($row->nama_cust),
                'status_jual' => $status_jual
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }
    function getAngsInfo()
    {
        $this->CI =& get_instance();
        $idPenj = $this->input->post('idPenj', TRUE);
        $rows = $this->pembatalan_m->getAngsInfo2($idPenj);
        if ($rows) {
                $array = array(
                    'baris' 		=> 1,
                    'sisaAngs' 		=> $rows[0]->sisaAngs,
                    'sdhdibayar' 	=> $rows[0]->sdhdibayar
                    //'' => $row->
                );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    function simpan()
    {
        $kodePenj   = trim($this->input->post('kodePenj'));

        $idRumah    = trim($this->input->post('rumahId'));
        $ket        = trim($this->input->post('keterangan'));
        $tglTrans   = trim($this->input->post('tgltrans'));
        $tglTrans   = date('Y-m-d', strtotime($tglTrans));

        $bulan      = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun      = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");


        $data_master_jual = array(
            'status_jual'		      	=> 4
        );
        $data_master_rumah = array(
            'status_jual'		      	=> 0
        );
        $model = $this->pembatalan_m->update_statusmasterjual($data_master_jual,$kodePenj);
        $model = $this->pembatalan_m->update_statusmasterrumah($data_master_rumah,$idRumah);

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


    function cetak($idJurnal,$type)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{
            if($type == 'AV'){
                $data['all'] = $this->pembatalan_m->getDataCetak($idJurnal);
                $data['detail'] = $this->pembatalan_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran', $data);
            }elseif($type == 'RP'){
                $data['all'] = $this->pembatalan_m->getDataCetakRp($idJurnal);
                $data['detail'] = $this->pembatalan_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_rp', $data);
            }elseif($type == 'RM'){
                $data['all'] = $this->pembatalan_m->getDataCetakRm($idJurnal);
                $data['detail'] = $this->pembatalan_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_rm', $data);
            }else{
                $data['all'] = $this->pembatalan_m->getDataCetakSt($idJurnal);
                $data['detail'] = $this->pembatalan_m->getDetailDataCetak($idJurnal);
                $this->load->view('cetak/cetak_pembayaran_st', $data);
            }
        }
    }

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */