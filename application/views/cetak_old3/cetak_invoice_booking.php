<!DOCTYPE html>
<?php
error_reporting(0);
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice Booking</title>
	<style type="text/css">
	table.tableizer-table {
		width: 100%;
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table td {
		padding: 4px;
		margin: 3px;
		border: 0px solid #000;
	}
	.tableizer-table th {
		color: #000;
		font-weight: bold;
		font-size: 16px;
		text-align: center;
	}
	#logo{
		text-align: Left;
		margin-bottom: 10px;
	}

	#logo img{
		width: 120px;
	}
	table.tableizer-table2{
		width: 100%;
		border: 1px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table2 td {
		padding: 4px;
		margin: 3px;
		border: 1px solid #000;
	}
	.tableizer-table2 th {
		color: #000;
		border: 1px solid #000;
		font-weight: bold;
		font-size: 12px;
		text-align: center;
	}
	table.tableizer-table3{
		width: 100%;
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
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
		border: 0px solid #000; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
	}
	
	</style>
  </head>
  <body>
	<table class="judul">
		<tr><td rowspan="3" align="center"><img id="logo" src="<?php echo base_url('metronic/img/logo_berkah.png'); ?>"></td><td style="font-size: 14px;font-weight: bold;">PT BERKAH GRAHA MANDIRI</td></tr>
		<tr><td>Beltway Office Park Tower Lt. 5</td></tr>
		<tr><td>Jl. TB Simatupang No. 41 - Pasar Minggu - Jakarta Selatan</td></tr>
	</table>
	<br/>
	<table class="tableizer-table">
	<tr class="tableizer-firstrow"><th colspan="14">INVOICE</th>
	<?php foreach($all as $i){ ?>	
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td colspan="3">Kepada Yth</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>Nama</td><td>:</td><td><?php echo $i->nama_cust; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Tanggal</td><td>:</td><td><?php $a=date('Y-m-d'); echo tgl_indo($a); ?></td></tr>
	 <tr><td>Alamat</td><td>:</td><td width="40%"><?php echo $i->alamat; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Invoice No.</td><td>:</td><td><?php echo $invoice; ?></td></tr>
	 <tr><td>Telp.</td><td>:</td><td><?php echo $i->no_telp; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Account</td><td>:</td><td><?php echo $i->no_va; ?></td></tr>
	 <tr><td>Email</td><td>:</td><td><?php echo $i->email; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Nama</td><td>:</td><td><?php echo $i->nama_va; ?></td></tr>
	 <tr><td>NPWP</td><td>:</td><td><?php echo $i->no_npwp; ?></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Bank</td><td>:</td><td><?php echo $i->bank_va; ?></td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
	<table class="tableizer-table2">
	<tr class="tableizer-firstrow"><th>No</th><th>Keterangan</th><th>Jumlah</th></tr>
	<?php  
	  $no = 1;
	?>	
		<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $i->keterangan; ?></td>
		<td align="right"><?php echo number_format($i->booking,2,'.',','); ?></td>
		</tr>
	<?php 
	?>
	<tr><td colspan="2">Total</td><td align="right"><?php echo number_format($i->booking,2,'.',','); ?></td></tr>
	<tr><td colspan="3" align="center"><?php echo '#'.Terbilang($i->booking).' Rupiah #'; ?></td></tr>
	</table>
	<?php } ?>
	<br/>
	<table class="tableizer-table4">
		<tr><th>Tanda Tangan</th></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td align="center"><?php echo $this->session->userdata('namaKyw'); ?></td></tr>
	</table>
  </body>
</html>
<script>
window.print();
</script>
<?php
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
	
	function tgl_route($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = getBulanU(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		return $tanggal.$bulan;
	}
 
	function getBulanU($bln){
		switch ($bln){
			case 1: return "Jan"; break;
			case 2: return "Feb"; break;
			case 3: return "Mar"; break;
			case 4: return "Apr"; break;
			case 5: return "Mei"; break;
			case 6: return "Jun"; break;
			case 7: return "Jul"; break;
			case 8: return "Aug"; break;
			case 9: return "Sep"; break;
			case 10: return "Oct"; break;
			case 11: return "Nov"; break;
			case 12: return "Dec"; break;
		}
	}
?>