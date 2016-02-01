<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("P","cm","A4");
$this->fpdf->SetMargins(0.5,0.5,0.5);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(20.5,0.3,$nama,0,0,'C');
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Ln();
$this->fpdf->Cell(20.5,0.8,$tower,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->Cell(20.5,0.4,$alamat,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(20.5,1.3,$laporan.tgl_indo($tgl),0,0,'C');
$this->fpdf->Ln();
/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(0.5,3.15,20.5,3.15);
$this->fpdf->Line(0.5,3.20,20.5,3.20);
/* ————– Header Halaman selesai ————————————————*/
//$this->fpdf->SetFont('Times','B',12);
//$this->fpdf->Cell(19,1,'Header',0,0,'C');
/* setting header table */
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(4 , 0.5, 'Kode Perkiraan' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, 'Kode Alt' , 1, 'LR', 'C');
$this->fpdf->Cell(8 , 0.5, 'Nama' , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, $tgl , 1, 'LR', 'C');
$this->fpdf->Cell(4 , 0.5, $tgl2 , 1, 'LR', 'C');
/* generate hasil query disini */
	$no = 1;
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Ln();
	$this->fpdf->Cell(20 , 0.5, 'AKTIVA', 1, 'LR', 'C');
foreach($neraca as $n)
{
	if($n->level == 1){
		$a = $n->nama_perk;
	}elseif($n->level == 2){
		$a = ' '.$n->nama_perk;
	}elseif($n->level == 3){
		$a = '  '.$n->nama_perk;
	}elseif($n->level == 4){
		$a = '   '.$n->nama_perk;
	}elseif($n->level == 5){
		$a = '    '.$n->nama_perk;
	}elseif($n->level == 6){
		$a = '     '.$n->nama_perk;
	}elseif($n->level == 7){
		$a = '      '.$n->nama_perk;
	}else{
		$a = '       '.$n->nama_perk;
	}
	$saldo = $n->saldo_akhir;
	if($saldo < 0){
		$l = number_format($saldo,2,'.',',');
		$l = str_replace('-','',$l);
		$saldo = '('.$l.')';
	}else{
		$saldo = number_format($saldo,2,'.',',');
	}
	$saldo2 = $n->sa;
	if($saldo2 < 0){
		$l = number_format($saldo2,2,'.',',');
		$l = str_replace('-','',$l);
		$saldo2 = '('.$l.')';
	}else{
		$saldo2 = number_format($saldo2,2,'.',',');
	}
	if($n->sisi == 'L'){
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',8);	
		$this->fpdf->Cell(3 , 0.5, $n->kode_perk, 'L', 'LR', 'L');
		$this->fpdf->Cell(3 , 0.5, $n->kode_alt, 0, 'LR', 'L');	
		$this->fpdf->Cell(6 , 0.5, $a, 0, 'LR', 'L');
		$this->fpdf->Cell(4 , 0.5, $saldo, 0, 'LR', 'R');
		$this->fpdf->Cell(4 , 0.5, $saldo2, 'R', 'LR', 'R');
	}
}
	$this->fpdf->Ln();
	$totalA = $total_aktiva;
	if($totalA < 0){
		$t = number_format($totalA,2,'.',',');
		$t = str_replace('-','',$t);
		$totalAktiva = '('.$t.')';
	}else{
		$totalAktiva = number_format($totalA,2,'.',',');
	}
	$totalA2 = $total_aktiva2;
	if($totalA2 < 0){
		$t = number_format($totalA2,2,'.',',');
		$t = str_replace('-','',$t);
		$totalAktiva2 = '('.$t.')';
	}else{
		$totalAktiva2 = number_format($totalA2,2,'.',',');
	}
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Cell(12 , 0.5, 'Total Aktiva', 1, 'LR', 'L');
	$this->fpdf->Cell(4 , 0.5, $totalAktiva, 1, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, $totalAktiva2, 1, 'LR', 'R');
	$this->fpdf->Ln();
	$this->fpdf->Ln();
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Cell(20 , 0.5, 'PASIVA', 1, 'LR', 'C');
foreach($neraca as $n)
{	
	if($n->level == 1){
		$a = $n->nama_perk;
	}elseif($n->level == 2){
		$a = ' '.$n->nama_perk;
	}elseif($n->level == 3){
		$a = '  '.$n->nama_perk;
	}elseif($n->level == 4){
		$a = '   '.$n->nama_perk;
	}elseif($n->level == 5){
		$a = '    '.$n->nama_perk;
	}elseif($n->level == 6){
		$a = '     '.$n->nama_perk;
	}elseif($n->level == 7){
		$a = '      '.$n->nama_perk;
	}else{
		$a = '       '.$n->nama_perk;
	}
	$saldo = $n->saldo_akhir;
	if($saldo < 0){
		$l = number_format($saldo,2,'.',',');
		$l = str_replace('-','',$l);
		$saldo = '('.$l.')';
	}else{
		$saldo = number_format($saldo,2,'.',',');
	}
	$saldo2 = $n->sa;
	if($saldo2 < 0){
		$l = number_format($saldo2,2,'.',',');
		$l = str_replace('-','',$l);
		$saldo2 = '('.$l.')';
	}else{
		$saldo2 = number_format($saldo2,2,'.',',');
	}
	if($n->sisi == 'R'){
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',8);
		$this->fpdf->Cell(3 , 0.5, $n->kode_perk, 'L', 'LR', 'L');
		$this->fpdf->Cell(3 , 0.5, $n->kode_alt, 0, 'LR', 'L');
		$this->fpdf->Cell(6 , 0.5, $a, 0, 'LR', 'L');
		$this->fpdf->Cell(4 , 0.5, $saldo, 0, 'LR', 'R');
		$this->fpdf->Cell(4 , 0.5, $saldo2, 'R', 'LR', 'R');
	}		
}
	$this->fpdf->Ln();
	$totalM = $total_modal;
	if($totalM < 0){
		$t = number_format($totalM,2,'.',',');
		$t = str_replace('-','',$t);
		$totalModal = '('.$t.')';
	}else{
		$totalModal = number_format($totalM,2,'.',',');
	}
	$totalM2 = $total_modal2;
	if($totalM2 < 0){
		$t = number_format($totalM2,2,'.',',');
		$t = str_replace('-','',$t);
		$totalModal2 = '('.$t.')';
	}else{
		$totalModal2 = number_format($totalM2,2,'.',',');
	}
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Cell(3 , 0.5, '', 'L', 'LR', 'L');
	$this->fpdf->Cell(3 , 0.5, '', 0, 'LR', 'L');
	$this->fpdf->Cell(6 , 0.5, 'Total Modal', 0, 'LR', 'L');
	$this->fpdf->Cell(4 , 0.5, $totalModal, 0, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, $totalModal2, 'R', 'LR', 'R');
	
	$this->fpdf->Ln();
	$lrb = $laba_rugi_berjalan;
	if($lrb < 0){
		$t = number_format($lrb,2,'.',',');
		$t = str_replace('-','',$t);
		$labarugi = '('.$t.')';
	}else{
		$labarugi = number_format($lrb,2,'.',',');
	}
	$lrb2 = $laba_rugi_berjalan2;
	if($lrb2 < 0){
		$t = number_format($lrb2,2,'.',',');
		$t = str_replace('-','',$t);
		$labarugi2 = '('.$t.')';
	}else{
		$labarugi2 = number_format($lrb2,2,'.',',');
	}
	$this->fpdf->Cell(3 , 0.5, '', 'L', 'LR', 'L');
	$this->fpdf->Cell(3 , 0.5, '', 0, 'LR', 'L');
	$this->fpdf->Cell(6 , 0.5, 'Laba Tahun Berjalan', 0, 'LR', 'L');
	$this->fpdf->Cell(4 , 0.5, $labarugi, 0, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, $labarugi2, 'R', 'LR', 'R');
	
	$this->fpdf->Ln();
	$total = $total_pasiva + $laba_rugi_berjalan + $total_modal;
	if($total < 0){
		$t = number_format($total,2,'.',',');
		$t = str_replace('-','',$t);
		$totalAll = '('.$t.')';
	}else{
		$totalAll = number_format($total,2,'.',',');
	}
	$total2 = $total_pasiva2 + $laba_rugi_berjalan2 + $total_modal2;
	if($total2 < 0){
		$t = number_format($total2,2,'.',',');
		$t = str_replace('-','',$t);
		$totalAll2 = '('.$t.')';
	}else{
		$totalAll2 = number_format($total2,2,'.',',');
	}
	$this->fpdf->Cell(12 , 0.5, 'Total Pasiva', 1, 'LR', 'L');
	$this->fpdf->Cell(4 , 0.5, $totalAll, 1, 'LR', 'R');
	$this->fpdf->Cell(4 , 0.5, $totalAll2, 1, 'LR', 'R');
/* setting posisi footer 3 cm dari bawah */
/* generate pdf jika semua konstruktor, data yang akan ditampilkan, dll sudah selesai */
$this->fpdf->Output($laporan."_".date('d-m-Y h:i:sa').".pdf","I");

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
