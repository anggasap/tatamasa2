<?php
date_default_timezone_set('Asia/Jakarta');
$this->fpdf->FPDF("L","cm","A4");
$this->fpdf->SetMargins(0.5,0.5,0.5);
$this->fpdf->AliasNbPages();
$this->fpdf->AddPage();
$this->fpdf->SetFont('Times','B',14);
$this->fpdf->Cell(29.5,0.3,$nama,0,0,'C');
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Ln();
$this->fpdf->Cell(29.5,0.8,$tower,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->Cell(29.5,0.4,$alamat,0,0,'C');
$this->fpdf->Ln();
$this->fpdf->SetFont('Times','',12);
$this->fpdf->Cell(29.5,1.3,$laporan,0,0,'C');
$this->fpdf->Ln();
/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(0.5,3.15,29.5,3.15);
$this->fpdf->Line(0.5,3.20,29.5,3.20);
/* ————– Header Halaman selesai ————————————————*/
//$this->fpdf->SetFont('Times','B',12);
//$this->fpdf->Cell(19,1,'Header',0,0,'C');
/* setting header table */
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(0.8 , 0.5, 'No' , 1, 'LR', 'C');
$this->fpdf->Cell(7 , 0.5, 'Nama' , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Realisasi '.$bulan , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Realisasi YTD' , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Budget '.$bulan , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Budget YTD' , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Variance '.$bulan , 1, 'LR', 'C');
$this->fpdf->Cell(2.6 , 0.5, 'Variance YTD' , 1, 'LR', 'C');
$this->fpdf->Cell(2.7 , 0.5, 'Achievment '.$bulan , 1, 'LR', 'C');
$this->fpdf->Cell(2.7 , 0.5, 'Achievment YTD' , 1, 'LR', 'C');
/* generate hasil query disini */
$no = 1;
foreach($all as $n)
{
	if($n->level == 1){
		$a = $n->nama_cflow;
	}elseif($n->level == 2){
		$a = ' '.$n->nama_cflow;
	}elseif($n->level == 3){
		$a = '  '.$n->nama_cflow;
	}elseif($n->level == 4){
		$a = '   '.$n->nama_cflow;
	}elseif($n->level == 5){
		$a = '    '.$n->nama_cflow;
	}elseif($n->level == 6){
		$a = '     '.$n->nama_cflow;
	}elseif($n->level == 7){
		$a = '      '.$n->nama_cflow;
	}else{
		$a = '       '.$n->nama_cflow;
	}
	$realisasi_a = $n->realisasi_a;
	if($realisasi_a < 0){
		$l = number_format($realisasi_a,2,'.',',');
		$l = str_replace('-','',$l);
		$realisasi_a = '('.$l.')';
	}elseif($realisasi_a == 0){
		$realisasi_a = '0.00';
	}else{
		$realisasi_a = number_format($realisasi_a,2,'.',',');
	}
	$realisasi_b = $n->realisasi_b;
	if($realisasi_b < 0){
		$l = number_format($realisasi_b,2,'.',',');
		$l = str_replace('-','',$l);
		$realisasi_b = '('.$l.')';
	}elseif($realisasi_b == 0){
		$realisasi_b = '0.00';
	}else{
		$realisasi_b = number_format($realisasi_b,2,'.',',');
	}
	$realisasi_b = $n->realisasi_b;
	if($realisasi_b < 0){
		$l = number_format($realisasi_b,2,'.',',');
		$l = str_replace('-','',$l);
		$realisasi_b = '('.$l.')';
	}elseif($realisasi_b == 0){
		$realisasi_b = '0.00';
	}else{
		$realisasi_b = number_format($realisasi_b,2,'.',',');
	}
	$realisasi_b = $n->realisasi_b;
	if($realisasi_b < 0){
		$l = number_format($realisasi_b,2,'.',',');
		$l = str_replace('-','',$l);
		$realisasi_b = '('.$l.')';
	}elseif($realisasi_b == 0){
		$realisasi_b = '0.00';
	}else{
		$realisasi_b = number_format($realisasi_b,2,'.',',');
	}
	$budget_a = $n->budget_a;
	if($budget_a < 0){
		$l = number_format($budget_a,2,'.',',');
		$l = str_replace('-','',$l);
		$budget_a = '('.$l.')';
	}elseif($budget_a == 0){
		$budget_a = '0.00';
	}else{
		$budget_a = number_format($budget_a,2,'.',',');
	}
	$budget_b = $n->budget_b;
	if($budget_b < 0){
		$l = number_format($budget_b,2,'.',',');
		$l = str_replace('-','',$l);
		$budget_b = '('.$l.')';
	}elseif($budget_b == 0){
		$budget_b = '0.00';
	}else{
		$budget_b = number_format($budget_b,2,'.',',');
	}
	$variance_a = $n->realisasi_a - $n->budget_a;
	if($variance_a < 0){
		$l = number_format($variance_a,2,'.',',');
		$l = str_replace('-','',$l);
		$variance_a = '('.$l.')';
	}elseif($variance_a == 0){
		$variance_a = '0.00';
	}else{
		$variance_a = number_format($variance_a,2,'.',',');
	}
	$variance_b = $n->realisasi_b - $n->budget_b;
	if($variance_b < 0){
		$l = number_format($variance_b,2,'.',',');
		$l = str_replace('-','',$l);
		$variance_b = '('.$l.')';
	}elseif($variance_b == 0){
		$variance_b = '0.00';
	}else{
		$variance_b = number_format($variance_b,2,'.',',');
	}
	if($n->realisasi_a <= 0){
		$achievment_a = 0;
	}elseif($n->budget_a <= 0){
		$achievment_a = 100;
	}else{
		$achievment_a = $n->realisasi_a/$n->budget_a*100;	
	}
	if($n->realisasi_b <= 0){
		$achievment_b = 0;
	}elseif($n->budget_b <= 0){
		$achievment_b = 100;
	}else{
		$achievment_b = $n->realisasi_b/$n->budget_b*100;	
	}
	//$achievment_b = $n->realisasi_b/$n->budget_b*100;
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Times','',8);	
		$this->fpdf->Cell(0.8 , 0.5, $no, 1, 'LR', 'L');
		$this->fpdf->Cell(7 , 0.5, $a, 1, 'LR', 'L');
		$this->fpdf->Cell(2.6 , 0.5, $realisasi_a , 1, 'LR', 'R');
		$this->fpdf->Cell(2.6 , 0.5, $realisasi_b , 1, 'LR', 'R');
		$this->fpdf->Cell(2.6 , 0.5, $budget_a , 1, 'LR', 'R');
		$this->fpdf->Cell(2.6 , 0.5, $budget_b , 1, 'LR', 'R');
		$this->fpdf->Cell(2.6 , 0.5, $variance_a , 1, 'LR', 'R');
		$this->fpdf->Cell(2.6 , 0.5, $variance_b , 1, 'LR', 'R');
		$this->fpdf->Cell(2.7 , 0.5, round($achievment_a,2).'%' , 1, 'LR', 'R');
		$this->fpdf->Cell(2.7 , 0.5, round($achievment_b,2).'%' , 1, 'LR', 'R');
	$no++;
}
	$this->fpdf->Ln();
	$this->fpdf->SetFont('Times','B',8);
	
	$var_a_masuk = $real_a_masuk - $bud_a_masuk;
	if($var_a_masuk < 0){
		$l_masuk = number_format($var_a_masuk,2,'.',',');
		$l_masuk = str_replace('-','',$l_masuk);
		$var_a_masuk = '('.$l.')';
	}elseif($var_a_masuk == 0){
		$var_a_masuk = '0.00';
	}else{
		$var_a_masuk = number_format($var_a_masuk,2,'.',',');
	}
	$var_b_masuk = $real_b_masuk - $bud_b_masuk;
	if($var_b_masuk < 0){
		$lb_masuk = number_format($var_b_masuk,2,'.',',');
		$lb_masuk = str_replace('-','',$lb_masuk);
		$var_b_masuk = '('.$lb_masuk.')';
	}elseif($var_b_masuk == 0){
		$var_b_masuk = '0.00';
	}else{
		$var_b_masuk = number_format($var_b_masuk,2,'.',',');
	}
	if($real_a_masuk <= 0){
		$achiev_a_masuk = 0;
	}elseif($bud_a_masuk <= 0){
		$achiev_a_masuk = 100;
	}else{
		$achiev_a_masuk = $real_a_masuk/$bud_a_masuk*100;	
	}
	if($real_b_masuk <= 0){
		$achiev_b_masuk = 0;
	}elseif($bud_b_masuk <= 0){
		$achiev_b_masuk = 100;
	}else{
		$achiev_b_masuk = $real_b_masuk/$bud_b_masuk*100;	
	}
	
	$real_a_masuk = $real_a_masuk;
	if($real_a_masuk < 0){
		$t_masuk = number_format($real_a_masuk,2,'.',',');
		$t_masuk = str_replace('-','',$t_masuk);
		$real_a_masuk = '('.$t_masuk.')';
	}else{
		$real_a_masuk = number_format($real_a_masuk,2,'.',',');
	}
	$real_b_masuk = $real_b_masuk;
	if($real_b_masuk < 0){
		$tb_masuk = number_format($real_b_masuk,2,'.',',');
		$tb_masuk = str_replace('-','',$tb_masuk);
		$real_b_masuk = '('.$tb_masuk.')';
	}else{
		$real_b_masuk = number_format($real_b_masuk,2,'.',',');
	}
	$bud_a_masuk = $bud_a_masuk;
	if($bud_a_masuk < 0){
		$b_masuk = number_format($bud_a_masuk,2,'.',',');
		$b_masuk = str_replace('-','',$b_masuk);
		$bud_a_masuk = '('.$b_masuk.')';
	}else{
		$bud_a_masuk = number_format($bud_a_masuk,2,'.',',');
	}
	$bud_b_masuk = $bud_b_masuk;
	if($bud_b_masuk < 0){
		$ba_masuk = number_format($bud_b_masuk,2,'.',',');
		$ba_masuk = str_replace('-','',$ba_masuk);
		$bud_b_masuk = '('.$ba_masuk.')';
	}else{
		$bud_b_masuk = number_format($bud_b_masuk,2,'.',',');
	}
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Cell(7.8 , 0.5, 'Total Arus Kas Masuk', 1, 'LR', 'L');
	$this->fpdf->Cell(2.6 , 0.5, $real_a_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $real_b_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $bud_a_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $bud_b_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $var_a_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $var_b_masuk, 1, 'LR', 'R');
	$this->fpdf->Cell(2.7 , 0.5, round($achiev_a_masuk,2).'%', 1, 'LR', 'R');
	$this->fpdf->Cell(2.7 , 0.5, round($achiev_b_masuk,2).'%', 1, 'LR', 'R');
	
	$this->fpdf->Ln();
	$this->fpdf->SetFont('Times','B',8);
	
	$var_a_keluar = $real_a_keluar - $bud_a_keluar;
	if($var_a_keluar < 0){
		$l_keluar = number_format($var_a_keluar,2,'.',',');
		$l_keluar = str_replace('-','',$l_keluar);
		$var_a_keluar = '('.$l.')';
	}elseif($var_a_keluar == 0){
		$var_a_keluar = '0.00';
	}else{
		$var_a_keluar = number_format($var_a_keluar,2,'.',',');
	}
	$var_b_keluar = $real_b_keluar - $bud_b_keluar;
	if($var_b_keluar < 0){
		$lb_keluar = number_format($var_b_keluar,2,'.',',');
		$lb_keluar = str_replace('-','',$lb_keluar);
		$var_b_keluar = '('.$lb_keluar.')';
	}elseif($var_b_keluar == 0){
		$var_b_keluar = '0.00';
	}else{
		$var_b_keluar = number_format($var_b_keluar,2,'.',',');
	}
	if($real_a_keluar <= 0){
		$achiev_a_keluar = 0;
	}elseif($bud_a_keluar <= 0){
		$achiev_a_keluar = 100;
	}else{
		$achiev_a_keluar = $real_a_keluar/$bud_a_keluar*100;	
	}
	if($real_b_keluar <= 0){
		$achiev_b_keluar = 0;
	}elseif($bud_b_keluar <= 0){
		$achiev_b_keluar = 100;
	}else{
		$achiev_b_keluar = $real_b_keluar/$bud_b_keluar*100;	
	}
	
	$real_a_keluar = $real_a_keluar;
	if($real_a_keluar < 0){
		$t_keluar = number_format($real_a_keluar,2,'.',',');
		$t_keluar = str_replace('-','',$t_keluar);
		$real_a_keluar = '('.$t_keluar.')';
	}else{
		$real_a_masuk = number_format($real_a_keluar,2,'.',',');
	}
	$real_b_keluar = $real_b_keluar;
	if($real_b_keluar < 0){
		$tb_keluar = number_format($real_b_keluar,2,'.',',');
		$tb_keluar = str_replace('-','',$tb_keluar);
		$real_b_keluar = '('.$tb_keluar.')';
	}else{
		$real_b_keluar = number_format($real_b_keluar,2,'.',',');
	}
	$bud_a_keluar = $bud_a_keluar;
	if($bud_a_keluar < 0){
		$b_keluar = number_format($bud_a_keluar,2,'.',',');
		$b_keluar = str_replace('-','',$b_keluar);
		$bud_a_keluar = '('.$b_keluar.')';
	}else{
		$bud_a_keluar = number_format($bud_a_keluar,2,'.',',');
	}
	$bud_b_keluar = $bud_b_keluar;
	if($bud_b_keluar < 0){
		$ba_keluar = number_format($bud_b_keluar,2,'.',',');
		$ba_keluar = str_replace('-','',$ba_keluar);
		$bud_b_keluar = '('.$ba_keluar.')';
	}else{
		$bud_b_keluar = number_format($bud_b_keluar,2,'.',',');
	}
	$this->fpdf->SetFont('Times','B',8);
	$this->fpdf->Cell(7.8 , 0.5, 'Total Arus Kas Keluar', 1, 'LR', 'L');
	$this->fpdf->Cell(2.6 , 0.5, $real_a_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $real_b_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $bud_a_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $bud_b_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $var_a_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.6 , 0.5, $var_b_keluar, 1, 'LR', 'R');
	$this->fpdf->Cell(2.7 , 0.5, round($achiev_a_keluar,2).'%', 1, 'LR', 'R');
	$this->fpdf->Cell(2.7 , 0.5, round($achiev_b_keluar,2).'%', 1, 'LR', 'R');	
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
