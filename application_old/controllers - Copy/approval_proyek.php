<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Approval_proyek extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('home_m');
		$this->load->model('approval_proyek_m');
		$this->load->model('master_proyek_m');
		$this->load->model('master_rumah_m');
		session_start();
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
	public function getProyekAll(){
		$this->CI =& get_instance();//and a.kcab_id<>'1100'
		$rows = $this->master_proyek_m->getProyekAll();
		$data['data'] = array();
		foreach( $rows as $row ) {
			if(trim($row->approval) == '0'){
				$approval 		= "";
			}else if(trim($row->approval) == '1'){
				$approval= "Approve";
			}else{
				$approval = "Reject";
			}
			$array = array(
					'idProyek' => trim($row->id_proyek),
					'namaProyek' => trim($row->nama_proyek),
					'qtyRumah'	=>trim($row->qty_rumah),
					'approval'	=>$approval
			);

			array_push($data['data'],$array);
		}
		$this->output->set_output(json_encode($data));
	}
	function home(){
			$menuId = $this->home_m->get_menu_id('approval_proyek/home');
			$data['menu_id'] = $menuId[0]->menu_id;
			$data['menu_parent'] = $menuId[0]->parent;
			$data['menu_nama'] = $menuId[0]->menu_nama;
			$this->auth->restrict ($data['menu_id']);
			$this->auth->cek_menu ($data['menu_id']);
        	
			$data['multilevel'] = $this->user_m->get_data(0,$this->session->userdata('usergroup'));
			$data['menu_all'] = $this->user_m->get_menu_all(0);
			$data['usergroup'] = $this->session->userdata('usergroup');
			
			$this->template->set ( 'title', $data['menu_nama'] );
			$this->template->load ( 'template/template3', 'approval/approval_proyek_v',$data );
	}
	
    function approval(){
        $idProyek	 		= trim($this->input->post('proyekId'));
		$approval 			= trim($this->input->post('approval'));
		$jmlRumah			= trim($this->input->post('jmlRumah'));

		$data = array(
				'approval'	=> $approval
		);

		$model = $this->approval_proyek_m->updateApproval($data,$idProyek);
		if($approval == '1'){
			for($i=1;$i<=$jmlRumah;$i++){
				$modelidrumah = $this->master_rumah_m->getIdRumah($idProyek);
				$data = array(
						'id_rumah'		      		=>$modelidrumah,
						'id_proyek'		      		=>$idProyek
				);
				$model = $this->master_rumah_m->simpan($data);
			}
		}

        if($model){
            $array = array(
                'act'	=>1,
                'tipePesan'=>'success',
                'pesan' =>'Data appoval berhasil disimpan.'
            );
        }else{
            $array = array(
                'act'	=>0,
                'tipePesan'=>'error',
                'pesan' =>'Data approval gagal disimpan.'
            );
        }
        $this->output->set_output(json_encode($array));
    }
	

}

/* End of file sec_user.php */
/* Location: ./application/controllers/sec_user.php */