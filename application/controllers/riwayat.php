<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('riwayat_m');
        $this->load->model('booking_m');
		$this->load->library('fpdf');
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
    function getRiwayat()
    {
        $this->CI =& get_instance();
        $idMaster = $this->input->post('idMaster', TRUE);
        $crows = $this->riwayat_m->getCJadwalJT($idMaster);
        if ($crows <= 0) {
            $array = array('baris' => 0);
            $rows['data_cpa'] = $array;
            $this->output->set_output(json_encode($rows));
        } else {
            $rows = $this->riwayat_m->getJadwalJT($idMaster);
            $this->output->set_output(json_encode($rows));
        }
    }




    function home()
    {
        $menuId = $this->home_m->get_menu_id('riwayat/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);


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
            $this->template->load('template/template3', 'laporan/riwayat_v', $data);
        }
    }

    function simpan()
    {
        $idCustomer = trim($this->input->post('customerId'));
        $rumahId    = trim($this->input->post('rumahId'));

        $tglTrans = trim($this->input->post('tglTrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $jmlBayarKali =  str_replace(',', '', trim($this->input->post('jmlBayarKali')));
        $tipePembayaran = trim($this->input->post('tipePembayaran'));

        $idPenj     = trim($this->input->post('idPenj'));

        $hargaRumah		    = str_replace(',', '', trim($this->input->post('hargaRumah')));
        //$hargaBooking		    = str_replace(',', '', trim($this->input->post('hargaBooking')));
        $DPPersen           = str_replace(',', '', trim($this->input->post('DPPersen')));
        $sisaDP		        = str_replace(',', '', trim($this->input->post('sisaDP')));
        $KPR                = (100 - $DPPersen)/100 * $hargaRumah;
        $hargaStlBooking		    = str_replace(',', '', trim($this->input->post('hargaStlBooking')));
        $kesepakatan    = trim($this->input->post('kesepakatan'));
        //1. jika belum booking maka insert 1 row
        if($idPenj == ''){

            // 2. Insert master jual status jual =2
            $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
            $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

            $idPenj = $this->booking_m->getIdPenj($bulan, $tahun);

            if($tipePembayaran == '3'){
                $data_master_jual = array(
                    'master_id'		=>$idPenj,
                    'id_rumah'		=>$rumahId,
                    'id_cust'		=>$idCustomer,
                    'tipe_bayar'    =>$tipePembayaran,
                    'dp'            =>$DPPersen,
                    'sisa_dp'       =>$KPR,
                    'tgl_trans'		=>$tglTrans,
                    'harga'			=>$sisaDP,
                    'status_jual'   =>2,
                    'kesepakatan'   =>$kesepakatan

                );
            }else{
                $data_master_jual = array(
                    'master_id'		=>$idPenj,
                    'id_rumah'		=>$rumahId,
                    'id_cust'		=>$idCustomer,
                    'tipe_bayar'    =>$tipePembayaran,
                    'tgl_trans'		=>$tglTrans,
                    'harga'			=>$hargaStlBooking,
                    'status_jual'   =>2,
                    'kesepakatan'   =>$kesepakatan

                );
            }
            $model_masterJual = $this->booking_m->simpan_masterJual($data_master_jual);

            //Status rumah dirubah jadi 2
            $data_master_rumah = array(
                'status_jual'		=>'2'
                /*
                 * 0 default non aktif
                 * 1 booking
                 * 2 aktif
                 * 3 lunas
                 * 4 batal
                 * */
            );

            $model_masterRumah = $this->booking_m->ubahRumah($data_master_rumah,$rumahId);

        // 2. jika sudah booking tnggal ubah status jualnya
        }else{
            // status master jual diubah ke 2
            $data_master_jual = array(
                'status_jual' => '2'
            );
            if($tipePembayaran == '3'){
                $data_master_jual = array(
                    'tipe_bayar'    =>$tipePembayaran,
                    'tgl_trans'		=>$tglTrans,
                    'dp'            =>$DPPersen,
                    'sisa_dp'       =>$KPR,
                    'harga'			=>$sisaDP,
                    'status_jual' => '2',
                    'kesepakatan'   =>$kesepakatan
                );

            }else{
                $data_master_jual = array(
                    'tipe_bayar'    =>$tipePembayaran,
                    'tgl_trans'		=>$tglTrans,
                    'harga'			=>$hargaStlBooking,
                    'status_jual' => '2',
                    'kesepakatan'   =>$kesepakatan
                );
            }
            $model_masterJual = $this->riwayat_m->ubahMasterJual($data_master_jual, $idPenj);

            // status rumah di ubah ke 2
            $data_master_rumah = array(
                'status_jual'		=>'2'
                /*
                 * 0 default non aktif
                 * 1 booking
                 * 2 aktif
                 * 3 lunas
                 * 4 batal
                 * */
            );

            $model_masterRumah = $this->booking_m->ubahRumah($data_master_rumah,$rumahId);

        }

        $jmlJadwal = trim($this->input->post('jmlBayarKali'));

        if ($jmlJadwal > 0) {
            for ($i = 1; $i <= $jmlJadwal; $i++) {
                $tTglJdw 	= 'tempTglJadwal' . $i;
                $tJumlah 	= 'tempJumlah' . $i;

                $tmpTglJdw 	    = trim($this->input->post($tTglJdw));
                $tmpTglJdw 		= date('Y-m-d', strtotime($tmpTglJdw));
                $tmpJumlah 		= str_replace(',', '', trim($this->input->post($tJumlah)));
				$modelidTrans = $this->booking_m->getKodeTrans();
				
                $data_trans = array(
					'kode_transaksi' => $modelidTrans,
                    'master_id'		 => $idPenj,
                    'tgl_trans'	 	 => $tmpTglJdw,
                    'kode_trans'	 => '200',
                    'jml_trans'		 => $tmpJumlah,
                    'keterangan'	 => ''
                );

                $model_trans = $this->riwayat_m->simpan_trans($data_trans);
            }
        }

        if ($model_trans) {
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
	
	function cetak($kodePenj,$idCust,$idRumah)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{
				
			$tglTrans = date('d-m-Y');
			$data['rows1'] 	= $this->riwayat_m->getDescRumahBooked($idRumah);
			$data['rows3']  = $this->riwayat_m->getAngsInfo($kodePenj);
			define('FPDF_FONTPATH',$this->config->item('fonts_path'));
			$data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');	
			$data['nama'] = 'PT BERKAH GRAHA MANDIRI';
			$data['tower'] = 'Beltway Office Park Tower Lt. 5';
			$data['alamat'] = 'Jl. TB Simatupang No. 41 - Pasar Minggu - Jakarta Selatan';
			$data['laporan'] = 'Laporan riwayat Tanggal '.$tglTrans;
			$data['user'] = $this->session->userdata('username');
			$this->load->view('cetak/cetak_laporan_riwayat', $data);
        }
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */