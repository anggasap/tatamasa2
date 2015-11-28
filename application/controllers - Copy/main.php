<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

		$this->load->model('home_m');
		$this->load->model('user_m');
		session_start ();
    }

    public function index(){
		if ($this->auth->is_logged_in () == false) {
			$this->login();
		} else {
			//$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data ['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			//$data ['nama'] = $this->home_m->get_nama_kantor ();
			$data['menu_id'] = 0;
			$this->template->set ( 'title', 'Microtech | Beranda' );
			$this->template->set ( 'title', 'Home' );
			$this->template->load ( 'template/template1', 'master/index',$data );
			//$this->load->view ( 'global/login_v' );
			//$this->template->load ( 'template1', 'global/login_v',$data );
			
   		}
	}
	
	public function login() {
		
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'username', 'Username', 'trim|required' );
		$this->form_validation->set_rules ( 'password', 'Password', 'trim|required' );
		$this->form_validation->set_rules ( 'tgl_login', 'tgl login', 'trim|required' );
		$this->form_validation->set_error_delimiters ( ' <span style="color:#FF0000">', '</span>' );
		
		if ($this->form_validation->run () == FALSE) {
			$tanggal_hari_ini 			= $this->home_m->get_tanggal_hari_ini();
			$data ['tanggal_hari_ini']	= $tanggal_hari_ini[0]->value;
			
			$lembaga_nama				= $this->home_m->get_lembaga_nama ();
			$data ['lembaga_nama'] 		= $lembaga_nama[0]->value;//
			//COPYRIGHT 
			$aplikasi_nama 				= $this->home_m->get_aplikasi_copyright();
			$data['copyright_year'] 	= $aplikasi_nama[0]->value;
			$aplikasi_nama 				= $this->home_m->get_aplikasi_copyright();
			$data ['copyright_content'] = $aplikasi_nama[1]->value;
			//END COPYRIGHT
			
			//TITLE
			$data ['title'] = "Microtech Web | Login";
			//END TITLE
			//VIEW
			$this->load->view ( 'global/login_v',$data );
			//END VIEW
		} else {
			$username = $this->input->post ( 'username' );
			$password = $this->input->post ( 'password' );
			$nama_kantor = $this->input->post ( 'nama_kantor' );
			//$jenis_kantor = $this->input->post ( 'daftar_kantor' );//
			//
			$tgl_y = $this->input->post ( 'tgl_login' );
			$tgl_d = date ( 'd-m-Y', strtotime ( $tgl_y ) );
			//
			
				$success = $this->auth->do_login ( $username, $password,$tgl_d,$tgl_y,$nama_kantor );
				if ($success) {
					$data ['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
					//$data ['nama'] = $this->home_m->get_nama_kantor ();
					$this->template->set ( 'title', 'Microtech | Beranda' );
					//$a = $this->template->load ( 'template/template1', 'bpr/index',$data );
					redirect('/main/index');
				} else {
					$tanggal_hari_ini 			= $this->home_m->get_tanggal_hari_ini();
					$data ['tanggal_hari_ini']	= $tanggal_hari_ini[0]->value;
					
					/* $data ['daftar_kantor'] 	= $this->home_m->get_daftar_kantor (); */
					$lembaga_nama				= $this->home_m->get_lembaga_nama ();
					$data ['lembaga_nama'] 		= $lembaga_nama[0]->value;//
					//COPYRIGHT 
					$aplikasi_nama 				= $this->home_m->get_aplikasi_copyright();
					$data['copyright_year'] 	= $aplikasi_nama[0]->value;
					$aplikasi_nama 				= $this->home_m->get_aplikasi_copyright();
					$data ['copyright_content'] = $aplikasi_nama[1]->value;
					//END COPYRIGHT
					
					//TITLE
					$data ['title'] = "Microtech Web | Login";
					//END TITLE
					
					//$data ['login_info'] = "Maaf, username dan password salah!";
					$data ['login_info'] = "Maaf, username dan password salah!";
					$this->load->view ( 'global/login_v', $data );
				}//else if (success)*/
			
		}// else if ($this->form_validation->run () == FALSE) {
	}
	
	public function logout() {
		if ($this->auth->is_logged_in () == true) {
			// jika dia memang sudah login, destroy session
			$this->auth->do_logout ();
			$this->session->sess_destroy();
		}
		// larikan ke halaman utama
		redirect ( 'main' );
		//$this->load->view ( 'admin/login_form' );
	}
	
	
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */
