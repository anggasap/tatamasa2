<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Booking_jual extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('booking_jual_m');
        //$this->load->model('booking_m');
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

    function getDescRumah()
    {
        $this->CI =& get_instance();
        $idRumah = $this->input->post('idRumah', TRUE);
        $rows = $this->booking_jual_m->getDescRumah($idRumah);
        if ($rows) {
            foreach ($rows as $row)
                $luas = number_format($row->luas, 2);
            $harga = number_format($row->harga, 2);
            $array = array(
                'baris' => 1,
                //'id_rumah' => $row->id_rumah,
                'id_proyek' => $row->id_proyek,
                'nama_proyek' => $row->nama_proyek,
                'nama_rumah' => $row->nama_rumah,
                'type' => $row->tipe,
                'blok' => $row->blok,
                'luas' => $luas,
                'harga' => $harga,
                'status_jual' => $row->status_jual
                //'' => $row->
            );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    function getDescRumahBooked()
    {
        $this->CI =& get_instance();
        $idRumah = $this->input->post('idRumah', TRUE);
        $rows = $this->booking_jual_m->getDescRumahBooked($idRumah);
        if ($rows) {
            foreach ($rows as $row)
                $luas = number_format($row->luas, 2);
            $booking = number_format($row->booking, 2);
            $harga = number_format($row->harga, 2);
            $tgl_booking = date('d-m-Y', strtotime($row->tgl_trans));

            $array = array(
                'baris' => 1,
                'id_penj' => $row->master_id,
                'id_proyek' => $row->id_proyek,
                'nama_proyek' => $row->nama_proyek,
                'nama_rumah' => $row->nama_rumah,
                'type' => $row->tipe,
                'blok' => $row->blok,
                'luas' => $luas,
                'booking' => $booking,
                'tgl_booking' => $tgl_booking,
                'harga' => $harga,
                'status_jual' => $row->status_jual,
                'id_cust' => $row->id_cust,
                'alamat' => $row->alamat,
                'nama_cust' => $row->nama_cust,
                'no_id' => $row->no_id,
                'no_hp' => $row->no_hp,
                'no_telp' => $row->no_telp
                //'' => $row->
            );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    public function getRumahAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->booking_jual_m->getRumahAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $harga = number_format(trim($row->harga), 2);

            if ($row->status_jual == '0') {
                $status_jual = "Available";
            } else if ($row->status_jual == '1') {
                $status_jual = "Booked";
            }
            if ($row->status_jual == '2') {
                $status_jual = "Terjual";
            }
            $array = array(
                'id_rumah' => trim($row->id_rumah),
                'nama_proyek' => trim($row->nama_proyek),
                'nama_rumah' => trim($row->nama_rumah),
                'luas' => trim($row->luas),
                'harga' => $harga,
                'status_jual' => $status_jual
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    function home()
    {
        $menuId = $this->home_m->get_menu_id('booking_jual/home');
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
            $this->template->load('template/template3', 'transaksi/booking_jual_v', $data);
        }
    }

    function simpan()
    {
        $idCustomer = trim($this->input->post('customerId'));
        $rumahId = trim($this->input->post('rumahId'));
        $namaRumah		    = trim($this->input->post('namaRumah'));

        $tglTrans = trim($this->input->post('tglTrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
        $jmlBayarKali = str_replace(',', '', trim($this->input->post('jmlBayarKali')));
        $tipePembayaran = trim($this->input->post('tipePembayaran'));

        $idPenj = trim($this->input->post('idPenj'));

        $hargaRumah = str_replace(',', '', trim($this->input->post('hargaRumah')));
        $diskon = str_replace(',', '', trim($this->input->post('diskon')));
        $hargaStlDiskon = str_replace(',', '', trim($this->input->post('hargaStlDiskon')));
        //$hargaBooking		    = str_replace(',', '', trim($this->input->post('hargaBooking')));
        $DPPersen = str_replace(',', '', trim($this->input->post('DPPersen')));
        $sisaDP = str_replace(',', '', trim($this->input->post('sisaDP')));
        $KPR = (100 - $DPPersen) / 100 * $hargaStlDiskon;
        $hargaStlBooking = str_replace(',', '', trim($this->input->post('hargaStlBooking')));

        $kesepakatan = trim($this->input->post('kesepakatan'));

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $idPenj = $this->booking_jual_m->getIdPenj($bulan, $tahun);
        if($namaRumah =='' || $hargaRumah <= 0 || $idCustomer ==''){
            $array = array(
                'act'	=>0,
                'tipePesan'=>'error',
                'pesan' =>'Rumah gagal dibooking.<br>Silahkan lengkapi data master rumah terlebih dahulu.'
            );
        }else{
            if ($tipePembayaran == '3') {
                $data_master_jual = array(
                    'master_id' => $idPenj,
                    'id_rumah' => $rumahId,
                    'id_cust' => $idCustomer,
                    'tipe_bayar' => $tipePembayaran,
                    'dp' => $DPPersen,
                    'sisa_dp' => $KPR,// sisa dp akan di kpr kan
                    'tgl_trans' => $tglTrans,
                    'harga' => $sisaDP,//bener = harga dp(dari harga stl diskon*%dp) - booking
                    'status_jual' => 1,
                    'id_kyw' => $this->session->userdata('id_kyw'),
                    'kesepakatan' => $kesepakatan

                );
            } else {
                $data_master_jual = array(
                    'master_id' => $idPenj,
                    'id_rumah' => $rumahId,
                    'id_cust' => $idCustomer,
                    'tipe_bayar' => $tipePembayaran,
                    'tgl_trans' => $tglTrans,
                    'harga' => $hargaStlBooking,
                    'status_jual' => 1,
                    'id_kyw' => $this->session->userdata('id_kyw'),
                    'kesepakatan' => $kesepakatan

                );
            }
            $model_masterJual = $this->booking_jual_m->simpan_masterJual($data_master_jual);

            $jmlJadwal = trim($this->input->post('jmlBayarKali'));
            if ($jmlJadwal > 0) {
                for ($i = 1; $i <= $jmlJadwal; $i++) {
                    $tTglJdw = 'tempTglJadwal' . $i;
                    $tJumlah = 'tempJumlah' . $i;

                    $tmpTglJdw = trim($this->input->post($tTglJdw));
                    $tmpTglJdw = date('Y-m-d', strtotime($tmpTglJdw));
                    $tmpJumlah = str_replace(',', '', trim($this->input->post($tJumlah)));
                    $modelidTrans = $this->booking_jual_m->getKodeTrans();

                    $data_trans = array(
                        'kode_transaksi' => $modelidTrans,
                        'master_id' => $idPenj,
                        'tgl_trans' => $tmpTglJdw,
                        'kode_trans' => '200',
                        'jml_trans' => $tmpJumlah,
                        'keterangan' => ''
                    );

                    $model_trans = $this->booking_jual_m->simpan_trans($data_trans);
                }
            }
            if($model_trans){
                $array = array(
                    'act'	=>1,
                    'kode_penjualan' 	=> $idPenj,
                    'kode_transaksi' 	=> $modelidTrans,
                    'tipePesan'=>'success',
                    'pesan' =>'Rumah berhasil dibooking.'
                );
            }else{
                $array = array(
                    'act'	=>0,
                    'tipePesan'=>'error',
                    'pesan' =>'Rumah gagal dibooking.'
                );
            }

        }

        $this->output->set_output(json_encode($array));
    }
    function cetakInv($kodeBooking,$kodetr)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{
            $tglTrans = date('d-m-Y');
            $bulan = date('m', strtotime($tglTrans));
            $tahun = date('Y', strtotime($tglTrans));
            $data['invoice'] = $this->booking_jual_m->getKodeInvoice($bulan,$tahun);
            $data = array(
                'invoice'		=>$data['invoice']
            );
            $update 		= $this->booking_jual_m->updateTransJual($data,$kodetr);
            $data['all'] 	= $this->booking_jual_m->getDataCetak($kodeBooking);
            $this->load->view('cetak/cetak_invoice_booking', $data);
        }
    }

    function cetakInfoPenj($kodePenj, $idCust, $idRumah)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        } else {

            $tglTrans = date('d-m-Y');
            $data['rows1'] = $this->booking_jual_m->getDescRumahBooked($idRumah);
            $data['rows3'] = $this->booking_jual_m->getAngsInfo($kodePenj);
            define('FPDF_FONTPATH', $this->config->item('fonts_path'));
            $data['image1'] = base_url('metronic/img/tatamasa_logo.jpg');
            $data['nama'] = 'PT BERKAH GRAHA MANDIRI';
            $data['tower'] = 'Beltway Office Park Tower Lt. 5';
            $data['alamat'] = 'Jl. TB Simatupang No. 41 - Pasar Minggu - Jakarta Selatan';
            $data['laporan'] = 'Laporan Penjualan Tanggal ' . $tglTrans;
            $data['user'] = $this->session->userdata('username');
            $this->load->view('cetak/cetak_laporan_penjualan', $data);
        }
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */