<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Perintah Pembayaran</title>
	<style type="text/css">
	table.tableizer-table {
		width: 100%;
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
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
		width: 30%;
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table2 td {
		border: 0px solid #000;
	}
	.tableizer-table2 th {
		background-color: #104E8B; 
		color: #FFF;
		border: 0px solid #000;
		font-weight: bold;
		font-size: 12px;
		text-align: center;
	}
	table.tableizer-table3{
		width: 98%;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
		background-color: whitesmoke;
	}
	table.tableizer-table4{
		width: 98%;
		float: left;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
		margin-bottom: 20px;	
	}
	.tableizer-table4 td {
		border: 1px solid #000;
	}
	table.tableizer-table5{
		width: 98%;
		float: left;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
		margin-bottom: 20px;	
	}
	.tableizer-table5 td {
		border: 1px solid #000;
	}	
	table.judul{
		width: 100%;
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
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
	<br/>
	<table class="tableizer-table">
	<tr class="tableizer-firstrow"><th colspan="14">PERINTAH PEMBAYARAN - ADVANCE</th></tr>
	</table>
	<br/>
	<?php 
	foreach ($Jadvance as $j){
	?>
	<table class="tableizer-table2">
	 <tr><td>&nbsp;</td><td width="40%" align="left">Voucher No.</td><td width="5%" align="left">:</td><td width="50%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->id_pp; ?></td></tr>
	 <tr><td>&nbsp;</td><td width="40%" align="left">Voucher Date</td><td width="5%" align="left">:</td><td width="50%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo tgl_indo($j->tgl_trans); ?></td></tr>
	</table>
	<br/>
	<table class="tableizer-table3">
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td align="left" colspan="2">ADVANCE REQUEST</td><td>&nbsp;</td>
	 <td>&nbsp;</td><td width="15%">Check / Giro No. </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php //echo $j->check_giro; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Code of Payee </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->id_kyw; ?></td>
	 <td>&nbsp;</td><td width="15%" align="left">Date</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php //echo tgl_indo($j->tanggal); ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Name of Payee </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_kyw; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Amount </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php //echo number_format($j->amount,2,'.',','); ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Amount </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo number_format($j->jml_uang,2,',','.'); ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Original Amount </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php //echo number_format($j->original_amount,2,'.',','); ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Amount (in Word)</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php $rp = ' rupiah'; $a = str_replace(".00", "",$j->jml_uang); echo Terbilang($a).$rp; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Bank </td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_kdbayar; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td align="left">Divisi / Dept</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_dept; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">A / C No.</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->norek_bank; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Cost Center</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td>
	 <td>&nbsp;</td><td align="left" width="15%">Kode Cash Out</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->kode_cflow; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Episode No.</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php //echo $j->episodeNo; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Nama Cash Flow</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_cflow; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td align="left" width="15%">Description </td><td width="3%">:</td><td colspan="5" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->keterangan; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<br/>
	<table class="tableizer-table4">
	 <tr><td width="75%">DETAIL ADVANCE</td><td align="Center">JUMLAH</td></tr>
	 <tr><td><?php echo $j->keterangan; ?></td><td><?php echo number_format($j->jml_uang,2,'.',','); ?></td></tr>
	 <tr><td align="Right">Total Detail Advance Request</td><td><?php echo number_format($j->jml_uang,2,'.',','); ?></td></tr>
	</table>
	<br/>
	<table class="tableizer-table5">
	 <tr><td>Prepared by,
		<?php echo  $this->session->userdata('nama_kyw'); ?>
	 </td><td>Reviewed by,
		<?php if($j->app_keuangan_status != '0'){
		 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$j->app_keuangan_id."");
		 if($query->num_rows()== '1'){
		 $g = $query->row()->nama;
		 }else{
		 $g = '';
		 }
		 echo $g;
		 }else{ echo '';} ?>
	 </td><td>Approved by,
	 <?php if($j->app_hd_status != '0'){
		 $query = $this->db->query("select nama_kyw as nama from master_karyawan where id_kyw =".$j->app_hd_id."");
		 if($query->num_rows()== '1'){
		 $g = $query->row()->nama;
		 }else{
		 $g = '';
		 }
		 echo $g;
		 }else{ echo '';} ?>
	 </td><td>Received by,
	 
	 </td></tr>
	 <tr><td align="center" rowspan="3" height="60px" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 
	 </td>
	 <td align="center" rowspan="3" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 </td>
	 <td align="center" rowspan="3" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 </td><td align="center" rowspan="3" width="25%" style="border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">
	 </td></tr>
	 <tr></tr>
	 <tr></tr>
	 <tr><td>Date : <?php echo tgl_indo($j->tgl_trans); ?></td>
	 <td>Date : <?php if($j->app_keuangan_status != '0'){ echo tgl_indo($j->app_keuangan_tgl);}else{ echo '';} ?></td>
	 <td>Date : <?php if($j->app_hd_status != '0'){ echo tgl_indo($j->app_hd_tgl);}else{ echo '';} ?></td><td>Date :</td></tr>
	</table>
	<?php } ?>
  </body>
</html>
<script>
window.print();
//setTimeout("window.close()", 100);
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
	function Terbilang($x)
	{
	  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	  if ($x < 12)
		return " " . $abil[$x];
	  elseif ($x < 20)
		return Terbilang($x - 10) . "belas";
	  elseif ($x < 100)
		return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
	  elseif ($x < 200)
		return " seratus" . Terbilang($x - 100);
	  elseif ($x < 1000)
		return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
	  elseif ($x < 2000)
		return " seribu" . Terbilang($x - 1000);
	  elseif ($x < 1000000)
		return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
	  elseif ($x < 1000000000)
		return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
	}
?>