<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Request For Payment</title>
	<style type="text/css">
	table.tableizer-table {
		width: 100%;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table th {
		background-color: #104E8B; 
		color: #000;
		font-weight: bold;
		font-size: 14px;
		text-align: center;
	}
	#logo{
		text-align: center;
		width: 170px;
	}
	table.tableizer-table2{
		width: 100%;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table2 td {
		border: 0px solid #ccc;
	}
	.tableizer-table2 th {
		background-color: #104E8B; 
		color: #FFF;
		border: 0px solid #ccc;
		font-weight: bold;
		font-size: 12px;
		text-align: center;
	}
	table.tableizer-table3{
		width: 100%;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
		background-color: whitesmoke;
	}
	table.tableizer-table4{
		width: 50%;
		float: left;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
		margin-bottom: 20px;	
	}
	table.tableizer-table5{
		width: 50%;
		float: right;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
	}
	table.tableizer-table6{
		width: 100%;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
	}
	table.tableizer-table7{
		width: 40%;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
		color: blue;	
	}
	table.judul{
		width: 100%;
		border: 0px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;	
	}
	.judul th {
		color: #0B0B0B;
		font-weight: bold;
		font-size: 14px;
		text-align: left;
	}
	</style>
  </head>
  <body style="width:100%;">
	<table class="judul">
		<?php foreach($info as $i){?>
		<tr><td rowspan="3" align="center"><img id="logo" src="<?php echo base_url('metronic/img/logo_berkah.png'); ?>"></td>
		<td style="font-size: 14px;font-weight: bold;"><?php echo $i->pt; ?></td></tr>
		<tr><td><?php echo $i->kantor; ?></td></tr>
		<tr><td><?php echo $i->alamat; ?></td></tr>
		<?php } ?>
	</table>
	<table class="tableizer-table">
	<tr class="tableizer-firstrow"><th colspan="14">REQUEST FOR PAYMENT</th></tr>
	</table>
	<?php 
	foreach($reqpay as $a){ ?>
	<table class="tableizer-table2" style="width:99%;">
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>Requester Name</td>
	 <td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_kyw; ?></td>
	 <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2">Dept. Head Approval</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="20%">Requesting Department</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_dept; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	 <td>Name</td><td colspan="2" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_hd_status != '0'){
	 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$a->app_hd_id."");
	 if($query->num_rows()== '1'){
	 $g = $query->row()->nama;
	 }else{
	 $g = '';
	 }
	 echo $g;
	 }else{ echo '';} ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td rowspan="3" >Signature</td>
	 <td width="25%" rowspan="3" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_user_id != 0){
		 ?><img id="img" height="50%" src="<?php echo base_url('metronic/img/sign.png'); ?>">
	 <?php }else{ echo '';} ?>
	 </td>
	 <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	 <td rowspan="3">Signature</td><td colspan="2" rowspan="3" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_hd_status == 1){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/approval.png'); ?>">
	 <?php }elseif($a->app_hd_status == 2){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/rejected.png'); ?>">
	 <?php }elseif ($a->app_hd_status == 3){?>
	 <img id="img" height="50%" src="<?php echo base_url('metronic/img/paid.png'); ?>">
	 <?php }else{ echo '';} ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td>
	 <td>Date</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	<?php echo tgl_indo($a->tgl_jt);?></td>
	 <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	 <td>Date</td><td colspan="2" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	<?php if($a->app_hd_status != '0'){ echo tgl_indo($a->app_hd_tgl); }else { echo ''; }?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td colspan="2" align="center">GM Internal Operation Approval</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="3" align="center">BOD Approval if over Rp 100 mio</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%">Name</td>
	 <td width="25%" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_gm_status != '0'){
	 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$a->app_gm_id."");
	 if($query->num_rows()== '1'){
	 $g = $query->row()->nama;
	 }else{
	 $g = '';
	 }
	 echo $g;
	 }else{ echo '';} ?></td>
	 <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2" width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;" align="center">Shahla Rahardjo</td><td width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;" align="center">Laila Adikreshna</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td>
	 <td rowspan="3">Signature</td><td width="25%" rowspan="3" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_gm_status == 1){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/approval.png'); ?>">
	 <?php }elseif($a->app_gm_status == 2){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/rejected.png'); ?>">
	 <?php }elseif ($a->app_gm_status == 3){?>
	 <img id="img" height="50%" src="<?php echo base_url('metronic/img/paid.png'); ?>">
	 <?php }else{ echo '';} ?></td>
	 <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2" rowspan="3" width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td rowspan="3" width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>Date</td>
	 <td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_gm_status != '0'){ echo tgl_indo($a->app_gm_tgl);}else{ echo '';} ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="2" width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="20%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<table class="tableizer-table2" style="width:99%;">
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="2">Invoice No.</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->no_invoice; ?></td>&nbsp;<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Pay To</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->pay; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="2">PO No.</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->no_po; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Account Name</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_akun_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="2">Ammount</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo number_format($a->jml_uang,2,'.',','); ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Account No.</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->no_akun_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="2">Due Date</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo tgl_indo($a->tgl_jt); ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Bank</td><td width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>Description</td><td>:</td><td colspan="12" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->keterangan; ?></td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<br/>
	<table class="tableizer-table2" style="width:99%;">
	 <tr><td colspan="24">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="12" style="font-weight: bold;">Document Verification</td><td colspan="12">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_fpe == '1'){echo 'V';}else{echo '';} ?></td><td width="25%" colspan="6">Faktur Penjualan (Invoice) Asli</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_suratjalan == '1'){echo 'V';}else{echo '';} ?></td><td width="20%" colspan="7">Surat Jalan (Delivery Order)</td><td style=" border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_cop == '1'){echo 'V';}else{echo '';} ?></td><td colspan="6">Certificate of Payment</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_kuitansi == '1'){echo 'V';}else{echo '';} ?></td><td width="25%" colspan="6">Kwitansi (Receipt) Asli</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_lappenerimaanbrg == '1'){echo 'V';}else{echo '';} ?></td><td width="20%" colspan="7">Laporan Penerimaan Barang / Pelaksanaan Jasa</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_ssp == '1'){echo 'V';}else{echo '';} ?></td><td colspan="6">Sesuai Surat Perjanjian / Kontrak</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_fpa == '1'){echo 'V';}else{echo '';} ?></td><td width="25%" colspan="6">Faktur Pajak Asli</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_bast == '1'){echo 'V';}else{echo '';} ?></td><td width="20%" colspan="7">Berita Acara Serah Terima (BAST)</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_sspk == '1'){echo 'V';}else{echo '';} ?></td><td colspan="6">Sesuai Surat Perintah Kerja (SPK)</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_po == '1'){echo 'V';}else{echo '';} ?></td><td width="25%" colspan="6">Purchase Order (PO)</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_bap == '1'){echo 'V';}else{echo '';} ?></td><td width="20%" colspan="7">Berita Acara Pemeriksaan / Progress Report</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->dok_sbj == '1'){echo 'V';}else{echo '';} ?></td><td colspan="6">Sesuai Bank Garansi / Surat Jaminan</td></tr>
	 <tr><td colspan="24">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td  width="20%" colspan="9">Catatan Penggunaan Anggaran (CPA)</td><td>&nbsp;</td><td colspan="5">&nbsp;</td><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="5">Lain - lain</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4">Within Budget</td><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="3">Out of Budget</td><td colspan="9">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="6" style="font-weight: bold;">Catatan :</td><td colspan="18">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td colspan="20" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="6">&nbsp;</td><td colspan="4" align="center">Verified by Requesting Dept.</td><td colspan="6">&nbsp;</td><td colspan="3" align="center">Verified by Requesting Dept.</td><td colspan="6">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="5">&nbsp;</td><td>Name</td>
	 <td colspan="4" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; width: 20%">
	 <?php if($a->app_hd_status != '0'){
	 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$a->app_hd_id."");
	 if($query->num_rows()== '1'){
		$g = $query->row()->nama;
	 }else{
		$g = '';
	 }
		echo $g;
	 }else{ echo '';} ?></td>
	 <td colspan="4" style="width: 22%">&nbsp;</td>
	 <td style="width: 5%;">Name</td><td>&nbsp;</td>
	 <td colspan="3" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; width: 20%">
	 <?php if($a->app_keuangan_status != '0'){
	 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$a->app_keuangan_id."");
	 if($query->num_rows()== '1'){
	 $g = $query->row()->nama;
	 }else{
	 $g = '';
	 }
	 echo $g;
	 }else{ echo '';} ?></td><td colspan="6">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="5">&nbsp;</td>
	 <td rowspan="3">Signature</td><td colspan="4" rowspan="3" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_hd_status != 0){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/verifikasi.png'); ?>">
	 <?php }else{
		echo ''; 
	 }?></td><td colspan="4">&nbsp;</td><td rowspan="3">Signature</td><td>&nbsp;</td>
	 <td colspan="3" rowspan="3" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 <?php if($a->app_keuangan_status != 0){?>
	 <img id="img" height="35%" src="<?php echo base_url('metronic/img/verifikasi.png'); ?>">
	 <?php }else{
		echo ''; 
	 }?></td><td colspan="6">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="5">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="5">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="5">&nbsp;</td>
	 <td>Date</td><td colspan="4" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->app_hd_status != '0'){ echo tgl_indo($a->app_hd_tgl);}else{ echo '';} ?></td>
	 <td colspan="4">&nbsp;</td><td>Date</td><td>&nbsp;</td><td colspan="3" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php if($a->app_keuangan_status != '0'){ echo tgl_indo($a->app_keuangan_tgl);}else{ echo '';} ?></td><td colspan="6">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="24">&nbsp;</td></tr>
	</table>
	<br/>
	<table class="tableizer-table2" style="width:99%;">
	 <tr><td colspan="25">&nbsp;</td></tr>
	 <tr><td colspan="25" style="font-weight: bold;" align="center">Konfirmasi Pelaksanaan Pembayaran</td></tr>
	 <tr><td>&nbsp;</td><td width="13%" colspan="4">Payment Method</td><td style="width:70px;">Accounting No,</td><td colspan="3" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="12">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td colspan="9">&nbsp;</td><td colspan="15" align="center">Instruction Payment Approved by Head Department</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="2">Cash</td><td colspan="2">&nbsp;</td><td colspan="5" align="center">Treasury</td><td style="width:20px;">&nbsp;</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; width:30px;">Paid</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; width:30px;">Hold</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif; width:30px;">Cancel</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="2">Cheque/BG</td><td>&nbsp;</td><td>Name</td><td colspan="5" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="2%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="2">Transfer</td><td>&nbsp;</td><td rowspan="3">Signature</td><td colspan="5" rowspan="3" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td><td colspan="4" rowspan="3" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" rowspan="3" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" rowspan="3" align="center" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td></tr>
	 <tr><td colspan="4">&nbsp;</td></tr>
	 <tr><td colspan="4">&nbsp;</td></tr>
	 <tr><td colspan="5">&nbsp;</td><td>Date</td><td colspan="5" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td><td colspan="4" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td colspan="4" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td></tr>
	 <tr><td colspan="24">&nbsp;</td></tr>
	</table>
	<br/>
	<?php } ?>
  </body>
</html>
<script>
window.print();
</script>
<?php
	function tgl_indo($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = getBulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.' '.$bulan.' '.$tahun;
	}
 
	function getBulan($bln){
		switch ($bln){
			case 1: return "Januari"; break;
			case 2: return "Februari"; break;
			case 3: return "Maret"; break;
			case 4: return "April"; break;
			case 5: return "Mei"; break;
			case 6: return "Juni"; break;
			case 7: return "Juli"; break;
			case 8: return "Agustus"; break;
			case 9: return "September"; break;
			case 10: return "Oktober"; break;
			case 11: return "November"; break;
			case 12: return "Desember"; break;
		}
	}
?>