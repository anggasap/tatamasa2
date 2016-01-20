<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Akuntansi_ar_m extends CI_Model {
	public function getBookingAll()
	{
		$sql="SELECT tj.master_id,mj.id_rumah,mj.id_cust,mr.nama_rumah,mc.nama_cust,tj.jml_trans
			  from trans_jual tj
			  left join master_jual mj on tj.master_id = mj.master_id
			  left join master_rumah mr on mj.id_rumah = mr.id_rumah
			  left join master_customer mc on mj.id_cust = mc.id_cust
			  where tj.kode_trans = '100' and tj.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getReimpayAll()
	{
		$sql="SELECT mr.id_reimpay,mk.nama_kyw, mr.jml_uang,mk.kode_perk,p.nama_perk
			  from master_reimpay mr left join master_karyawan mk on mr.id_kyw = mk.id_kyw
			  left join perkiraan p on mk.kode_perk = p.kode_perk
			  where mr.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	function getSettleAll()
	{
		$sql="SELECT ms.id_settle_adv,ma.id_advance,pp.type_adv,mk.nama_kyw, ma.jml_uang,ms.jml_uang_paid
			  from master_settle_adv ms
			  left join master_advance ma on ms.id_adv = ma.id_advance
			  left join master_karyawan mk on ms.id_kyw = mk.id_kyw
			  left join perintah_pembayaran pp on ma.id_advance = pp.id_advance
			  where ms.status_akuntansi = 0";
		$query=$this->db->query($sql);
		return $query->result(); // returning rows, not row
	}
	public function getJurnalPend($idJurnalPend)
	{
		$this->db->select ( 'ij.kode_perk,p.nama_perk' );
		$this->db->from('integrasi_jurnal ij');
		$this->db->join('perkiraan p', 'ij.kode_perk=p.kode_perk', 'LEFT');
		$this->db->where ( 'id_integrasi', $idJurnalPend );
//		$this->db->where ( 'T.STATUS_AKTIF <>', 3 );
		$query = $this->db->get ();

		$rows['data_cpa'] = $query->result();
		return $rows;

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
	function getIdTDPerk($modelidAP,$tglTrans,$id_master,$idProyek,$tmpKodePerk,$tmpDb,$tmpKr){
		$sql= "select id_seq from trans_detail_perk where trans_id ='$modelidAP' and tgl_trans = '$tglTrans'
				and master_id = '$id_master' and  id_proyek ='$idProyek' and kode_perk = '$tmpKodePerk'
				and debet = '$tmpDb' and kredit = '$tmpKr'";
		$query = $this->db->query($sql);
		$hasil = $query->result();
		return $hasil[0]->id_seq;
	}
	
	function insertTDPerk($data){
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
	function insertTDCflow($data){
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
	function updateBooking_statusAkuntansi($data_model2,$id_master){
		$this->db->trans_begin();
		$query0 = $this->db->where('kode_trans', '100');
		$query1 = $this->db->where('master_id', $id_master);
		$query2 = $this->db->update('trans_jual', $data_model2);
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