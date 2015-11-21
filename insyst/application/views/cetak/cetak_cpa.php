<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Catatan Penggunaan Anggaran (CPA)</title>
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
		text-align: Left;
		margin-bottom: 10px;
	}
	#logo img{
		width: 200px;
	}
	table.tableizer-table2{
		width: 98%;
		border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
	}
	.tableizer-table2 td {
		border: 1px solid #aaa;
	}
	.tableizer-table2 th {
		background-color: #104E8B; 
		color: #000;
		border: 1px solid #aaa;
		font-weight: bold;
		font-size: 12px;
		text-align: center;
	}
	table.tableizer-table3{
		width: 98%;
		border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;	
		background-color: whitesmoke;
	}
	table.tableizer-table4{
		width: 30%;
		float: left;
		border: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;
		font-size: 10px;
		margin-bottom: 20px;	
	}
	.tableizer-table4 td {
		border: 1px solid #aaa;
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
		<tr><th></th><th>PT BERKAH GRAHA MANDIRI</th></tr>
		<tr><td rowspan="2"><img id="logo" src="<?php echo base_url('metronic/img/tatamasa_logo.png'); ?>"></td><td>Beltway Office Park Tower Lt. 5</td></tr>
		<tr><td>Jl. TB Simatung No. 41 - Psr Minggu - Jakarta Selatan</td></tr>
	</table>
	<br/>
	<table class="tableizer-table">
	<tr class="tableizer-firstrow"><th colspan="14">CATATAN PENGGUNAAN ANGGARAN (CPA)</th></tr>
	</table>
	<br/>
	<?php 
		foreach($advance as $a){
	?>
	<table class="tableizer-table3">
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Request Detail</td><td width="3%" align="left">:</td><td colspan="9" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">ADVANCE REQUEST FOR PAYMENT</td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Project</td><td width="3%" align="left">:</td><td colspan="9" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_proyek; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">No.Request</td><td width="3%" align="left">:</td><td width="15%" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->id_advance; ?></td>
	 <td>&nbsp;</td><td width="7%" align="left">Tgl Req</td><td width="3%" align="left">:</td><td width="15%" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo tgl_indo($a->tgl_trans); ?></td>
	 <td>&nbsp;</td><td width="10%" align="left">Req.Adv No</td><td width="3%" align="left">:</td><td width="15%" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td></tr>	 
	 <tr><td>&nbsp;</td><td width="15%" align="left">Request Name/Dept</td><td width="3%" align="left">:</td><td colspan="5" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_kyw; ?></td>
	 <td width="2%" align="left">/</td><td width="15%" colspan="3" align="left" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_dept; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Invoice No</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td>
	 <td width="15%" align="left">Due Date</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->tgl_jt; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">PO No</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">&nbsp;</td><td>&nbsp;</td>
	 <td width="15%" align="left">Pay to</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->pay_to; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Amount</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->jml_uang; ?></td><td>&nbsp;</td>
	 <td width="15%" align="left">Account Name</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_akun_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Paid Ammount</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">Rp. 0.00</td><td>&nbsp;</td>
	 <td width="15%" align="left">Account No</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->no_akun_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Over(Under)Paid</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;">Rp. 0.00</td><td>&nbsp;</td>
	 <td width="15%" align="left">Bank</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->nama_bank; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Description</td><td width="3%" align="left">:</td><td colspan="9" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->keterangan; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Vrf by Finance Dept</td><td width="3%" align="left">:</td><td colspan="9" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->financeName; ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">Dept Head Approval</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->hdName; ?></td>
	 <td width="2%" align="Center">/</td><td style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->statusKeuangan; ?></td><td>&nbsp;</td>
	 <td width="15%">Apr Date</td><td width="2%" align="Center">:</td><td style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php if($a->app_hd_tgl = ''){ echo '';}else{ echo tgl_indo($a->app_hd_tgl);} ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td width="15%" align="left">GM Internal Approval</td><td width="3%" align="left">:</td><td colspan="3" style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->gmName; ?></td>
	 <td width="2%" align="Center">/</td><td style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php echo $a->statusGm; ?></td><td>&nbsp;</td>
	 <td width="15%">Apr Date</td><td width="2%" align="Center">:</td><td style="border-bottom: 1px solid #CCC; font-family: Arial, Helvetica, sans-serif;"><?php if($a->app_gm_tgl == '0000-00-00'){ echo '';}else{ echo tgl_indo($a->app_gm_tgl);} ?></td><td>&nbsp;</td></tr>
	 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	</table>
		<?php 
		}
		?>
	<table class="tableizer-table2">
	 <tr><th width="10%">CF/No.Rek</th><th width="50%">Nama CF/Keterangan</th><th width="10%">Anggaran</th><th width="10%">Terpakai</th><th width="10%">Jm.Request</th><th width="10%">Sisa</th></tr>
	 <?php 
	 $totalAng = 0;
	 $totalTer = 0;
	 $totalJum = 0;
	 $totalSisa = 0;
	 foreach($detail as $d){
	 ?>
	 <tr><td rowspan="2"><?php echo $d->kode_perk; ?></td><td style="border-bottom: 0px;"><?php echo $d->nama_perk; ?></td><td rowspan="2"><?php echo number_format($d->anggaran,2,",","."); ?></td>
	 <td rowspan="2"><?php echo number_format($d->terpakai,2,",","."); ?></td><td rowspan="2"><?php echo number_format($d->jumlah,2,",","."); ?></td>
	 <td rowspan="2"><?php echo number_format($d->sisa,2,",","."); ?></td></tr>
	 <tr><td style="border-top: 0px;"><?php echo $d->keterangan; ?></td></tr>
	 <?php 
	 $totalAng = $totalAng + $d->anggaran;
	 $totalTer = $totalTer + $d->terpakai;
	 $totalJum = $totalJum + $d->jumlah;
	 $totalSisa = $totalSisa + $d->sisa;
	 } ?>
	 <tr><td colspan="2">Total Request</td><td><?php echo number_format($totalAng,2,",","."); ?></td><td><?php echo number_format($totalTer,2,",","."); ?></td>
	 <td><?php echo number_format($totalJum,2,",","."); ?></td><td><?php echo number_format($totalSisa,2,",","."); ?></td></tr>
	 <tr><td colspan="6"><?php echo if (Terbilang($totalSisa) == ''){ echo '';}else{ echo Terbilang($totalSisa).' rupiah';} ?></td></tr>
	</table>
	<br/>
	<table class="tableizer-table4">
	 <tr><td align="center">Mengetahui</td></tr>
	 <tr><td style="border-bottom: 0px;">&nbsp;</td></tr>
	 <tr><td style="border-bottom: 0px;border-top: 0px;">&nbsp;</td></tr>
	 <tr><td style="border-top: 0px;">&nbsp;</td></tr>
	 <tr><td>TGL : <?php echo tgl_indo(date('Y-m-d'));?></td></tr>
	</table>
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
	function Terbilang($x)
	{
	  $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	  if ($x < 12)
		return " " . $abil[$x];
	  elseif ($x < 20)
		return $this->Terbilang($x - 10) . "belas";
	  elseif ($x < 100)
		return $this->Terbilang($x / 10) . " puluh" . $this->Terbilang($x % 10);
	  elseif ($x < 200)
		return " seratus" . $this->Terbilang($x - 100);
	  elseif ($x < 1000)
		return $this->Terbilang($x / 100) . " ratus" . $this->Terbilang($x % 100);
	  elseif ($x < 2000)
		return " seribu" . $this->Terbilang($x - 1000);
	  elseif ($x < 1000000)
		return $this->Terbilang($x / 1000) . " ribu" . $this->Terbilang($x % 1000);
	  elseif ($x < 1000000000)
		return $this->Terbilang($x / 1000000) . " juta" . $this->Terbilang($x % 1000000);
	}
?>