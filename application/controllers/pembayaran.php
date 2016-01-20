<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('pembayaran_m');
        $this->load->model('booking_m');
        $this->load->model('kasir_m');
		$this->load->model('akuntansi_m');
        $this->load->model('kasir_ar_m');
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

    public function getRumahAll()
    {
        $this->CI =& get_instance();//and a.kcab_id<>'1100'
        $rows = $this->pembayaran_m->getRumahAll();
        $data['data'] = array();
        foreach ($rows as $row) {
            $harga = number_format(trim($row->harga_deal), 2);

            $array = array(
                'id_rumah' => trim($row->id_rumah),
                'master_id' => trim($row->master_id),
                'nama_proyek' => trim($row->nama_proyek),
                'nama_rumah' => trim($row->nama_rumah),
                'luas' => trim($row->luas),
                'harga' => $harga
            );

            array_push($data['data'], $array);
        }
        $this->output->set_output(json_encode($data));
    }

    function getDescRumahSelled()
    {
        $this->CI =& get_instance();
        $idRumah = $this->input->post('idRumah', TRUE);
        $rows = $this->pembayaran_m->getDescRumahSelled($idRumah);
        if ($rows) {
            foreach ($rows as $row)
                $luas = number_format($row->luas, 2);
                $harga = number_format($row->harga, 2);
                $tgl_trans = date('d-m-Y', strtotime($row->tgl_trans));

            $array = array(
                'baris' => 1,
                'id_penj' => $row->master_id,
                'id_proyek' => $row->id_proyek,
                'nama_rumah' => $row->nama_rumah,
                'type' => $row->tipe,
                'blok' => $row->blok,
                'luas' => $luas,
                'tgl_trans' => $tgl_trans,
                'harga' => $harga,
                'status_jual' => $row->status_jual,
                'id_cust' => $row->id_cust,
                'alamat' => $row->alamat,
                'nama_cust' => $row->nama_cust,
                'no_id' => $row->no_id,
                'no_hp' => $row->no_hp,
                'no_telp' => $row->no_telp,
                'kode_perk' => $row->kode_perk,
                'nama_perk' => $row->nama_perk
                //'' => $row->
            );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }
    function getAngsInfo1()
    {
        $this->CI =& get_instance();
        $idPenj = $this->input->post('idPenj', TRUE);
        $rows = $this->pembayaran_m->getAngsInfo1($idPenj);
        if ($rows) {
            foreach ($rows as $row)
            $array = array(
                'baris' => 1,
                'allAngs' => $row->allAngs,
                'sisaAngs' => $row->sisaAngs,
                'jmlAngs' => $row->jmlAngs,
                'angsKe' => $row->angsKe
                //'' => $row->
            );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }
    function getAngsInfo2()
    {
        $this->CI 	=& get_instance();
        $idPenj 	= $this->input->post('idPenj', TRUE);
        $tglTrans 	= $this->input->post('tglTrans', TRUE);
        $tglTrans 	= date('Y-m-d', strtotime($tglTrans));
        $rows = $this->pembayaran_m->getAngsInfo2($idPenj,$tglTrans);
        if ($rows) {
            foreach ($rows as $row)
				if($row->tagihan <= 0){
					$tagihan = 0;
				}else{
					$tagihan = $row->tagihan;
				} 
                $array = array(
                    'baris' 		=> 1,
                    'sisaAngs' 		=> $row->sisaAngs,
                    'tagihan' 		=> $tagihan,
                    'sdhdibayar' 	=> $row->sdhdibayar
                    //'' => $row->
                );
        } else {
            $array = array('baris' => 0);
        }

        $this->output->set_output(json_encode($array));
    }

    function home()
    {
        $menuId = $this->home_m->get_menu_id('pembayaran/home');
        $data['menu_id'] = $menuId[0]->menu_id;
        $data['menu_parent'] = $menuId[0]->parent;
        $data['menu_nama'] = $menuId[0]->menu_nama;
        $this->auth->restrict($data['menu_id']);
        $this->auth->cek_menu($data['menu_id']);
        //$data['kodebayar'] = $this->kasir_m->getKodeBayar();
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
            $this->template->load('template/template3', 'transaksi/pembayaran_v', $data);
        }
    }

    function simpan()
    {
        $tglTrans = trim($this->input->post('tglTrans'));
        $tglTrans = date('Y-m-d', strtotime($tglTrans));
		$idProyek = trim($this->input->post('proyek'));
        $idPenj     = trim($this->input->post('idPenj'));
        $keterangan = trim($this->input->post('keterangan'));
		$hargaJual 	= str_replace(',', '', trim($this->input->post('hargaJual')));
        $jmlBayar 	= str_replace(',', '', trim($this->input->post('jmlBayar')));
		$modelidTrans = $this->booking_m->getKodeTrans();
		
        $data_trans = array(
			'kode_transaksi'=>$modelidTrans,
            'master_id'		=>$idPenj,
            'tgl_trans'		=>$tglTrans,
            'kode_trans'	=>'300',
            'jml_trans'		=>$jmlBayar,
            'keterangan'	=>$keterangan
        );
		
		if($hargaJual == $jmlBayar){
			$data = array(
				'status_jual' => 3
			);
			$model_jual = $this->pembayaran_m->updateMasterJual($data,$idPenj);	
		}
        $model_trans = $this->pembayaran_m->simpan_trans($data_trans);

        $bulan = date('m', strtotime($tglTrans));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tglTrans)); //$tglTrans->format("Y");

        $modelidJrAR = $this->booking_m->getIdJrAR($bulan, $tahun);
        $modelNoVoucher = $this->kasir_m->getNoVoucher($bulan, $tahun);
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
                    'voucher_no'=>$modelNoVoucher,
                    'tgl_trans' => $tglTrans,
                    'modul'		=>2,
                    'kode_jurnal' => 'AR',
                    'master_id' => $idPenj,
                    'id_proyek' => $idProyek,
                    'id_dept' => '',
                    'kode_perk' => $tmpKodePerk,
                    'debet' => $tmpDb,
                    'kredit' => $tmpKr,
                    'keterangan' => $tmpKet
                );
                $model = $this->akuntansi_m->insertTDPerk($data_perk);
                if($model){
                    $idTdPerk = $this->booking_m->getIdTDPerk($modelidJrAR,$tglTrans,$idPenj,$idProyek,$tmpKodePerk,$tmpDb,$tmpKr);
                    if ($tmpKodeCflow <> '') {
                        $data_cflow = array(
                            'trans_id' => $modelidJrAR,
                            'voucher_no'=>$modelNoVoucher,
                            'id_seq_perk'=>$idTdPerk,
                            'tgl_trans' => $tglTrans,
                            'modul'		=>2,
                            'kode_jurnal' => 'AR',
                            'master_id' => $idPenj,
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
        if ($model_trans) {
            $array = array(
                'act' => 1,
				'kode' => $modelidTrans,
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
	function cetak($kodePenj,$kodetr,$idRumah)
    {
        if ($this->auth->is_logged_in() == false) {
            redirect('main/index');
        }else{			
			$tglTrans 	= date('d-m-Y');
			$bulan 		= date('m', strtotime($tglTrans));
			$tahun 		= date('Y', strtotime($tglTrans));
			$data['invoice'] = $this->booking_m->getKodeInvoice($bulan,$tahun);
			$data = array(
				'invoice'	=> $data['invoice'],
			);
			$update 		= $this->booking_m->updateTransJual($data,$kodetr);
			$data['rows1'] 	= $this->pembayaran_m->getDescRumahSelled($idRumah);
			$data['rows2']  = $this->pembayaran_m->getAngsInfo1($kodePenj);
			$data['rows3']  = $this->pembayaran_m->getAngsInfo2($kodePenj,$tglTrans);
			$data['all'] 	= $this->booking_m->getDataCetak($kodePenj);
			$this->load->view('cetak/cetak_kwitansi_pembayaran', $data);
        }
    }
}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */