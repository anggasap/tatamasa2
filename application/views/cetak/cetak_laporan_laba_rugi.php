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
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(14 , 0.5, 'Nama' , 1, 'LR', 'C');
$this->fpdf->Cell(6 , 0.5, 'Saldo' , 1, 'LR', 'C');
/* generate hasil query disini */
$no = 1;
foreach($all as $n)
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
	$this->fpdf->Ln();
	$saldo_akhir = $n->saldo_akhir;
	if ($saldo_akhir < 0){
		$s = number_format($saldo_akhir,2,'.',',');
		$s = str_replace('-','',$s);
		$saldo = '('.$s.')';
	}else{
		$saldo = number_format($n->saldo_akhir,2,'.',',');
	}
	$this->fpdf->SetFont('Times','',12);
	$this->fpdf->Cell(14 , 0.5, $a, 1, 'LR', 'L');
	$this->fpdf->Cell(6 , 0.5, $saldo, 1, 'LR', 'R');
	$no++;
}
	$this->fpdf->Ln();
	$saldo_besih = $bersih;
	if ($saldo_besih < 0){
		$s = number_format($saldo_bersih,2,'.',',');
		$s = str_replace('-','',$s);
		$saldob = '('.$s.')';
	}else{
		$saldob = number_format($saldo_besih,2,'.',',');
	}
	$this->fpdf->SetFont('Times','',12);
	$this->fpdf->Cell(14 , 0.5, 'Laba(Rugi) bersih', 1, 'LR', 'L');
	$this->fpdf->Cell(6 , 0.5, $saldob, 1, 'LR', 'R');
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
