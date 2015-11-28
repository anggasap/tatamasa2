<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Home_m extends CI_Model{
    function __construct()
    {
        parent::__construct();
        $this->load->database('config1');
    }

	public function get_menu_id($menu_uri) {
		$this->db->select ( 'menu_id,menu_nama,parent' );
		$this->db->from ( 'sec_menu' );
		$this->db->where ( 'menu_uri', $menu_uri );
		$hasil =  $this->db->get ();
		return $hasil->result();
	}
   public function get_lembaga_nama(){
      	$this->db->select ( 'value' );
		$this->db->from('web_sysid');
		$this->db->where ( 'keyname', 'web_lembaga_nama1' );
		//$this->db->or_where('keyname', 'web_nama_lembaga2'); 
		$query = $this->db->get ();
		return $query->result();
   }
   // angga
   public function get_tanggal_hari_ini(){
      	$this->db->select ( 'value' );
		$this->db->from('web_sysid');
		$this->db->where ( 'keyname', 'web_tanggal_hari_ini' );
		$query = $this->db->get ();
		return $query->result();
   }
   
   // NEW
	public function get_aplikasi_copyright(){
		$this->db->select ( 'value' );
		$this->db->from('web_sysid');
		$this->db->where ( 'KeyName', 'web_copyright_year' );
		$this->db->or_where('keyname', 'web_copyright_content');
		$this->db->or_where('keyname', 'web_copyright_auth');
		$query = $this->db->get ();
		return $query->result();
   }
   // end NEW
}

/* End of file homeModel.php */
/* Location: ./application/models/homemodel.php */