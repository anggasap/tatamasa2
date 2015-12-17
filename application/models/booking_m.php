<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Booking_m extends CI_Model {
	public function getRumahAll()
	{
		$sql="SELECT r.*,p.nama_proyek from master_rumah r left join master_proyek p on r.id_proyek = p.id_proyek where status_jual=0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getIdPenj($bulan,$tahun){
		$sql= "select master_id from master_jual where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "BG";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_adv = "0000001";
			return $kode."-".$id_adv."-".$bulan.$th;
		}else{
			$sql= "select max(substring(master_id,4,7)) as id_adv from master_jual";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_adv =  $hasil[0]->id_adv;
			$id_adv = sprintf('%07u',$id_adv+1);
			return $kode."-".$id_adv."-".$bulan.$th;
		}
	}
	function ubahRumah($data,$idRumah){
		$this->db->trans_begin();
		$query1 = $this->db->where('id_rumah', $idRumah);
		$query2 = $this->db->update('master_rumah', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	public function simpan_masterJual($data){

		$this->db->trans_begin();
		$model = $this->db->insert('master_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}

	}
	public function simpan_transJual($data){

		$this->db->trans_begin();
		$model = $this->db->insert('trans_jual', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}

	}

	function getIdJrAR($bulan,$tahun){
		$sql= "select trans_id from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2 and left(trans_id,2)='AR'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "AR";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(trans_id,4,7)) as id_pemb from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='AR'";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function getNoVoucher($bulan,$tahun){
		$sql= "select voucher_no from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='BR'";
		$query = $this->db->query($sql);
		$jml = $query->num_rows();
		$kode = "BR";
		$th = substr($tahun,-2);
		if($jml == 0){
			$id_pemb = "0000001";
			return $kode."-".$id_pemb."-".$bulan.$th;
		}else{
			$sql= "select max(substring(voucher_no,4,7)) as id_pemb from trans_detail_perk where MONTH(tgl_trans)='$bulan' and YEAR(tgl_trans)='$tahun' and modul = 2  and left(trans_id,2)='BR'";
			$query = $this->db->query($sql);
			$hasil = $query->result();
			$id_pemb =  $hasil[0]->id_pemb;
			$id_pemb = sprintf('%07u',$id_pemb+1);
			return $kode."-".$id_pemb."-".$bulan.$th;
		}
	}
	function getIdTDPerk($modelidAP,$tglTrans,$id_master,$idProyek,$tmpKodePerk,$tmpDb,$tmpKr){
		$sql= "select id_seq from trans_detail_perk where trans_id ='$modelidAP' and tgl_trans = '$tglTrans'
				and master_id = '$id_master' and  id_proyek ='$idProyek'
				and kode_perk = '$tmpKodePerk' and debet = '$tmpDb' and kredit = '$tmpKr'";
		$query = $this->db->query($sql);
		$hasil = $query->result();
		return $hasil[0]->id_seq;
	}
	function insertAdvPerk($data){
		$this->db->trans_begin();
		$model = $this->db->insert('trans_detail_perk', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}
	function insertAdvCflow($data){
		$this->db->trans_begin();
		$model = $this->db->insert('trans_detail_cflow', $data);
		if ($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return false;
		}
		else{
			$this->db->trans_commit();
			return true;
		}
	}

}

/* End of file sec_menu_user_m.php */
/* Location: ./application/models/sec_menu_user.php */