<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sec_koneksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('home_m');
        $this->load->model('sec_koneksiM');
        $this->load->library('kripton');
        $this->load->helper('file');
        session_start();
    }

    public function index()
    {
        $this->home();
    }

    function home()
    {
        if (isset($_POST["btnCreate"])) {
            $this->simpan();
        } else {
            $this->template->set('title', 'Konfigurasi Koneksi Database');
            $this->template->load('template/templateKoneksi', 'admin/sec_koneksi_v');
        }
    }

    function simpan()
    {
        $config['upload_path'] = 'insyst/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '100';

        $serverDb = trim($this->input->post('serverDb'));
        $namaDb = trim($this->input->post('namaDb'));
        $userDb = trim($this->input->post('userDb'));
        $passwdDb = trim($this->input->post('passwdDb'));
        $portDb = trim($this->input->post('portDb'));
/*ISI FILE DATABASE.PHP*/
        $dataKoneksi = '<?php  if ( ! defined(\'BASEPATH\')) exit(\'No direct script access allowed\');

$active_group = \'config1\';
$active_record = TRUE;

$db[\'config1\'][\'hostname\'] = \'' . $serverDb . ':' . $portDb . '\';
$db[\'config1\'][\'username\'] = \'' . $userDb . '\';
$db[\'config1\'][\'password\'] = \'' . $passwdDb . '\';
$db[\'config1\'][\'database\'] = \'' . $namaDb . '\';
$db[\'config1\'][\'dbdriver\'] = \'mysql\';
$db[\'config1\'][\'dbprefix\'] = \'\';
$db[\'config1\'][\'pconnect\'] = TRUE;
$db[\'config1\'][\'db_debug\'] = TRUE;
$db[\'config1\'][\'cache_on\'] = FALSE;
$db[\'config1\'][\'cachedir\'] = \'\';
$db[\'config1\'][\'char_set\'] = \'utf8\';
$db[\'config1\'][\'dbcollat\'] = \'utf8_general_ci\';
$db[\'config1\'][\'swap_pre\'] = \'\';
$db[\'config1\'][\'autoinit\'] = TRUE;
$db[\'config1\'][\'stricton\'] = FALSE; ';
/*END ISI FILE DATABASE.PHP*/
        /*LOAD LIBRARY UPLOAD FILE*/
        $this->load->library('upload', $config);
        /*UPLOAD KEY FILE*/
        if (!$this->upload->do_upload('institusiFile')) {//JIKA GAGAL UPLOAD TAMPILKAN PESAN ERROR
            $error = $this->upload->display_errors();

            $this->session->set_flashdata('error', $error);
            redirect('sec_koneksi/home');
        } else {
            //JIKA BERHASIL UPLOAD
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $path_file = 'insyst/' . $file_name;

            //BACA KEY FILE
            $string_file = read_file($path_file);

            $kunci = 'microtechwebmitra';

            //DEKRIPSI FILE KEY
            $decryptedText = $this->kripton->decrypt($string_file, $kunci);

            //CEK SIZE OF KEY FILE
            $decryptedTextArray = explode('_', $decryptedText);
            $sizeArrayDecryptedTextArray = sizeof($decryptedTextArray);
            /*DEKRIPSI DALAM VARIABEL*/
            $namaInstitusi      = $decryptedTextArray[0];
            $serialNumber       = $decryptedTextArray[1];
            $maxCab             = $decryptedTextArray[2];
            $cipher             = $decryptedTextArray[3];
            $kodeCabang         = $decryptedTextArray[4];
            $namaCabang         = $decryptedTextArray[5];
            $passwdAdm          = $decryptedTextArray[6];
            $expired            = $decryptedTextArray[7];

            //SERIAL NUMBER DAN PASSWORD ADMINISTRATOR DIENKRIP DENGAN CIPHER
            $serialNumberEnc = $this->kripton->encrypt($serialNumber,$cipher);
            $passwdAdmEnc    = $this->kripton->encrypt($passwdAdm,$cipher);

            //HAPUS KEY FILE DARI DIREKTORI
            unlink($path_file);

            //JIKA KEY FILE SIZE NYA BENAR
            if($sizeArrayDecryptedTextArray==8){
                $file_name = 'database.php';
                $path_file = 'application/config/' . $file_name;
                //CREATE FILE DATABASE.PHP
                if (!write_file($path_file, $dataKoneksi)) {
                    //JIKA GAGAL CREATE FILE DATABASE.PHP TAMPILKAN PESAN ERROR
                    $this->session->set_flashdata('error', 'Create file koneksi gagal !');
                    redirect('sec_koneksi/home');
                } else {
                    //JIKA BERHASIL LANGSUNG TEST KONEKSI DATABASE
                    $testKoneksiDatabase = $this->load->database('config1',TRUE);
                    /*JIKA KONEKSI DATABASE GAGAL*/
                    if(!$testKoneksiDatabase){
                        $this->session->set_flashdata('error', 'Test koneksi gagal !');
                        redirect('sec_koneksi/home');
                    }else{
                        /*JIKA KONEKSI OK ==> CEK TABEL pi_institusi*/
                        $cekTabelPi_institusi = $this->db->table_exists('pi_institusi');
                        if(!$cekTabelPi_institusi){
                            /*JIKA TABEL pi_institusi gak ada*/
                            $this->session->set_flashdata('error', 'Tabel pi_institusi belum ada!');
                            redirect('sec_koneksi/home');
                        }else{
                            /*JIKA TABEL pi_institusi ada => CEK TABEL pi_cabang*/
                            $cekTabelPi_cabang = $this->db->table_exists('pi_cabang');
                            /*JIKA TABEL pi_cabang gak ada*/
                            if(!$cekTabelPi_cabang){
                                $this->session->set_flashdata('error', 'Tabel pi_cabang belum ada!');
                                redirect('sec_koneksi/home');
                            }else{
                                /*JIKA TABEL pi_cabang ada => CEK TABEL sc_user*/
                                $cekTabelSc_user = $this->db->table_exists('sc_user');
                                /*JIKA TABEL sc_user gak ada*/
                                if(!$cekTabelSc_user){
                                    $this->session->set_flashdata('error', 'Tabel sc_user belum ada!');
                                    redirect('sec_koneksi/home');
                                }else{
                                    /*JIKA TABEL sc_user ada => CEK TABEL pi_kontrolhariproses*/
                                    $cekTabelPi_kontrolhariproses = $this->db->table_exists('pi_kontrolhariproses');
                                    /*JIKA TABEL pi_kontrolhariproses gak ada => */
                                    if(!$cekTabelPi_kontrolhariproses){
                                        $this->session->set_flashdata('error', 'Tabel pi_kontrolhariproses belum ada!');
                                        redirect('sec_koneksi/home');
                                    }else{
                                        /*JIKA TABEL pi_kontrolhariproses ada => */
                                        $cekRowTabelPi_kontrolhariproses = $this->sec_koneksiM->cekRowTabelPi_kontrolhariproses();

                                        /*JIKA row TABEL pi_kontrolhariproses sudah terisi*/
                                        if($cekRowTabelPi_kontrolhariproses == 1){
                                            $this->session->set_flashdata('error', 'Tabel pi_kontrolhariproses sudah terisi!');
                                            redirect('sec_koneksi/home');
                                        }else{
                                            /*JIKA row TABEL pi_kontrolhariproses kosong => INSERT 1 ROW*/
                                            $insertRowPi_kontrolhariproses = $this->insertRowPi_kontrolhariproses();

                                            if(!$insertRowPi_kontrolhariproses){
                                                $this->session->set_flashdata('error', 'Row pi_kontrolhariproses gagal insert!');
                                                redirect('sec_koneksi/home');
                                            }else{
                                                $decryptedTextArray;
                                                /*JIKA TABEL ROW pi_kontrolhariproses sukses  INSERT => CEK ROW pi_institusi */
                                                $cekRowTabelPi_institusi = $this->sec_koneksiM->cekRowTabelPi_institusi();

                                                /*JIKA ROW pi_institusi = 1 CEK NAMA INSTITUSI DAN SERIAL NUMBER*/
                                                if($cekRowTabelPi_institusi == 1){

                                                    $cekNamaInstitusiSN = $this-> cekNamaInstitusiSN($namaInstitusi,$serialNumber,$cipher);
                                                    /*JIKA */
                                                    if(!$cekNamaInstitusiSN){
                                                        $this->session->set_flashdata('error', 'Institusi gagal disimpan!');
                                                        redirect('sec_koneksi/home');
                                                    }else{
                                                      $this->cekRowTabelPi_cabang();
                                                    }
                                                }elseif($cekRowTabelPi_institusi == 0){
                                                    /*JIKA ROW pi_institusi == 0 INSERT DARI KEY YANG SUDAH DEKRIP, PANGGIL FUNGSI*/
                                                    $insertRowPi_institusi = $this->insertRowPi_institusi($namaInstitusi,$serialNumberEnc,$kodeCabang);

                                                    if(!$insertRowPi_institusi){
                                                        $this->session->set_flashdata('error', 'Institusi gagal disimpan!');
                                                        redirect('sec_koneksi/home');
                                                    }else{
                                                        $this->cekRowTabelPi_cabang();
                                                    }
                                                }else{
                                                    $this->session->set_flashdata('error', 'Institusi lebih dari satu, proses simpan dibatalkan!');
                                                    redirect('sec_koneksi/home');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }


                    }

                }

            }else{
                //JIKA KEY FILE SIZE NYA SALAH
                $this->session->set_flashdata('error', 'File anda bukan key Aplikasi Microtech !');
                redirect('sec_koneksi/home');
            }
        }

    }/*END FUNCTION SIMPAN*/
    public  function insertRowPi_kontrolhariproses(){
        $data = array(
            'KontrolAkses'		      	            =>1,
            'FlagProses'		                    =>0,
            'PeriksaHariLibur'		                =>'N',
            'TglOperasiHariLalu'		            =>date("Y-m-d",strtotime("-1 days")),
            'TglOperasiHariIni'		      	        =>date("Y-m-d"),
            'TglOperasiBerikut'		                =>date("Y-m-d",strtotime("+1 days")),
            'TglOperasi1BulanLalu'		        	=>date("Y-m-d",strtotime("-1 month")),
            'TglOperasi2BulanLalu'		        	=>NULL,
            'TglOperasi3BulanLalu'		        	=>NULL,
            'TglOperasi4BulanLalu'		        	=>NULL,
            'TglOperasi5BulanLalu'		        	=>NULL,
            'TglOperasi6BulanLalu'		        	=>NULL,
            'TglOperasi7BulanLalu'		        	=>NULL,
            'TglOperasi8BulanLalu'		        	=>NULL,
            'TglOperasi9BulanLalu'		        	=>NULL,
            'TglOperasi10BulanLalu'		        	=>NULL,
            'TglOperasi11BulanLalu'		        	=>NULL,
            'TglOperasi12BulanLalu'		        	=>NULL
        );

        $model = $this->sec_koneksiM->insertRowPi_kontrolhariproses($data);
        if($model){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    public  function insertRowPi_institusi($namaInstitusi,$serialNumberEnc,$kodeCabang){
        $data = array(
            'NamaInstitusi'                     =>$namaInstitusi,
            'Alamat'		                    =>NULL,
            'Kecamatan'		                    =>NULL,
            'Kota'		                        =>NULL,
            'DaerahTK1'		      	            =>NULL,
            'KdPos'		                        =>NULL,
            'Telp'		        	            =>NULL,
            'Fax'		        	            =>NULL,
            'Email'		        	            =>NULL,
            'WebSite'		        	        =>NULL,
            'NPWP'		        	            =>NULL,
            'SIUP'		        	            =>NULL,
            'TDP'		        	            =>NULL,
            'KantorPusat'		        	    =>$kodeCabang,
            'SerialNumber'		        	    =>$serialNumberEnc,
            'NoLedgerTolakan'		        	=>NULL,
            'TimerLogOff'		        	    =>10,
            'SID_IdLembaga'		        	    =>NULL,
            'SID_IdBank'		        	    =>NULL,
            'FolderReport'		        	    =>NULL
        );

        $model = $this->sec_koneksiM->insertRowPi_institusi($data);
        if($model){
            return TRUE;
        }else{
            return FALSE;
        }

    }
    public function cekNamaInstitusiSN($namaInstitusi,$serialNumber,$cipher){
        $model1 = $this->sec_koneksiM->getNamaInstitusiSN();

        $namaInstitusiDec = $model1[0]->NamaInstitusi;
        $serialNumberDec = $this->kripton->decrypt($model1[0]->SerialNumber,$cipher);

        if(($namaInstitusi<>$namaInstitusiDec)&& ($serialNumber<>$serialNumberDec)) {
            return FALSE;
        }elseif(($namaInstitusi<>$namaInstitusiDec)&& ($serialNumber==$serialNumberDec)){
            return FALSE;
        }elseif(($namaInstitusi==$namaInstitusiDec)&& ($serialNumber<>$serialNumberDec)){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    public function cekRowTabelPi_cabang(){
        $model1 = $this->sec_koneksiM->getNamaInstitusiSN();
    }
}

/* End of file sec_koneksiM.php */
/* Location: ./application/controllers/sec_koneksiM.php */