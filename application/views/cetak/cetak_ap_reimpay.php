<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Account Payable</title>
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
	<tr class="tableizer-firstrow"><th colspan="14">JURNAL : ACCOUNT PAYABLE</th></tr>
	</table>
	<br/>
	<?php 
	foreach ($all as $j){
		$date = tgl_indo($j->tgl_ap);
	?>
	<table class="tableizer-table3">
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">ID RP</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->trans_id; ?></td>
	 <td>&nbsp;</td><td width="15%" align="left">Tgl AP</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $date; ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">No. Request</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->id_reimpay; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Tgl Req</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo tgl_indo($j->tgl_trans); ?></td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Vendor</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_spl; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%"></td><td width="3%">&nbsp;</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">No. Invoice</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->no_invoice; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">Tgl Inv</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td align="left">Tgl Jatuh Tempo</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo tgl_indo($j->tgl_jt); ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">PPH</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Cash Flow</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td>
	 <td>&nbsp;</td><td align="left" width="15%">&nbsp;</td><td width="3%">&nbsp;</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td width="15%" align="left">Proyek</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;"><?php echo $j->nama_proyek; ?></td>
	 <td>&nbsp;</td><td align="left" width="15%">&nbsp;</td><td width="3%">&nbsp;</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td width="3%">&nbsp;</td><td align="left">No. Faktur Pajak</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td>
	 <td>&nbsp;</td><td align="left" width="15%">Tgl FP</td><td width="3%">:</td><td width="25%" style="border-bottom: 1px solid #000; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td width="5%">&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<br/>
	<?php
	}
	?>
	<table class="tableizer-table4">
	 <tr><td width="100%" align="center"style="font-size: 12px;" colspan="5">Accounting Distribution</td></tr>
	 <tr><td width="10%" align="center" >Account</td><td width="50%" align="Center">Account Name</td><td width="10%" align="Center">Cash Flow</td><td width="15%" align="Center">Debet</td><td width="15%" align="Center">Kredit</td></tr>
	 <?php 
	 $totald = 0;
	 $totalk = 0;
	 foreach($detail as $d){?>
	 <tr>
		<td><?php echo $d->kode_perk;?></td>
		<td><?php echo $d->nama_perk;?></td>
		<td><?php echo $d->kode_cflow;?></td>
		<td><?php echo $d->debet;?></td>
		<td><?php echo $d->kredit;?></td>
	</tr>
	 <?php 
		$totald = $totald + $d->debet;
		$totalk = $totalk + $d->kredit;
	 } ?>
	 <tr><td align="Center" colspan="3">Total Voucher</td><td><?php echo number_format($totald,2,',','.'); ?></td><td><?php echo number_format($totalk,2,',','.'); ?></td></tr>
	 <tr><td align="Center" colspan="5"><?php echo Terbilang($totald).' rupiah'; ?></td></tr>
	</table>
	<br/>
	<table class="tableizer-table5">
	 <tr><td>Prepared by, <?php echo  $this->session->userdata('nama_kyw'); ?>
	 </td><td>Reviewed by,
	 </td><td>Approved by,
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
	 <tr><td>Date : <?php echo $date; ?></td>
	 <td>Date : </td>
	 <td>Date : </td>
	 <td>Date :</td></tr>
	</table>
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