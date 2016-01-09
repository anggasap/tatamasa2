<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_kontrak extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('home_m');
		$this->load->model('master_kontrak_m');
		session_start ();
	}
	public function index(){
		if($this->auth->is_logged_in () == false){
			$this->login();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			
			$this->template->set ( 'title', 'Home' );
			$this->template->load ( 'template/template1', 'global/index',$data );
		}
		
	}
	
	function home(){
		$menuId = $this->home_m->get_menu_id('master_kontrak/home');
		$data['menu_id'] = $menuId[0]->menu_id;
		$data['menu_parent'] = $menuId[0]->parent;
		$data['menu_nama'] = $menuId[0]->menu_nama;
		$this->auth->restrict ($data['menu_id']);
		$this->auth->cek_menu ( $data['menu_id'] );
        
		if(isset($_POST["btnSimpan"])){
			$this->simpan();
		}elseif(isset($_POST["btnUbah"])){
			$this->ubah();
		}elseif(isset($_POST["btnHapus"])){
			$this->hapus();
		}else{
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'master/master_kontrak_v',$data );
		}
	}
	public function getKontrakAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_kontrak_m->getKontrakAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			$array = array(
					'noKontrak' => trim($row->no_kontrak),
					'tglKontrak' => trim($row->tgl_kontrak),
					'nilai' =>  trim($row->nilai),
					'pihak1' =>  trim($row->nama1),
					'pihak2' =>  trim($row->perusahaan)
			);
	
			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	
	function getDescKontrak()
	{
		$this->CI =& get_instance();
		$idKontrak = $this->input->post('idKontrak', TRUE);
		$rows = $this->master_kontrak_m->getDescKontrak($idKontrak);
		if ($rows) {
			foreach ($rows as $row)
				$array = array(
						'baris' 		=> 1,
						'noKontrak' 	=> $row->no_kontrak,
						'tglKontrak' 	=> $row->tgl_kontrak,
						'tglAwal' 		=> $row->tgl_awal,
						'tglSelesai'	=> $row->tgl_selesai,
						'pasal'			=> $row->pasal,
						'nilai'			=> $row->nilai,
						'pekerjaan'		=> $row->pekerjaan,
						'nama1'			=> $row->nama1,
						'jabatan1'		=> $row->jabatan1,
						'perusahaan'	=> $row->perusahaan,
						'alamat'		=> $row->alamat,
						'kota'			=> $row->kota,
						'kodepos'		=> $row->kodepos,
						'nama2'			=> $row->nama2,
						'jabatan2'		=> $row->jabatan2
				);
		}else{
			$array = array('baris' => 0);
		}

		$this->output->set_output(json_encode($array));
	}
	
    function simpan(){
        $tglKontrak			= trim($this->input->post('tglKontrak'));
		$tglKontrak			= date('Y-m-d', strtotime($tglKontrak));
		$tglAwal			= trim($this->input->post('tglAwal'));
		$tglAwal			= date('Y-m-d', strtotime($tglAwal));
        $tglSelesai			= trim($this->input->post('tglSelesai'));
		$tglSelesai			= date('Y-m-d', strtotime($tglSelesai));
		$pasal				= trim($this->input->post('jmlPasal'));
		$nilai				= str_replace(',', '', trim($this->input->post('nilaiKontrak')));
		$pekerjaan			= trim($this->input->post('pekerjaan'));
		$nama1				= trim($this->input->post('nama'));
		$jabatan1			= trim($this->input->post('jabatan'));
		$perusahaan			= trim($this->input->post('perusahaan'));
        $alamat				= trim($this->input->post('alamat'));
	    $kota				= trim($this->input->post('kota'));
		$kodepos			= trim($this->input->post('kodepos'));
		$nama2				= trim($this->input->post('nama2'));
		$jabatan2			= trim($this->input->post('jabatan2'));
		
		$tgl = $this->session->userdata('tgl_y');
		$bulan = date('m', strtotime($tgl));//$tglTrans->format("m");
        $tahun = date('Y', strtotime($tgl)); //$tglTrans->format("Y");
		
        $modelidKontrak = $this->master_kontrak_m->getIdKontrak($bulan,$tahun);
        $data = array(
            'no_kontrak'		=> $modelidKontrak,
            'tgl_kontrak'		=> $tglKontrak,
            'tgl_awal'		    => $tglAwal,
			'tgl_selesai'		=> $tglSelesai,
			'pasal'				=> $pasal,
			'nilai'				=> $nilai,
			'pekerjaan'			=> $pekerjaan,
			'nama1'				=> $nama1,
			'jabatan1'			=> $jabatan1,
			'perusahaan'		=> $perusahaan,
			'alamat'			=> $alamat,
			'kota'				=> $kota,
			'kodepos'			=> $kodepos,
			'nama2'				=> $nama2,
			'jabatan2'			=> $jabatan2
        );
        $model = $this->master_kontrak_m->insert($data);
        if($model){
    		$array = array(
    			'act'	=>1,
    			'tipePesan'=>'success',
    			'pesan' =>'Data berhasil disimpan.'
    		);
    	}else{
    		$array = array(
    			'act'	=>0,
    			'tipePesan'=>'error',
    			'pesan' =>'Data gagal disimpan.'
    		);
    	}
        $this->output->set_output(json_encode($array));
    }
	
    function ubah(){
    	$noKontrak			= trim($this->input->post('noKontrak'));
		$tglKontrak			= trim($this->input->post('tglKontrak'));
		$tglKontrak			= date('Y-m-d', strtotime($tglKontrak));
		$tglAwal			= trim($this->input->post('tglAwal'));
		$tglAwal			= date('Y-m-d', strtotime($tglAwal));
        $tglSelesai			= trim($this->input->post('tglSelesai'));
		$tglSelesai			= date('Y-m-d', strtotime($tglSelesai));
		$pasal				= trim($this->input->post('jmlPasal'));
		$nilai 				= str_replace(',', '', trim($this->input->post('nilaiKontrak')));
		$pekerjaan			= trim($this->input->post('pekerjaan'));
		$nama1				= trim($this->input->post('nama'));
		$jabatan1			= trim($this->input->post('jabatan'));
		$perusahaan			= trim($this->input->post('perusahaan'));
        $alamat				= trim($this->input->post('alamat'));
	    $kota				= trim($this->input->post('kota'));
		$kodepos			= trim($this->input->post('kodepos'));
		$nama2				= trim($this->input->post('nama2'));
		$jabatan2			= trim($this->input->post('jabatan2'));
    	 
		$data = array(
            'tgl_kontrak'		=> $tglKontrak,
            'tgl_awal'		    => $tglAwal,
			'tgl_selesai'		=> $tglSelesai,
			'pasal'				=> $pasal,
			'nilai'				=> $nilai,
			'pekerjaan'			=> $pekerjaan,
			'nama1'				=> $nama1,
			'jabatan1'			=> $jabatan1,
			'perusahaan'		=> $perusahaan,
			'alamat'			=> $alamat,
			'kota'				=> $kota,
			'kodepos'			=> $kodepos,
			'nama2'				=> $nama2,
			'jabatan2'			=> $jabatan2
        );
    	
    	$model = $this->master_kontrak_m->update($data,$noKontrak);
    	if($model){
    		$array = array(
    			'act'	=>1,
    			'tipePesan'=>'success',
    			'pesan' =>'Data berhasil diubah.'
    		);
    	}else{
    		$array = array(
    			'act'	=>0,
    			'tipePesan'=>'error',
    			'pesan' =>'Data gagal diubah.'
    		);
    	}
    	$this->output->set_output(json_encode($array));
    }

	function hapus()
	{
		$this->CI =& get_instance();
		$noKontrak = trim($this->input->post('noKontrak'));

		$model = $this->master_kontrak_m->delete($noKontrak);
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